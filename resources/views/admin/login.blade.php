@extends('master.admin')

@section('title', 'Đăng Nhập')

@section('content')
<div class="content">
    <form id="loginForm" method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="title fw-bold text-center mb-4">
            <h2>ĐĂNG NHẬP</h2>
        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Tên tài khoản</label>
            <i class="text-danger">(*)</i>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập vào tên tài khoản..."
                required />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <i class="text-danger">(*)</i>
            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập vào mật khẩu..."
                required />
        </div>
        <div class="d-flex justify-content-start text-danger">
            <a href="{{ route('account.forgot-password') }}" class="forgot">Bạn quên mật khẩu?</a>
        </div>
        <div class="group_btn d-flex justify-content-center mt-4 p-2">
            <button type="reset" class="btn btn_cancel me-3" id="btnCancel">
                Hủy
            </button>
            <button type="submit" class="btn btn_login" id="btnLogin">
                Đăng nhập
            </button>
        </div>
    </form>
</div>
<script>
const forgotPasswordUrl = "#";
</script>
@endsection

@push('styles')
<link href="{{ asset('assets/css/admin/login.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/account/login_admin.js') }}"></script>
@endpush
