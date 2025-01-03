<?php

namespace App\Policies;

use App\Models\Discount;
use App\Models\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscountPolicy
{
    use HandlesAuthorization;

    public function viewAny(Employee $employee)
    {
        // Staff và Branch Manager chỉ xem khuyến mãi thuộc chi nhánh của mình
        return in_array($employee->role, ['branch_manager', 'admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Employee $employee, Discount $discount)
    {
        // Kiểm tra khuyến mãi thuộc chi nhánh nào thông qua bảng trung gian
        $branchDiscounts = $employee->branch->discounts->pluck('id')->toArray();

        if (in_array($employee->role, ['branch_manager'])) {
            return in_array($discount->id, $branchDiscounts);
        }

        return true; // Admin có thể xem mọi khuyến mãi
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Employee $employee): bool
    {
        return in_array($employee->role, ['admin', 'branch_manager']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Employee $employee, Discount $discount)
    {
        // Kiểm tra khuyến mãi thuộc chi nhánh nào thông qua bảng trung gian 
        $branchDiscounts = $employee->branch->discounts->pluck('id')->toArray();

        if ($employee->role === 'admin') {
            return true; // Admin có quyền sửa mọi khuyến mãi
        }

        if ($employee->role === 'branch_manager') {
            return in_array($discount->id, $branchDiscounts); // Chỉ sửa khuyến mãi trong chi nhánh của mình
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Employee $employee, Discount $discount)
    {
        return $employee->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Employee $employee, Discount $discount)
    {
        // Admin có thể khôi phục khuyến mãi, các vai trò khác không được phép
        return $employee->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Employee $employee, Discount $discount)
    {
        // Admin có thể khôi phục khuyến mãi, các vai trò khác không được phép
        return $employee->role === 'admin';
    }
}
