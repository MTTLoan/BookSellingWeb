<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
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

    public function checkDiscount(Request $request)
    {
        $code = $request->input('code');
        $totalPrice = $request->input('total_price');

        $discount = Discount::where('code', $code)
            ->where('starting_price', '<=', $totalPrice)
            ->where('end_date', '>=', now())
            ->first();

        if ($discount) {
            return response()->json([
                'success' => true,
                'discount' => $discount->value,
                'discount_id' => $discount->id,
                'message' => 'Mã giảm giá hợp lệ.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn.'
            ]);
        }
    }
}
