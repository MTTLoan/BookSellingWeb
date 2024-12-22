@extends('master.admin')

@section('title', 'Tạo sản phẩm')

@section('content')
<div class="container-create container-sm p-0">
    <div class="content p-4 bg-white">
        <div class="title fs-1 fw-bold">
            <h2>Thêm mới Sản phẩm</h2>
            <hr />
        </div>
        <form id="productForm" method="POST" enctype="multipart/form-data" action="{{ route('book.store') }}">
            @csrf
            <div class="form_themsanpham border p-4 rounded">
                <div class="row g-3">
                    <div class="col-md-6 p-2">
                        <label for="book_type_id" class="form-label">Loại sách <i class="text-danger">(*)</i></label>
                        <select name="book_type_id" id="book_type_id"
                            class="form-select @error('book_type_id') is-invalid @enderror" required>
                            <option value="" selected>Chọn loại sách...</option>
                            @foreach ($bookTypes as $bookType)
                            <option value="{{ $bookType->id }}"
                                {{ old('book_type_id') == $bookType->id ? 'selected' : '' }}>{{ $bookType->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('book_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="page_number" class="form-label">Số trang <i class="text-danger">(*)</i></label>
                        <input type="number" class="form-control @error('page_number') is-invalid @enderror"
                            name="page_number" id="page_number" placeholder="Nhập vào số trang"
                            value="{{ old('page_number') }}" required />
                        @error('page_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="name" class="form-label">Tên sách <i class="text-danger">(*)</i></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Nhập vào tên sách" value="{{ old('name') }}" required />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="author" class="form-label">Tên tác giả <i class="text-danger">(*)</i></label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                            id="author" placeholder="Nhập vào tên tác giả" value="{{ old('author') }}" required />
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="supplier_id" class="form-label">Nhà xuất bản <i class="text-danger">(*)</i></label>
                        <select name="supplier_id" id="supplier_id"
                            class="form-select @error('supplier_id') is-invalid @enderror" required>
                            <option value="" selected>Chọn nhà xuất bản...</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}"
                                {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="publishing_year" class="form-label">Năm xuất bản <i
                                class="text-danger">(*)</i></label>
                        <select name="publishing_year" id="publishing_year"
                            class="form-select @error('publishing_year') is-invalid @enderror" required>
                            <option value="" selected>Chọn năm xuất bản...</option>
                            @for ($year = date('Y'); $year >= 1800; $year--)
                            <option value="{{ $year }}" {{ old('publishing_year') == $year ? 'selected' : '' }}>
                                {{ $year }}</option>
                            @endfor
                        </select>
                        @error('publishing_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="cost" class="form-label">Chi phí <i class="text-danger">(*)</i></label>
                        <input type="number" class="form-control @error('cost') is-invalid @enderror" name="cost"
                            id="cost" placeholder="Nhập vào chi phí" value="{{ old('cost') }}" required />
                        @error('cost')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="unit_price" class="form-label">Đơn giá <i class="text-danger">(*)</i></label>
                        <input type="number" class="form-control @error('unit_price') is-invalid @enderror"
                            name="unit_price" id="unit_price" placeholder="Nhập vào đơn giá"
                            value="{{ old('unit_price') }}" required />
                        @error('unit_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="cover" class="form-label">Loại bìa <i class="text-danger">(*)</i></label>
                        <select name="cover" id="cover" class="form-select @error('cover') is-invalid @enderror"
                            required>
                            <option value="" selected>Chọn loại bìa...</option>
                            <option value="Bìa cứng" {{ old('cover') == 'Bìa cứng' ? 'selected' : '' }}>Bìa cứng
                            </option>
                            <option value="Bìa mềm" {{ old('cover') == 'Bìa mềm' ? 'selected' : '' }}>Bìa mềm</option>
                        </select>
                        @error('cover')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 p-2">
                        <label for="description" class="form-label">Mô tả <i class="text-danger">(*)</i></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            id="description" rows="3"
                            placeholder="Mô tả cụ thể tại đây">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 p-2">
                        <label for="image" class="form-label">Hình ảnh <i class="text-danger">(*)</i></label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="images[]"
                            id="image" multiple required />
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="image-preview" class="mt-2"></div>
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
<link href="{{ asset('assets/css/admin/book/create.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/admin/book/create.js') }}"></script>

@if ($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Thêm thất bại',
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
    title: 'Thêm thành công',
    text: "{{ session('success') }}",
}).then(function() {
    window.location.href = "{{ route('book.index') }}";
});
</script>
@endif
@endpush