<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        // tạo 1 tài khoản admin tạm thời
        Employee::create([
            'name' => 'admin',
            'email' => '22520782@gm.uit.edu.vn',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'role' => 'admin',
            'fullname' => 'Admin',
            'sex' => 'Nam',
            'birthday' => '2000-01-01',
            'address' => '123 Phan Văn Trị',
            'starting_date' => '2020-01-01',
            'salary' => 10000000,
        ]);
        return view('admin.login');
    }

    public function checkLogin(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|exists:employees,name', // Kiểm tra tên tài khoản
            'password' => 'required',
        ]);

        $data = $req->only('name', 'password');

        // Sử dụng key đúng trong auth()->attempt()
        if (auth('emp')->attempt(['name' => $data['name'], 'password' => $data['password']])) {
            if (auth('emp')->check() && auth('emp')->user()->email_verified_at == null) {
                auth('emp')->logout();
                return response()->json([
                    'success' => false,
                    'message' => 'Tài khoản chưa được xác thực.',
                ], 403);
            }

            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công.',
                'user' => auth('emp')->user(),
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Sai tên tài khoản hoặc mật khẩu.',
        ], 422);
    }

    public function logout()
    {
        auth('emp')->logout();
        return redirect()->route('admin.login')->with('ok', 'logouted');
    }
}
