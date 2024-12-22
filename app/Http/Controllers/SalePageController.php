<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SalePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('booktypes')
        ->join('booktitles', 'booktitles.book_type_id', '=', 'booktypes.id')
        ->join('books', 'books.book_title_id', '=', 'booktitles.id')
        ->join('images', 'images.book_id', '=', 'books.id')
        ->join('order_details', 'books.id', '=', 'order_details.book_id')
        ->select(
            'books.id as book_id',
            'booktypes.name as booktypes_name', 
            'booktypes.quantity as booktypes_quantity',
            'booktypes.category as category',
            'booktitles.name as booktitles_name',
            'booktitles.author as author',
            'booktitles.description as description',
            'books.quantity as quantity',
            'books.unit_price as unit_price',
            'books.cost as cost',
            'books.publishing_year as publishing_year',
            'books.page_number as page_number',
            'images.url as cover',
            'order_details.quantity as order_quantity'
        )
        ->get();

        // Khởi tạo mảng kết quả theo category
        $booksByCategory = [];
        $booktype_name_list = [];

        // Duyệt qua các sách và nhóm theo category
        foreach ($books as $book) {
            // Kiểm tra nếu category này đã có trong mảng
            if (!isset($booksByCategory[$book->category])) {
                $booksByCategory[$book->category] = [];
            }
            // Kiểm tra nếu booktype_name này đã có trong mảng
            if (!isset($booktype_name_list[$book->category])) {
                $booktype_name_list[$book->category] = [];
            }

            // Thêm thông tin booktype vào mảng của category
            $booktype_name_list[$book->category][] = $book->booktypes_name;

            // Thêm thông tin sách vào mảng của category
            $booksByCategory[$book->category][] = [
                'book_id' => $book->book_id,
                'book_type_name' => $book->booktypes_name,
                'book_type_quantity' => $book->booktypes_quantity,
                'book_title_name' => $book->booktitles_name,
                'author' => $book->author,
                'description' => $book->description,
                'book_quantity' => $book->quantity,
                'unit_price' => $book->unit_price,
                'cost' => $book->cost,
                'publishing_year' => $book->publishing_year,
                'page_number' => $book->page_number,
                'cover' => $book->cover,
                'order_quantity' => $book->order_quantity,
            ];
        }

        // Lọc các booktype_name trùng lặp
        $booktype_name_list = array_map("array_unique", $booktype_name_list); 
                
        // return view('home.index', compact(['booksByCategory', 'booktype_name_list']));

    }

    public function showBookDetails($book_id)
    {
        // Lấy thông tin sách dựa vào id
        $book = DB::table('books')
            ->distinct()
            ->select(
                'books.id as book_id',
                'booktitles.name as book_name',
                'books.publishing_year as publishing_year',
                'suppliers.name as supplier_name',
                'booktitles.author as author',
                'order_details.quantity as order_quantity',
                'books.unit_price',
                'booktypes.category as book_category',
                'booktypes.name as book_type_name',
                'booktitles.description as book_description',
                'books.page_number as page_number',
            )
            ->join('booktitles', 'booktitles.id', '=', 'books.book_title_id')
            ->join('booktypes', 'booktypes.id', '=', 'booktitles.book_type_id')
            ->join('order_details', 'order_details.book_id', '=', 'books.id')
            ->join('suppliers', 'suppliers.id', '=', 'booktitles.supplier_id')
            ->where('books.id', '=', $book_id)
            ->get()
            ->first();

        // dd($book);
        
        // Lấy ảnh sách
        $images = DB::table('images')
            ->select(
                'images.url as image_url'
            )
            ->where('images.book_id', '=', $book_id)
            ->get()
            ->take(5)
            ->toArray();

        // Lấy điểm đánh giá tổng thể dùng hiển thị trong thông tin sách
        $review_score = DB::table('books')
            ->select(
            'books.id',
                DB::raw('ROUND(AVG(reviews.score)) as review_score'),
                DB::raw('COUNT(reviews.id) as review_count')
            )
            ->join('reviews', 'reviews.book_id', '=', 'books.id')
            ->where('books.id', $book_id)
            ->groupBy('books.id')
            ->first(); 

        // Lấy thông tin đường dẫn navbar
        $navbar_info = DB::table('books')
            ->distinct()
            ->select(
                'booktypes.category as booktype_category',
                'booktypes.name as booktype_name',
                'booktitles.name as book_name'
            )
            ->join('booktitles', 'booktitles.id', '=', 'books.book_title_id')
            ->join('booktypes', 'booktypes.id', '=', 'booktitles.book_type_id')
            ->where('books.id', $book_id)
            ->get()
            ->first();
            

        // Tạo biến category để lấy sách cùng danh mục
        $category = $navbar_info->booktype_category;
       
        // Lấy thông tin sách cùng danh muc
        $book_same_category = DB::table('books')
            ->distinct()
            ->select(
                'books.id as book_id',
                'booktitles.name as book_name',
                'books.publishing_year as publishing_year',
                'suppliers.name as supplier_name',
                'booktitles.author as author',
                'order_details.quantity as order_quantity',
                'books.unit_price',
                'booktypes.category as book_category',
                'booktypes.name as book_type_name',
            )
            ->join('booktitles', 'booktitles.id', '=', 'books.book_title_id')
            ->join('booktypes', 'booktypes.id', '=', 'booktitles.book_type_id')
            ->join('order_details', 'order_details.book_id', '=', 'books.id')
            ->join('suppliers', 'suppliers.id', '=', 'booktitles.supplier_id')
            ->where('booktypes.category', '=', $category)
            ->get()
            ->take(2)
            ->toArray();
        
        $book_same_category_image = [];
        foreach ($book_same_category as $it) {
            $image = DB::table('images')
                ->select(
                    'images.url as image_url'
                )
                ->where('images.book_id', '=', $it->book_id)
                ->get()
                ->first();
            $book_same_category_image[] = $image->image_url;
        }   

        // Lấy phân bố đánh giá sách
        $review_distribution = [];
        $review_total = DB::table('reviews')
            ->select(
                DB::raw('COUNT(reviews.id) as review_count')
            )
            ->first()
            ->review_count;
        
        $review_list = DB::table('reviews')
            ->select(
                'reviews.score as score',
            )
            ->get()
            ->toArray();

        foreach ($review_list as $review) {
            if (!isset($review_distribution[$review->score])) {
                $review_distribution[$review->score] = 0;
            }
            $review_distribution[$review->score]++;
        }

        //Lấy đánh giá sách của khách hàng
        $customer_reviews = DB::table('reviews')
        ->distinct()
        ->select(
            'customers.id as customer_id',
            'customers.name as customer_name',
            'reviews.description',
            DB::raw('ROUND(reviews.score) as review_score'),
            'reviews.created_at'
        )
        ->join('order_details', 'order_details.book_id', '=', 'reviews.book_id')
        ->join('orders', 'orders.id', '=', 'order_details.order_id')
        ->join('customers', 'customers.id', '=', 'orders.customer_id')
        ->where('reviews.book_id', $book_id)
        ->get()
        ->toArray();
        // dd($customer_reviews);

        return view('ChiTietSanPham', compact(['book', 'images', 'review_total', 'review_score', 'navbar_info', 'book_same_category', 'review_distribution', 'customer_reviews', 'book_same_category_image']));
    }

    public function showBookByCategory($category) {
        // $books = DB::table('booktypes')
        // ->join('booktitles', 'booktitles.book_type_id', '=', 'booktypes.id')
        // ->join('books', 'books.book_title_id', '=', 'booktitles.id')
        // ->join('images', 'images.book_id', '=', 'books.id')
        // ->join('order_details', 'books.id', '=', 'order_details.book_id')
        // ->select(
        //     'books.id as book_id',
        //     'booktypes.name as booktypes_name', 
        //     'booktypes.quantity as booktypes_quantity',
        //     'booktypes.category as category',
        //     'booktitles.name as booktitles_name',
        //     'booktitles.author as author',
        //     'booktitles.description as description',
        //     'books.quantity as quantity',
        //     'books.unit_price as unit_price',
        //     'books.cost as cost',
        //     'books.publishing_year as publishing_year',
        //     'books.page_number as page_number',
        //     'images.url as cover',
        //     'order_details.quantity as order_quantity'
        // )
        // ->where('booktypes.category', $category)
        // ->get();

        // dd($books);
    }
}
