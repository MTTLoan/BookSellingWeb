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
        // Lấy tất cả các loại sách (book types)
        $bookTypes = DB::table('booktypes')
            ->select('booktypes.id as booktype_id', 'booktypes.name as booktype_name')
            ->get();

        $bookTitles = [];

        foreach ($bookTypes as $bookType) {
            // Lấy thông tin sách cho mỗi loại sách, bao gồm giá, số lượng bán ra, và ảnh của sách có id nhỏ nhất
            $titles = DB::table('booktitles')
                ->join('books', 'booktitles.id', '=', 'books.book_title_id')
                ->leftJoin('order_details', 'books.id', '=', 'order_details.book_id')
                ->leftJoin('images', 'books.id', '=', 'images.book_id')
                ->select(
                    'booktitles.id as book_title_id',
                    'booktitles.name as book_title_name',
                    'booktitles.author',
                    'books.unit_price',
                    DB::raw('COALESCE(SUM(order_details.quantity), 0) as sold_quantity'),
                    DB::raw('MIN(images.url) as image_url') // Lấy ảnh có id nhỏ nhất
                )
                ->where('booktitles.book_type_id', $bookType->booktype_id)
                ->groupBy(
                    'booktitles.id',
                    'booktitles.name',
                    'booktitles.author',
                    'books.unit_price'
                )
                ->orderBy('booktitles.id', 'asc')
                ->limit(10) // Lấy tối đa 10 sách cho mỗi loại sách
                ->get();

            // Thêm các book titles vào mảng theo tên loại sách
            $bookTitles[$bookType->booktype_name] = $titles;
        }

        // Trả về view với dữ liệu bookTitles
        return view('home.index', compact('bookTitles'));
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
                'reviews.created_at as created_at'
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

    public function showBookByType($booktype_id)
    {
        // Lấy tên thể loại sách
        $booktypeName = DB::table('booktypes')
            ->select('name')
            ->where('id', $booktype_id)
            ->first()
            ->name;

        // Lấy thông tin sách dựa vào thể loại
        $books = DB::table('booktypes')
            ->distinct()
            ->select([
                'booktypes.id as booktype_id',
                'booktypes.name as booktype_name',
                'books.id as book_id',
                'booktitles.name as book_name',
                'books.cost as price',
                'saled_books.total_quantity as quantity',
            ])
            ->join('booktitles', 'booktitles.book_type_id', '=', 'booktypes.id')
            ->join('books', 'books.book_title_id', '=', 'booktitles.id')
            ->join('order_details', 'order_details.book_id', '=', 'books.id')
            ->joinSub(
                DB::table('order_details')
                    ->select('books.id as saledbook_id', DB::raw('SUM(order_details.quantity) as total_quantity'))
                    ->join('books', 'books.id', '=', 'order_details.book_id')
                    ->groupBy('books.id'),
                'saled_books',
                'books.id',
                '=',
                'saled_books.saledbook_id'
            )
            ->where('booktypes.id', $booktype_id)
            ->get();

        // Lấy ảnh của lần lượt các sách trả về
        $images = [];
        foreach ($books as $b) {
            $image = DB::table('images')
                ->select('images.url as image_url')
                ->where('images.book_id', '=', $b->book_id)
                ->get()
                ->first();
            $images[$b->book_id] = $image ? $image->image_url : null;
        }
        // dd($images);
        return view('VanHoc_DanhMuc', compact(['booktypeName', 'books', 'images']));
    }
}