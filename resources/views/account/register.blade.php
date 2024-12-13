@extends('master.main')

@section('title', 'Đăng Ký')

@section('content')
<div class="form-container">
    <div class="form-title">ĐĂNG KÝ</div>
    <form id="registrationForm" method="POST" action="{{ route('account.register') }}">
        @csrf
        <!-- Tên tài khoản -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên tài khoản <i class="text-danger">(*)</i></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" placeholder="Nhập tên tài khoản" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Họ và tên -->
        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên <i class="text-danger">(*)</i></label>
            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                name="fullname" value="{{ old('fullname') }}" placeholder="Nhập họ và tên" required>
            @error('fullname')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email <i class="text-danger">(*)</i></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" placeholder="Nhập email" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Số điện thoại -->
        <div class="mb-3">
            <label for="phone_number" class="form-label">Số điện thoại <i class="text-danger">(*)</i></label>
            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                name="phone_number" value="{{ old('phone_number') }}" placeholder="Nhập số điện thoại" required>
            @error('phone_number')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Giới tính -->
        <div class="mb-3">
            <label for="sex" class="form-label">Giới tính <i class="text-danger">(*)</i></label>
            <select class="form-select @error('sex') is-invalid @enderror" id="sex" name="sex" required>
                <option value="">Chọn giới tính</option>
                <option value="Nam" {{ old('sex') == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ old('sex') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>
            @error('sex')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ngày sinh -->
        <div class="mb-3">
            <label for="birthday" class="form-label">Ngày sinh <i class="text-danger">(*)</i></label>
            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                name="birthday" value="{{ old('birthday') }}" required>
            @error('birthday')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tỉnh, thành phố -->
        <div class="mb-3">
            <label for="province" class="form-label">Tỉnh, thành phố <i class="text-danger">(*)</i></label>
            <select class="form-select @error('province') is-invalid @enderror" id="province" name="province" required>
                <option value="">Chọn tỉnh, thành phố</option>
                <!-- Các option tỉnh/thành phố -->
            </select>
            @error('province')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Quận, huyện -->
        <div class="mb-3">
            <label for="district" class="form-label">Quận, huyện <i class="text-danger">(*)</i></label>
            <select class="form-select @error('district') is-invalid @enderror" id="district" name="district" required>
                <option value="">Chọn quận, huyện</option>
                <!-- Các option quận/huyện -->
            </select>
            @error('district')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Phường, xã -->
        <div class="mb-3">
            <label for="ward" class="form-label">Phường, xã <i class="text-danger">(*)</i></label>
            <select class="form-select @error('ward') is-invalid @enderror" id="ward" name="ward" required>
                <option value="">Chọn phường, xã</option>
                <!-- Các option phường/xã -->
            </select>
            @error('ward')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Địa chỉ -->
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ <i class="text-danger">(*)</i></label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                value="{{ old('address') }}" placeholder="Nhập địa chỉ" required>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Mật khẩu -->
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu <i class="text-danger">(*)</i></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" placeholder="Nhập mật khẩu" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nhập lại mật khẩu -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu <i
                    class="text-danger">(*)</i></label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Xác nhận mật khẩu" required>
        </div>

        <!-- Nút hành động -->
        <div class="btn-container">
            <button type="reset" class="btn btn-cancel">Hủy</button>
            <button type="submit" class="btn btn-register">Đăng ký</button>
        </div>
    </form>
</div>
@endsection


@push('styles')
<link href="{{ asset('assets/css/account/register.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/account/register.js') }}"></script>
@endpush