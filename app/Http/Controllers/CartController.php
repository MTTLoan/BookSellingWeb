<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if (!auth('cus')->check()) {
            return response()->json(['message' => 'Bạn cần đăng nhập để thêm vào giỏ hàng.'], 401);
        }

        $userId = auth('cus')->id();
        $bookTitleId = $request->input('book_title_id');

        $book = Book::where('book_title_id', $bookTitleId)->first();
        if (!$book) {
            return response()->json(['message' => 'Sách không tồn tại.'], 404);
        }
        $bookId = $book->id;

        $cartItem = Cart::where('customer_id', $userId)->where('book_id', $bookId)->first();
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'customer_id' => $userId,
                'book_id' => $bookId,
                'quantity' => 1,
            ]);
        }

        return response()->json(['message' => 'Sách đã được thêm vào giỏ hàng!']);
    }

    public function showCart()
    {
        if (!auth('cus')->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }

        $userId = auth('cus')->id();

        // Lấy các item trong giỏ hàng và ảnh đầu tiên của mỗi cuốn sách
        $cartItems = Cart::with(['book.bookTitle', 'book.images' => function ($query) {
            $query->orderBy('created_at')->limit(1); // Lấy ảnh đầu tiên theo thời gian tạo
        }])
            ->where('customer_id', $userId)
            ->get();

        $totalQuantity = $cartItems->sum('quantity');
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->quantity * $cartItem->book->unit_price;
        });

        return view('GioHang', compact('cartItems', 'totalQuantity', 'totalPrice'));
    }


    public function updateCart(Request $request)
    {
        if (!auth('cus')->check()) {
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để cập nhật giỏ hàng.'], 401);
        }

        $userId = auth('cus')->id();
        $cartItemId = $request->input('item_id');
        $newQuantity = $request->input('quantity');

        $cartItem = Cart::where('id', $cartItemId)->where('customer_id', $userId)->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng.'], 404);
        }

        // Cập nhật số lượng
        $cartItem->quantity = $newQuantity;
        $cartItem->save();

        // Tính lại tổng số lượng và tổng tiền
        $totalQuantity = Cart::where('customer_id', $userId)->sum('quantity');
        $totalPrice = Cart::where('customer_id', $userId)->sum(function ($item) {
            return $item->quantity * $item->book->unit_price;
        });

        return response()->json([
            'success' => true,
            'message' => 'Giỏ hàng đã được cập nhật.',
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}