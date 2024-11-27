<!-- resources/views/register.blade.php -->
@extends('layout.app')

@section('title', 'Đăng Ký')

@section('content')
<div class="form-container">
    <div class="form-title">ĐĂNG KÝ</div>
    <form id="registrationForm" method="POST" action="{{ route('DangKy') }}">
        @csrf
        <!-- Các trường input form ở đây -->
        <div class="mb-3">
            <label for="username" class="form-label">Tên tài khoản (*)</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Mô tả cụ thể tại đây"
                required>
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên (*)</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Mô tả cụ thể tại đây"
                required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email (*)</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Mô tả cụ thể tại đây"
                required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại (*)</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Mô tả cụ thể tại đây" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu (*)</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mô tả cụ thể tại đây"
                required>
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Nhập lại mật khẩu (*)</label>
            <input type="password" class="form-control" id="confirm-password" name="password_confirmation"
                placeholder="Mô tả cụ thể tại đây" required>
        </div>
        <div class="btn-container">
            <button type="reset" class="btn btn-cancel">Hủy</button>
            <button type="submit" class="btn btn-register">Đăng ký</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
body {
    background-color: #f7f7f7 !important;
}

.form-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-title {
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 24px;
}

.form-group label {
    font-weight: bold;
}

.btn-container {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn {
    flex: 0 0 30%;
}

.btn-register {
    background-color: #C53327 !important;
    color: white !important;
}

.btn-cancel {
    background-color: white !important;
    color: #C53327 !important;
    border-color: #C53327 !important;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registrationForm').addEventListener('submit', function(event) {

        event.preventDefault(); // Ngăn chặn hành động mặc định của form
        window.location.href = '{{ route("NhapOTP") }}'; // Chuyển hướng đến trang NhapOTP
    });
});
</script>
@endpush
