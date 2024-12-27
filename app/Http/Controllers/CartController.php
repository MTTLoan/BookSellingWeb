<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cart;

class CartController extends \Illuminate\Routing\Controller
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
}
