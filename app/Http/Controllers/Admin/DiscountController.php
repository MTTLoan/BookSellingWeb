<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Discount;
use App\Models\BranchDiscount;
use App\Models\Employee;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    use AuthorizesRequests;

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
                ->orderBy('id', 'asc')->paginate(20);
        }

        // $discounts = discount::all();
        // Pass data to the view
        return view('admin.discount.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
   
    // Show the form for creating a new discount
    public function create()
    {
        $this->authorize('create', Discount::class);
        return view('admin.discount.create');
    }

    // Store a newly created discount
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:discounts',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'value' => 'required|integer|min:0',
            'starting_price' => 'required|integer|min:0',
        ], [
            'value.integer' => 'Giá trị phải là số nguyên',
            'code.unique' => 'Mã giảm giá đã tồn tại',
            'end_date.date' => 'Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu',
            'starting_price.integer' => 'Giá trị áp dụng phải là số nguyên',
        ]);

        try {
            // Create the discount
            $discount = Discount::create($request->all());

            // Get the branch of the logged-in employee (assumed the user is a branch manager)
            $employee = auth('web')->user();
            
            if ($employee->role === 'branch_manager') {
                // Add the discount to the manager's branch
                $branchDiscount = BranchDiscount::create();
                $branchDiscount->discount_id = $discount->id;
                $branchDiscount->branch_id = $employee->branch_id;
                $branchDiscount->save();
            }

            return redirect()->route('discount.index')->with('success', 'Khuyến mãi đã được thêm thành công và liên kết với chi nhánh của bạn.');
        } catch (\Exception $e) {
            // Log the error and show an error message to the user
            Log::error('Error adding discount: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Lỗi xảy ra, vui lòng thử lại.']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        $this->authorize('view', $discount);

        $discount->load('branches');
        return view('admin.discount.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        $this->authorize('update', $discount);
        return view('admin.discount.edit', compact('discount'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:discounts,code,' . $discount->id,
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'value' => 'required|integer|min:0',
            'starting_price' => 'required|integer|min:0',
        ]);

        try {
            $discount->update($request->all());
            return redirect()->route('discount.index')->with('success', 'Khuyến mãi đã được sửa thành công.');
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Lỗi xảy ra, vui lòng thử lại.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $this->authorize('delete', $discount);
        try {
            // Xóa khuyến mãi
            $discount->delete();

            return redirect()->route('discount.index')->with('success', 'Xóa khuyến mãi thành công.');
        } catch (\Exception $e) {
            Log::error('Lỗi: ' . $e->getMessage());
            return redirect()->route('discount.index')->with('error', 'Xóa khuyến mãi thất bại.');
        }
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

    public function listDiscounts()
    {
        $discounts = Discount::where('type', 'Website')->get();
        return view('LayVoucher', compact('discounts'));
    }
}
