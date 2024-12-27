<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CartController extends \Illuminate\Routing\Controller
{
    public function addToCart(Request $request)
    {
        $bookId = $request->input('book_id');
        $cart = session()->get('cart', []);

        // Nếu sách đã có trong giỏ hàng, tăng số lượng
        if (isset($cart[$bookId])) {
            $cart[$bookId]++;
        } else {
            // Nếu chưa có, thêm sách với số lượng 1
            $cart[$bookId] = 1;
        }

        // Lưu lại vào session
        session()->put('cart', $cart);

        return response()->json(['message' => 'Book added to cart successfully!', 'cart' => $cart]);
    }
}
