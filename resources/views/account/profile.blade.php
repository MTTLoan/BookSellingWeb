@extends('master.main')

@section('title', 'Thông tin tài khoản')

@section('content')
<div class="form-container">
    <div class="form-header">
        <div class="form-title">THÔNG TIN CÁ NHÂN</div>
        <p class="form-subtitle">Cập nhật thông tin của bạn</p>
    </div>

    <form id="profileForm" method="POST" action="{{ route('account.profile') }}">
        @csrf
        <div class="form-group mb-3 row">
            <label for="name" class="col-sm-3 col-form-label">Tên tài khoản<i class="text-danger">(*)</i>
            </label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ $user->name }}">
            </div>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3 row">
            <label for="fullname" class="col-sm-3 col-form-label">Họ và tên <i class="text-danger">(*)</i></label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                    name="fullname" value="{{ $user->fullname }}">
            </div>
            @error('fullname')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3 row">
            <label for="dob" class="col-sm-3 col-form-label">Ngày sinh <i class="text-danger">(*)</i></label>
            <div class="col-sm-9">
                <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                    name="birthday" value="{{ $user->birthday }}">
            </div>
            @error('birthday')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" form-group mb-3 row">
            <label for="sex" class="col-sm-3 col-form-label">Giới tính</label>
            <div class="col-sm-9">
                <select class="form-select @error('sex') is-invalid @enderror" id="sex" name="sex" required>
                    <option value="">Chọn giới tính</option>
                    <option value="Nam" {{ $user->sex == 'Nam' ? 'selected' : '' }}>Nam</option>
                    <option value="Nữ" {{ $user->sex == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                </select>
            </div>
            @error('sex')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3 row">
            <label for="email" class="col-sm-3 col-form-label">Email <i class="text-danger">(*)</i></label>
            <div class="col-sm-9">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ $user->email }}">
            </div>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3 row">
            <label for="phone_number" class="col-sm-3 col-form-label">Số điện thoại <i
                    class="text-danger">(*)</i></label>
            <div class="col-sm-9">
                <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                    name="phone_number" value="{{ $user->phone_number }}">
            </div>
            @error('phone_number')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3 row">
            <label for="province" class="col-sm-3 col-form-label">Tỉnh, thành</label>
            <div class="col-sm-9">
                <select class="form-select @error('province') is-invalid @enderror" id="province" name="province"
                    required>
                    <option value="">Chọn tỉnh, thành phố</option>
                    <!-- Các option tỉnh/thành phố -->
                </select>
            </div>
            @error('province')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3 row">
            <label for="district" class="col-sm-3 col-form-label">Quận, huyện</label>
            <div class="col-sm-9">
                <select class="form-select @error('district') is-invalid @enderror" id="district" name="district"
                    required>
                    <option value="">Chọn quận, huyện</option>
                    <!-- Các option quận/huyện -->
                </select>
            </div>
            @error('district')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3 row">
            <label for="ward" class="col-sm-3 col-form-label">Phường, xã</label>
            <div class="col-sm-9">
                <select class="form-select @error('ward') is-invalid @enderror" id="ward" name="ward" required>
                    <option value="">Chọn phường, xã</option>
                    <!-- Các option phường/xã -->
                </select>
            </div>
            @error('ward')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3 row">
            <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address" value="{{ $user->address }}">
            </div>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nút hành động -->
        <div class="btn-container">
            <button type="reset" class="btn btn-cancel" id="btnCancel">Hủy</button>
            <button type="submit" class="btn btn-save">Lưu</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/account/profile.css') }}">
@endpush
@push('scripts')
<script>
const customerProvince = "{{ $user->province }}";
const customerDistrict = "{{ $user->district }}";
const customerWard = "{{ $user->ward }}";
</script>
<script src="{{ asset('assets/js/account/profile.js') }}"></script>
@endpush