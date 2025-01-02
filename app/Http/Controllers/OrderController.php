<?php

namespace App\Http\Controllers;

use App\Models\BookBranch;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
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
        $customer = auth('cus')->user();
        $cartItems = Cart::with(['book', 'book.bookTitle', 'book.images'])
            ->where('customer_id', $customer->id)
            ->get();

        return view('ThongTinGiaoHang', compact('customer', 'cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:100',
            'ward' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'date_received' => 'nullable|date',
            'discount_id' => 'nullable|exists:discounts,id',
            'total_price' => 'required|integer|min:0',
        ]);

        $customer = auth('cus')->user();
        $cartItems = Cart::with('book')->where('customer_id', $customer->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        try {
            DB::transaction(function () use ($request, $customer, $cartItems) {
                // Tạo đơn hàng mới
                $order = Order::create([
                    'type' => 'Website',
                    'status' => 'Đã xác nhận',
                    'address' => $request->address,
                    'ward' => $request->ward,
                    'district' => $request->district,
                    'province' => $request->province,
                    'date_received' => $request->date_received,
                    'total_price' => $request->total_price,
                    'discount_id' => $request->discount_id,
                    'customer_id' => $customer->id,
                ]);

                // Thêm chi tiết đơn hàng và cập nhật số lượng sách
                foreach ($cartItems as $item) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'book_id' => $item->book_id,
                        'quantity' => $item->quantity,
                        'price' => $item->book->unit_price,
                    ]);

                    // Trừ số lượng sách trong bảng books
                    $item->book->decrement('quantity', $item->quantity);

                    // Trừ số lượng sách trong bảng books_branches
                    $bookBranch = BookBranch::where('book_id', $item->book_id)
                        ->first();
                    if ($bookBranch) {
                        $bookBranch->decrement('quantity', $item->quantity);
                    }
                }

                // Xóa giỏ hàng
                Cart::where('customer_id', $customer->id)->delete();
            });

            return redirect()->route('cart.index')->with('success', 'Đơn hàng của bạn đã được tạo thành công.');
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Đã xảy ra lỗi khi tạo đơn hàng: ' . $e->getMessage());
        }
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
