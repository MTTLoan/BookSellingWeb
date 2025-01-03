@extends('master.admin')

@section('title', 'Sửa khuyến mãi')

@section('content')
<div class="container-create container-sm p-0">
    <div class="content p-4 bg-white">
        <div class="title fs-1 fw-bold">
            <h2>Sửa Khuyến mãi</h2>
            <hr />
        </div>
        <form id="productForm" method="POST" enctype="multipart/form-data" action="{{ route('discount.update', $discount->id) }}">
            @csrf
            @method('PUT')
            <div class="form_suakhuyenmai border p-4 rounded">
                <div class="row g-3">
                    <div class="col-md-12 p-2">
                        <label for="promotion_name" class="form-label">Tên khuyến mãi (*)</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Nhập vào tên khuyến mãi" value="{{ old('name', $discount->name) }}" required />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 p-2">
                        <label for="chanel_type" class="form-label">Loại kênh bán (*)</label>
                        <p class="sub fst-italic text-secondary p-0">
                            (giữ phím ctrl hoặc shift (hoặc kéo bằng chuột) để chọn nhiều mục)
                        </p>
                        <select multiple name="type[]" id="type" class="form-select" required>
                            <option value="Cửa hàng" {{ old('type') && in_array('Cửa hàng', old('type')) ? 'selected' : ($discount->type == 'Cửa hàng' ? 'selected' : '') }}>Cửa hàng</option>
                            <option value="Website" {{ old('type') && in_array('Website', old('type')) ? 'selected' : ($discount->type == 'Website' ? 'selected' : '') }}>Website</option>
                        </select>
                    </div>

                    <div class="col-md-6 p-2">
                        <label for="branch_name" class="form-label">Chi nhánh (*)</label>
                        <p class="sub fst-italic text-secondary p-0">
                            (giữ phím ctrl hoặc shift (hoặc kéo bằng chuột) để chọn nhiều mục)
                        </p>
                        <select multiple name="branch_id[]" id="branch_id" class="form-select" required>
                            <option value="" selected>Chọn chi nhánh...</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" 
                                    {{ in_array($branch->id, old('branch_id', $discount->branches->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $branch->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('branch_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="col-md-4 p-2">
                        <label for="code" class="form-label">Mã code (*)</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                            id="code" placeholder="Nhập vào mã code" value="{{ old('code', $discount->code) }}" required />
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 p-2">
                        <label for="start_date" class="form-label">Ngày bắt đầu (*)</label>
                        <input type="date" class="form-control" name="start_date" id="start_date"
                            placeholder="Chọn ngày bắt đầu..." value="{{ old('start_date', $discount->start_date) }}" required />
                    </div>

                    <div class="col-md-4 p-2">
                        <label for="end_date" class="form-label">Ngày kết thúc (*)</label>
                        <input type="date" class="form-control" name="end_date" id="end_date"
                            placeholder="Chọn ngày kết thúc ..." value="{{ old('end_date', $discount->end_date) }}" required />
                    </div>

                    <div class="col-md-6 p-2">
                        <label for="cost" class="form-label">Giá trị (*)</label>
                        <input type="number" class="form-control @error('value') is-invalid @enderror" name="value"
                            id="value" placeholder="Nhập vào giá trị" value="{{ old('value', $discount->value) }}" required />
                        @error('value')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 p-2">
                        <label for="price" class="form-label">Đơn từ (*)</label>
                        <input type="number" class="form-control @error('starting_price') is-invalid @enderror"
                            name="starting_price" id="starting_price" placeholder="Nhập vào..."
                            value="{{ old('starting_price', $discount->starting_price) }}" required />
                        @error('starting_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="group_btn d-flex justify-content-end p-2">
                        <button class="btn btn_cancel me-3" id="btnCancel" type="button">
                            Hủy
                        </button>
                        <button type="submit" class="btn btn_save" id="btnSave">
                            Lưu
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/admin/discount/create.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/admin/discount/create.js') }}"></script>
@endpush

@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Cập nhật thất bại',
        html: `
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `,
    });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sửa thành công',
        text: "{{ session('success') }}",
    }).then(function() {
        window.location.href = "{{ route('discount.index') }}";
    });
</script>
@endif
