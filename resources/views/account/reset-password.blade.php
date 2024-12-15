@extends('master.main')

@section('title', 'Đặt Lại Mật Khẩu')

@section('content')
<div class="content p-4">
    <form action="{{route('account.reset-password', ['token' => $token])}}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="title fw-bold text-center mb-4">
            <h2>ĐẶT LẠI MẬT KHẨU</h2>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
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
        <div class="text-secondary mb-4">
            Mật khẩu của bạn phải chứa ít nhất 8 ký tự, đồng thời
            bao gồm cả chữ số, chữ cái và ký tự đặc biệt (!@#$%).
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới</label>
            <i class="text-danger">(*)</i>
            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu mới"
                required />
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
            <i class="text-danger">(*)</i>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                placeholder="Xác nhận mật khẩu mới" required />
        </div>
        <div class="group_btn d-flex justify-content-center mt-4 p-2">
            <button type="submit" class="btn btn_save" id="btnSave" data-bs-toggle="modal"
                data-bs-target="#modal_ResetPassWord">
                Đặt lại mật khẩu
            </button>
        </div>
    </form>
</div>
</div>

@endsection

@push('styles')
<link href="{{ asset('assets/css/account/resetpassword.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/account/resetpassword.js') }}"></script>
@endpush