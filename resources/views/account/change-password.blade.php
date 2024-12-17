@extends('master.main')

@section('title', 'Đổi Mật Khẩu')

@section('content')
<div class="form-container">

    <form action="{{route('account.change-password')}}" method="POST">
        @csrf
        <div class="form-title">
            <h2 class="fs-1 fw-bold">Đổi mật khẩu</h2>
            <h5 class="text-secondary">Cập nhật mật khẩu của bạn</h5>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <hr />
            <h6>
                Mật khẩu của bạn phải chứa ít nhất 6 ký tự.
            </h6>
        </div>
        <div class="form_changepassword">
            <div class="d-flex align-items-center my-3 py-2">
                <span for="current_password" class="form-label fw-bold text-nowrap me-2">
                    Mật khẩu cũ <i class="text-danger">(*)</i>
                </span>
                <input type="password" class="form-control" name="current_password" id="current_password"
                    placeholder="Nhập mật khẩu cũ" required />
            </div>
            <div class="d-flex align-items-center mb-3 py-2">
                <span for="new_password" class="form-label fw-bold text-nowrap me-2">
                    Mật khẩu mới <i class="text-danger">(*)</i>
                </span>
                <input type="password" class="form-control" name="new_password" id="new_password"
                    placeholder="Nhập mật khẩu mới" required />
            </div>
            <div class="d-flex align-items-center mb-3 py-2">
                <span for="new_password_confirmation" class="form-label fw-bold text-nowrap me-2">
                    Xác nhận mật khẩu <i class="text-danger">(*)</i>
                </span>
                <input type="password" class="form-control" name="new_password_confirmation"
                    id="new_password_confirmation" placeholder="Nhập lại mật khẩu mới" required />
            </div>
        </div>
        <div class="group_btn d-flex justify-content-end mt-4 p-2">
            <button class="btn btn_cancel me-3" id="btnCancel" type="button">
                Hủy
            </button>
            <button type="submit" class="btn btn_save" id="btnSave">
                Lưu
            </button>
        </div>
    </form>
</div>
</div>

@endsection

@push('styles')
<link href="{{ asset('assets/css/account/changepassword.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/account/changepassword.js') }}"></script>
@endpush