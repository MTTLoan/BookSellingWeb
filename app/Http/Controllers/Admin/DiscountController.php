<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Discount;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Discount::with(['branches']);
    $employee = auth('web')->user();

    // Truy vấn theo vai trò
    if ($employee->role === 'admin') {
        // Admin xem tất cả khuyến mãi
        $discounts = Discount::all();  // Admin can view all discounts
    } else {
        // Staff and Branch Manager can only view discounts for their own branch
        $discounts = Discount::join('branches_discounts', 'discounts.id', '=', 'branches_discounts.discount_id')
            ->where('branches_discounts.branch_id', $employee->branch_id)
            ->select('discounts.*')
            ->get();
    }

    $discounts = $query->orderBy('id', 'asc')->paginate(20);
    // Pass data to the view
    return view('admin.discount.index', compact('discounts'));
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
