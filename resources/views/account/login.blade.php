@extends('layout.app')

@section('title', 'Đăng Nhập')

@section('content')
<div class="container-sm p-0">
    <div class="content p-4">
        <form id="login">
            <div class="title fs-1 fw-bold text-center mb-4">
                <h2>ĐĂNG NHẬP</h2>
            </div>
            <div class="mb-3">
                <label for="account_name" class="form-label">Tên tài khoản</label>
                <i class="text-danger">(*)</i>
                <input type="text" class="form-control" name="account_name" id="account_name"
                    placeholder="Nhập vào tên tài khoản..." required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <i class="text-danger">(*)</i>
                <input type="text" class="form-control" name="password" id="password" placeholder="Nhập vào mật khẩu..."
                    required />
            </div>
            <div class="group_btn d-flex justify-content-center mt-4 p-2">
                <button type="reset" class="btn btn_cancel me-3" id="btnCancel" type="button">
                    Hủy
                </button>
                <button type="submit" class="btn btn_login" id="btnLogin">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/login.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush