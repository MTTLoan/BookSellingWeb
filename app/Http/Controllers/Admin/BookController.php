<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookTitle;
use App\Models\BookType;
use App\Models\Image;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['bookTitle.bookType'])->orderBy('id', 'asc')->paginate(10);
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
            'unit_price' => 'min:1|gt:cost',
            'cost' => 'min:1',
            'publishing_year' => 'min:1',
            'page_number' => 'min:1',
            'images.*' => 'file|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'unit_price.min' => 'Giá bán phải lớn hơn 0',
            'unit_price.gt' => 'Giá bán phải lớn hơn giá vốn',
            'cost.min' => 'Giá vốn phải lớn hơn 0',
            'publishing_year.min' => 'Năm xuất bản phải lớn hơn 0',
            'page_number.min' => 'Số trang phải lớn hơn 0',
            'images.*.file' => 'Ảnh phải là file',
            'images.*.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, svg',
        ]);

        if ($validated) {
            try {
                // Kiểm tra xem tên sách đã tồn tại trong BookTitle chưa
                $bookTitle = BookTitle::where('name', $request->name)->first();
                if (!$bookTitle) {
                    // Nếu chưa tồn tại, thêm mới BookTitle
                    $bookTitle = BookTitle::create([
                        'name' => $request->name,
                        'author' => $request->author,
                        'description' => $request->description,
                        'book_type_id' => $request->book_type_id,
                        'supplier_id' => $request->supplier_id,
                    ]);
                }

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

                return response()->json([
                    'success' => true,
                    'message' => 'Sản phẩm đã được thêm thành công.'
                ], 200);

            } catch (\Exception $e) {
                Log::error('Lỗi: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Lỗi xảy ra, vui lòng thử lại.'
                ], 500);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Dữ liệu không hợp lệ.'
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load('bookTitle', 'bookTitle.bookType', 'bookTitle.suppliers', 'images');
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $bookTypes = BookType::orderBy('id', 'asc')->select('id', 'name')->get();
        $suppliers = Supplier::orderBy('id', 'asc')->select('id', 'name')->get();
        return view('admin.book.edit', compact('bookTypes', 'suppliers', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $validated = $request->validate([
            'unit_price' => 'min:1|gt:cost',
            'cost' => 'min:1',
            'publishing_year' => 'min:1',
            'page_number' => 'min:1',
            'images.*' => 'file|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'unit_price.min' => 'Giá bán phải lớn hơn 0',
            'unit_price.gt' => 'Giá bán phải lớn hơn giá vốn',
            'cost.min' => 'Giá vốn phải lớn hơn 0',
            'publishing_year.min' => 'Năm xuất bản phải lớn hơn 0',
            'page_number.min' => 'Số trang phải lớn hơn 0',
            'images.*.file' => 'Ảnh phải là file',
            'images.*.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, svg',
        ]);

        if ($validated) {
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

                return response()->json([
                    'success' => true,
                    'message' => 'Sản phẩm đã được thêm thành công.'
                ], 200);
            } catch (\Exception $e) {
                Log::error('Lỗi: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Lỗi xảy ra, vui lòng thử lại.'
                ], 500);            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Dữ liệu không hợp lệ.'
        ], 400);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        if ($book->delete()) {
            return redirect()->route('book.index')->with('success', 'Xóa thành công.');
        }
        return redirect()->route('book.index')->with('error', 'Xóa thất bại.');
    }
}
