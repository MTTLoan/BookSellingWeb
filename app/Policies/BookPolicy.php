<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the employee can view any models.
     */
    public function viewAny(Employee $employee)
    {
        // Staff và Branch Manager chỉ xem sách thuộc chi nhánh của mình
        return in_array($employee->role, ['staff', 'branch_manager', 'admin']);
    }

    /**
     * Determine whether the employee can view the model.
     */
    public function view(Employee $employee, Book $book)
    {
        // Kiểm tra sách thuộc chi nhánh nào thông qua bảng trung gian BOOKS_BRANCHES
        $branchBooks = $employee->branch->books->pluck('id')->toArray();

        if (in_array($employee->role, ['staff', 'branch_manager'])) {
            return in_array($book->id, $branchBooks);
        }

        return true; // Admin có thể xem mọi sách
    }

    /**
     * Determine whether the employee can create models.
     */
    public function create(Employee $employee): bool
    {
        return in_array($employee->role, ['admin', 'branch_manager']);
    }

    /**
     * Determine whether the employee can update the model.
     */
    public function update(Employee $employee, Book $book)
    {
        // Kiểm tra sách thuộc chi nhánh nào thông qua bảng trung gian BOOKS_BRANCHES
        $branchBooks = $employee->branch->books->pluck('id')->toArray();

        if ($employee->role === 'admin') {
            return true; // Admin có quyền sửa mọi sách
        }

        if ($employee->role === 'branch_manager') {
            return in_array($book->id, $branchBooks); // Chỉ sửa sách trong chi nhánh của mình
        }

        return false;
    }

    /**
     * Determine whether the employee can delete the model.
     */
    public function delete(Employee $employee, Book $book)
    {
        return $employee->role === 'admin';
    }

    /**
     * Determine whether the employee can restore the model.
     */
    public function restore(Employee $employee, Book $book)
    {
        // Admin có thể khôi phục sách, các vai trò khác không được phép
        return $employee->role === 'admin';
    }

    /**
     * Determine whether the employee can permanently delete the model.
     */
    public function forceDelete(Employee $employee, Book $book)
    {
        // Admin có thể xóa vĩnh viễn sách, các vai trò khác không được phép
        return $employee->role === 'admin';
    }
}
