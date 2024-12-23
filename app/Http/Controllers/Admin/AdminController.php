<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
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
        if (auth('web')->attempt(['name' => $data['name'], 'password' => $data['password']])) {
            if (auth('web')->check() && auth('web')->user()->email_verified_at == null) {
                auth('web')->logout();
                return response()->json([
                    'success' => false,
                    'message' => 'Tài khoản chưa được xác thực.',
                ], 403);
            }

            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công.',
                'user' => auth('web')->user(),
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Sai tên tài khoản hoặc mật khẩu.',
        ], 422);
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('admin.login')->with('ok', 'logouted');
    }
}