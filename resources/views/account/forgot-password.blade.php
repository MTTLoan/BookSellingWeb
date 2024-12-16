@extends('master.main')

@section('title', 'Quên Mật Khẩu')

@section('content')
<div class="form-container">
    <form action="{{route('account.forgot-password')}}" method="POST">
        @csrf
        <h2 class="title fw-bold text-center mb-4">QUÊN MẬT KHẨU</h2>
        @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
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
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <i class="text-danger">(*)</i>
            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập vào email đã đăng ký..."
                required />
        </div>
        <div class="group_btn d-flex justify-content-center mt-4 p-2">
            <button class="btn btn_cancel me-3" id="btnCancel" type="button">
                Hủy
            </button>
            <button type="submit" class="btn btn_save" id="btnSave" data-bs-toggle="modal"
                data-bs-target="#modal_ResetPassWord">
                Gửi email
            </button>
        </div>
    </form>
</div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/account/forgotpassword.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/account/forgotpassword.js') }}"></script>
@endpush