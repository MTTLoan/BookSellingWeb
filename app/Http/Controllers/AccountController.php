<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Mail\VerifyAccount;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function register(){
        return view('account.register');
    }

    public function checkRegister(Request $req){
        $req->validate([
            'name' => 'required|min:3|max:100|regex:/^[\S]*$/', 
            'fullname' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email', // Email bắt buộc, duy nhất
            'password' => 'required|min:6|confirmed', // Mật khẩu, ít nhất 6 ký tự, khớp với xác nhận
            'phone_number' => 'required|digits_between:10,11', // Số điện thoại phải từ 10-11 chữ số
            'birthday' => 'required|date|before:today', // Ngày sinh hợp lệ, phải trước hôm nay
            'address' => 'required|min:5|max:255', // Địa chỉ từ 5-255 ký tự
            'ward' => 'required|string|max:100', // Phường/xã bắt buộc
            'district' => 'required|string|max:100', // Quận/huyện bắt buộc
            'province' => 'required|string|max:100', // Tỉnh/thành phố bắt buộc
            'sex' => 'required|in:Nam,Nữ', // Giới tính: male, female
        ], [
            // Thông báo lỗi tùy chỉnh
            'name.required' => 'Tên không được để trống.',
            'name.min' => 'Tên phải có ít nhất 3 ký tự.',
            'name.max' => 'Tên không được vượt quá 100 ký tự.',
            'name.regex' => 'Tên không được chứa khoảng trắng.',
    
            'fullname.required' => 'Tên không được để trống.',
            'fullname.min' => 'Tên phải có ít nhất 3 ký tự.',
            'fullname.max' => 'Tên không được vượt quá 100 ký tự.',

            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',
    
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
    
            'phone_number.required' => 'Số điện thoại không được để trống.',
            'phone_number.digits_between' => 'Số điện thoại phải có từ 10 đến 11 chữ số.',
    
            'birthday.required' => 'Ngày sinh không được để trống.',
            'birthday.date' => 'Ngày sinh phải là ngày hợp lệ.',
            'birthday.before' => 'Ngày sinh phải nhỏ hơn ngày hiện tại.',
    
            'address.required' => 'Địa chỉ không được để trống.',
            'address.min' => 'Địa chỉ phải có ít nhất 5 ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
    
            'ward.required' => 'Phường/xã không được để trống.',
            'ward.string' => 'Phường/xã phải là một chuỗi ký tự hợp lệ.',
            'ward.max' => 'Phường/xã không được vượt quá 100 ký tự.',
    
            'district.required' => 'Quận/huyện không được để trống.',
            'district.string' => 'Quận/huyện phải là một chuỗi ký tự hợp lệ.',
            'district.max' => 'Quận/huyện không được vượt quá 100 ký tự.',
    
            'province.required' => 'Tỉnh/thành phố không được để trống.',
            'province.string' => 'Tỉnh/thành phố phải là một chuỗi ký tự hợp lệ.',
            'province.max' => 'Tỉnh/thành phố không được vượt quá 100 ký tự.',
    
            'sex.required' => 'Giới tính không được để trống.',
            'sex.in' => 'Giới tính không hợp lệ. Chỉ chấp nhận Nam, Nữ',
        ]);
    
        // Tạo người dùng mới trong bảng `users`
        $userData = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
        ];

        $user = User::create($userData);

        $customerData = [
            'fullname' => $req->fullname,
            'birthday' => $req->birthday,
            'address' => $req->address,
            'ward' => $req->ward,
            'district' => $req->district,
            'province' => $req->province,
            'sex' => $req->sex,
            'phone_number' => $req->phone_number,
            'total_revenue' => 0, // Giá trị mặc định có thể là 0
            'user_id' => $user->id, // Sử dụng ID của người dùng vừa tạo
        ];

        // Tạo khách hàng mới trong bảng `customers`
        Customer::create($customerData);
 
        if ($acc=User::where('email', $req->email)->firstOrFail()){
            Mail::to($req->email)->send(new VerifyAccount($acc));
           // return redirect()->route('account.login')->with('ok','Register successfully');
    }       
         return redirect()->back()->with('no','Something error, try again');
    }

    public function verify($email){
        $acc=User::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        User::where('email', $email)->update(['email_verified_at'=>now()]);
        return redirect()->route('account.login')->with('ok','Verify account successfully');
    }
}