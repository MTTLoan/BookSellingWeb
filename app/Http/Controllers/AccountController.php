<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Mail\VerifyAccount;
use App\Models\User;
use Illuminate\Container\Attributes\DB;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AccountController extends Controller
{
    public function login()
    {
        return view('account.login');
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('home')->with('ok', 'Verify account successfully');
    }

    public function checkLogin(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|exists:users,name', // Kiểm tra tên tài khoản
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

    public function register()
    {
        return view('account.register');
    }

    public function checkRegister(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|min:3|max:100|regex:/^[\S]*$/',
            'fullname' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'phone_number' => 'required|digits_between:10,11',
            'birthday' => 'required|date|before:today',
            'address' => 'required|min:5|max:255',
            'ward' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'sex' => 'required|in:Nam,Nữ',
        ], [
            // Thông báo lỗi tùy chỉnh
            'name.required' => 'Tên không được để trống.',
            'name.min' => 'Tên phải có ít nhất 3 ký tự.',
            'name.max' => 'Tên không được vượt quá 100 ký tự.',
            'name.regex' => 'Tên không được chứa khoảng trắng.',

            'fullname.required' => 'Họ và tên không được để trống.',
            'fullname.min' => 'Họ và tên phải có ít nhất 3 ký tự.',
            'fullname.max' => 'Họ và tên không được vượt quá 100 ký tự.',

            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',

            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',

            'password_confirmation.required' => 'Nhập lại mật khẩu không được để trống.',
            'password_confirmation.same' => 'Nhập lại mật khẩu không khớp.',

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

        if ($validated) {
            try {
                // Tạo người dùng và khách hàng như bình thường
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
                    'total_revenue' => 0,
                    'user_id' => $user->id,
                ];

                Customer::create($customerData);

                // Gửi email xác nhận
                Mail::to($req->email)->send(new VerifyAccount($user));

                // Trả về JSON khi thành công
                return response()->json([
                    'success' => true,
                    'message' => 'Đăng ký thành công. Kiểm tra email của bạn để xác nhận tài khoản.'
                ], 200);
            } catch (\Exception $e) {
                Log::error('Lỗi khi đăng ký: ' . $e->getMessage());

                // Trả về lỗi nếu có lỗi xảy ra
                return response()->json([
                    'success' => false,
                    'error' => 'Có lỗi xảy ra khi gửi email xác nhận. Vui lòng thử lại.'
                ], 500);
            }
        }

        // Nếu có lỗi xác thực, trả về phản hồi lỗi dưới dạng JSON
        return response()->json([
            'errors' => $req->errors(),
            'message' => 'Dữ liệu không hợp lệ.',
        ], 422);
    }

    public function verify($email)
    {
        $acc = User::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        User::where('email', $email)->update(['email_verified_at' => now()]);
        return redirect()->route('account.login')->with('ok', 'Verify account successfully');
    }

    public function profile()
    {
        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Kiểm tra xem người dùng có tồn tại hay không
        if (!$user) {
            return redirect()->route('account.login')->with('error', 'Bạn cần đăng nhập để xem thông tin tài khoản.');
        }

        // Lấy thông tin từ bảng customers
        $customer = $user->customer;

        // Truyền dữ liệu đến view
        return view('account.profile', compact('user', 'customer'));
    }
    public function checkProfile(Request $req)
    {
        $user = Auth::user();

        // Validate dữ liệu đầu vào
        $validated = $req->validate([
            'name' => 'required|min:3|max:100|regex:/^[\S]*$/',
            'fullname' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required|digits_between:10,11',
            'birthday' => 'date|before:today',
            'address' => 'min:5|max:255',
            'ward' => 'string|max:100',
            'district' => 'string|max:100',
            'province' => 'string|max:100',
            'sex' => 'required|in:Nam,Nữ',
        ], [
            // Thông báo lỗi tùy chỉnh
            'name.required' => 'Tên không được để trống.',
            'name.min' => 'Tên phải có ít nhất 3 ký tự.',
            'name.max' => 'Tên không được vượt quá 100 ký tự.',
            'name.regex' => 'Tên không được chứa khoảng trắng.',

            'fullname.required' => 'Họ và tên không được để trống.',
            'fullname.min' => 'Họ và tên phải có ít nhất 3 ký tự.',
            'fullname.max' => 'Họ và tên không được vượt quá 100 ký tự.',

            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',

            'phone_number.required' => 'Số điện thoại không được để trống.',
            'phone_number.digits_between' => 'Số điện thoại phải có từ 10 đến 11 chữ số.',

            'birthday.date' => 'Ngày sinh phải là ngày hợp lệ.',
            'birthday.before' => 'Ngày sinh phải nhỏ hơn ngày hiện tại.',

            'address.min' => 'Địa chỉ phải có ít nhất 5 ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

            'ward.string' => 'Phường/xã phải là một chuỗi ký tự hợp lệ.',
            'ward.max' => 'Phường/xã không được vượt quá 100 ký tự.',

            'district.string' => 'Quận/huyện phải là một chuỗi ký tự hợp lệ.',
            'district.max' => 'Quận/huyện không được vượt quá 100 ký tự.',

            'province.string' => 'Tỉnh/thành phố phải là một chuỗi ký tự hợp lệ.',
            'province.max' => 'Tỉnh/thành phố không được vượt quá 100 ký tự.',

            'sex.required' => 'Giới tính không được để trống.',
            'sex.in' => 'Giới tính không hợp lệ. Chỉ chấp nhận Nam, Nữ',
        ]);

        if ($validated) {
            try {
                $userData = [
                    'name' => $req->name,
                    'email' => $req->email,
                ];

                User::where('id', $user->id)->update($userData);

                $customerData = [
                    'fullname' => $req->fullname,
                    'birthday' => $req->birthday,
                    'address' => $req->address,
                    'ward' => $req->ward,
                    'district' => $req->district,
                    'province' => $req->province,
                    'sex' => $req->sex,
                    'phone_number' => $req->phone_number,
                ];

                Customer::where('user_id', $user->id)->update($customerData);

                // Trả về JSON khi thành công
                return response()->json([
                    'success' => true,
                    'message' => 'Cập nhật thông tin thành công.',
                ], 200);
            } catch (\Exception $e) {
                // Ghi log lỗi và trả về thông báo lỗi
                Log::error('Lỗi khi cập nhật: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Có lỗi xảy ra khi cập nhật thông tin.',
                ], 500);
            }
        }

        return response()->json([
            'errors' => $req->errors(),
            'message' => 'Dữ liệu không hợp lệ.',
        ], 422);
    }

    public function changePassword()
    {
        return view('account.change-password'); 
    }

    public function checkChangePassword(Request $request)
    {
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    // Lấy người dùng hiện tại
    $user = Auth::user();

    // Ensure $user is an instance of User model
    if (!$user instanceof User) {
        return back()->withErrors(['user' => 'Người dùng không hợp lệ.']);
    }

    // Kiểm tra mật khẩu hiện tại
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
    }

    // Cập nhật mật khẩu mới
    $user->password = Hash::make($request->new_password);
    $user->save();

        // Trả về thông báo thành công
        return redirect()->route('account.change-password')->with('success', 'Đổi mật khẩu thành công!');
    }

    public function forgotPassword()
    {
        return view('account.forgot-password');
    }


    public function checkForgotPassword(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
        ]);

        $user=User::where('email',$request->email)->first();

        if ($user) {
            $token = Password::createToken($user);
            $resetLink=route('account.reset-password', ['token' => $token, 'email'=>$request->email]);
            Mail::to($user->email)->send(new PasswordReset($resetLink));

            return back()->with('status', 'Đã gửi email reset mật khẩu.');
        }
        return back()->withErrors(['email'=>'Email không tồn tại.']);
    } 

    public function resetPassword($token)
    {
            return view('account.reset-password', ['token' => $token, 'email' => request('email')]);
    }

public function checkResetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        }
    );

    if ($status == Password::PASSWORD_RESET) {
        return redirect()->route('account.login')->with('status', 'Đặt lại mật khẩu thành công.');
    } elseif ($status == Password::INVALID_TOKEN) {
        return back()->withErrors(['token' => 'Token đặt lại mật khẩu không hợp lệ hoặc đã hết hạn.']);
    }

    return back()->withErrors(['email' => __($status)]);
    }
}