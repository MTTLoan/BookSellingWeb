<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookTitle;
use App\Models\BookType;
use App\Models\Image;
use App\Models\Supplier;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    use AuthorizesRequests;
    // use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    // public function __construct()
    // {
    //     // Tự động áp dụng các kiểm tra quyền cho các hành động tiêu chuẩn
    //     $this->authorizeResource(Book::class, 'book');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd(auth('web')->user());
        $query = Book::with(['bookTitle.bookType']);

        $employee = auth('web')->user();

        if ($employee->role === 'admin') {
            // Admin xem tất cả sách
            $books = Book::all();
        } else {
            // Staff và Branch Manager chỉ xem sách thuộc chi nhánh của mình
            $books = Book::join('books_branches', 'books.id', '=', 'books_branches.book_id')
            ->where('books_branches.branch_id', $employee->branch_id)
            ->get(['books.*', 'books_branches.quantity']);

        }

        //filter và search
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('bookTitle', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('author', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('filter_bookType')) {
            $filterBookType = $request->input('filter_bookType');
            $query->whereHas('bookTitle.bookType', function ($q) use ($filterBookType) {
                $q->whereIn('id', $filterBookType);
            });
        }

        if ($request->filled('filter_quantity')) {
            $filterQuantity = $request->input('filter_quantity');
            $query->where('quantity', '>=', $filterQuantity);
        }

        $books = $query->orderBy('id', 'asc')->paginate(20);
        $bookTypes = BookType::all(); // Lấy tất cả các thể loại sách để hiển thị trong form tìm kiếm
        return view('admin.book.index', compact('books', 'bookTypes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kiểm tra quyền 'create' trên model Book
        $this->authorize('create', Book::class);

        $bookTypes = BookType::orderBy('id', 'asc')->select('id', 'name')->get();
        $suppliers = Supplier::orderBy('id', 'asc')->select('id', 'name')->get();
        return view('admin.book.create', compact('bookTypes', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit_price' => 'integer|min:1|gt:cost',
            'cost' => 'integer|min:1',
            'publishing_year' => 'integer|min:1',
            'page_number' => 'integer|min:1',
            'images.*' => 'file|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'unit_price.integer' => 'Giá bán phải là số nguyên',
            'unit_price.min' => 'Giá bán phải lớn hơn 0',
            'unit_price.gt' => 'Giá bán phải lớn hơn giá vốn',
            'cost.integer' => 'Giá vốn phải là số nguyên',
            'cost.min' => 'Giá vốn phải lớn hơn 0',
            'publishing_year.integer' => 'Năm xuất bản phải là số nguyên',
            'publishing_year.min' => 'Năm xuất bản phải lớn hơn 0',
            'page_number.integer' => 'Số trang phải là số nguyên',
            'page_number.min' => 'Số trang phải lớn hơn 0',
            'images.*.file' => 'Ảnh phải là file',
            'images.*.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, svg',
        ]);

        try {
            // Kiểm tra xem tên sách đã tồn tại trong BookTitle chưa
            $bookTitle = BookTitle::firstOrCreate([
                'name' => $request->name,
                'author' => $request->author,
                'description' => $request->description,
                'book_type_id' => $request->book_type_id,
                'supplier_id' => $request->supplier_id,
            ]);

            // Thêm mới Book
            $book = Book::create([
                'quantity' => 0,
                'unit_price' => $request->unit_price,
                'cost' => $request->cost,
                'publishing_year' => $request->publishing_year,
                'page_number' => $request->page_number,
                'cover' => $request->cover,
                'book_title_id' => $bookTitle->id
            ]);

            // Xử lý upload ảnh
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $image_name = $image->hashName();
                    $image->move(public_path('uploads/products'), $image_name);

                    // Thêm mới Image
                    Image::create([
                        'url' => 'uploads/products/' . $image_name,
                        'book_id' => $book->id,
                    ]);
                }
            }

            return redirect()->route('book.create')->with('success', 'Sản phẩm đã được thêm thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Lỗi xảy ra, vui lòng thử lại.']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $this->authorize('view', $book);

        $book->load('bookTitle', 'bookTitle.bookType', 'bookTitle.suppliers', 'images');
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        $bookTypes = BookType::orderBy('id', 'asc')->select('id', 'name')->get();
        $suppliers = Supplier::orderBy('id', 'asc')->select('id', 'name')->get();
        return view('admin.book.edit', compact('bookTypes', 'suppliers', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'unit_price' => 'integer|min:1|gt:cost',
            'cost' => 'integer|min:1',
            'publishing_year' => 'integer|min:1',
            'page_number' => 'integer|min:1',
            'images.*' => 'file|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'unit_price.integer' => 'Giá bán phải là số nguyên',
            'unit_price.min' => 'Giá bán phải lớn hơn 0',
            'unit_price.gt' => 'Giá bán phải lớn hơn giá vốn',
            'cost.integer' => 'Giá vốn phải là số nguyên',
            'cost.min' => 'Giá vốn phải lớn hơn 0',
            'publishing_year.integer' => 'Năm xuất bản phải là số nguyên',
            'publishing_year.min' => 'Năm xuất bản phải lớn hơn 0',
            'page_number.integer' => 'Số trang phải là số nguyên',
            'page_number.min' => 'Số trang phải lớn hơn 0',
            'images.*.file' => 'Ảnh phải là file',
            'images.*.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, svg',
        ]);

        try {
            // Cập nhật BookTitle
            $bookTitle = $book->bookTitle;
            $bookTitle->update([
                'name' => $request->name,
                'author' => $request->author,
                'description' => $request->description,
                'book_type_id' => $request->book_type_id,
                'supplier_id' => $request->supplier_id,
            ]);

            // Cập nhật Book
            $book->update([
                'unit_price' => $request->unit_price,
                'cost' => $request->cost,
                'publishing_year' => $request->publishing_year,
                'page_number' => $request->page_number,
                'cover' => $request->cover,
            ]);

            // Xử lý upload ảnh
            if ($request->hasFile('images')) {
                // Xóa ảnh cũ
                foreach ($book->images as $image) {
                    unlink(public_path($image->url));
                    $image->delete();
                }

                // Thêm ảnh mới
                foreach ($request->file('images') as $image) {
                    $image_name = $image->hashName();
                    $image->move(public_path('uploads/products'), $image_name);

                    // Thêm mới Image
                    Image::create([
                        'url' => 'uploads/products/' . $image_name,
                        'book_id' => $book->id,
                    ]);
                }
            }

            return redirect()->route('book.edit', ['book' => $book->id])->with('success', 'Sản phẩm đã được sửa thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Lỗi xảy ra, vui lòng thử lại.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        try {
            // Xóa các ảnh liên quan
            foreach ($book->images as $image) {
                $image_path = public_path($image->url);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $image->delete();
            }

            // Xóa sách
            $book->delete();

            return redirect()->route('book.index')->with('success', 'Xóa sách và các ảnh liên quan thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi: ' . $e->getMessage());
            return redirect()->route('book.index')->with('error', 'Xóa sách thất bại.');
        }
    }

    public function destroyImage(Image $image)
    {
        $image_name = $image->url;
        if ($image->delete()) {
            $image_path = public_path($image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            return redirect()->back()->with('oke', 'Xóa ảnh thành công.');
        }
        return redirect()->back()->with('no', 'Xóa ảnh thất bại.');
    }
}