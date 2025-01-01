<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    // public function index()
    // {
    //     // Lấy tất cả các loại sách (book types)
    //     $bookTypes = DB::table('booktypes')
    //         ->select('booktypes.id as booktype_id', 'booktypes.name as booktype_name')
    //         ->get();

    //     $bookTitles = [];

    //     foreach ($bookTypes as $bookType) {
    //         // Lấy thông tin sách cho mỗi loại sách, bao gồm giá, số lượng bán ra, và ảnh của sách có id nhỏ nhất
    //         $titles = DB::table('booktitles')
    //             ->join('books', 'booktitles.id', '=', 'books.book_title_id')
    //             ->leftJoin('order_details', 'books.id', '=', 'order_details.book_id')
    //             ->leftJoin('images', 'books.id', '=', 'images.book_id')
    //             ->select(
    //                 'booktitles.id as book_title_id',
    //                 'booktitles.name as book_title_name',
    //                 'booktitles.author',
    //                 'books.unit_price',
    //                 DB::raw('COALESCE(SUM(order_details.quantity), 0) as sold_quantity'),
    //                 DB::raw('MIN(images.url) as image_url') // Lấy ảnh có id nhỏ nhất
    //             )
    //             ->where('booktitles.book_type_id', $bookType->booktype_id)
    //             ->groupBy(
    //                 'booktitles.id',
    //                 'booktitles.name',
    //                 'booktitles.author',
    //                 'books.unit_price'
    //             )
    //             ->orderBy('booktitles.id', 'asc')
    //             ->limit(10) // Lấy tối đa 10 sách cho mỗi loại sách
    //             ->get();

    //         // Thêm các book titles vào mảng theo tên loại sách
    //         $bookTitles[$bookType->booktype_name] = $titles;
    //     }

    //     // Trả về view với dữ liệu bookTitles
    //     return view('home.index', compact('bookTitles'));
    // }

    public function index()
    {
        // Lấy tất cả các loại sách (book types)
        $bookTypes = DB::table('booktypes')->get();

        $bookTitles = [];

        foreach ($bookTypes as $bookType) {
            $titles = DB::table('booktitles')
                ->join('books', 'booktitles.id', '=', 'books.book_title_id')
                ->leftJoin('order_details', 'books.id', '=', 'order_details.book_id')
                ->join('images', 'books.id', '=', 'images.book_id')
                ->where('booktitles.book_type_id', $bookType->id)
                ->select(
                    'booktitles.id',
                    'booktitles.name',
                    'booktitles.author',
                    DB::raw('MIN(books.unit_price) as unit_price'),
                    DB::raw('COALESCE(SUM(order_details.quantity), 0) as sold_quantity'),
                    DB::raw('MIN(images.url) as image_url')
                )
                ->groupBy(
                    'booktitles.id',
                    'booktitles.name',
                    'booktitles.author',
                    'booktitles.book_type_id'
                )
                ->orderBy('booktitles.name', 'asc')
                ->limit(10) // Lấy tối đa 10 sách cho mỗi loại sách
                ->get();

            $bookTitles[$bookType->name] = $titles;
        }

        return view('home.index', compact('bookTitles'));
    }
}
