@extends('master.admin')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="container-show container-sm p-0">
    <div class="content p-4 bg-white">
        <div class="title fs-1 fw-bold">
            <h2>Xem thông tin Sản phẩm</h2>
            <hr />
        </div>
        <form id="productForm">
            <div class="form_xemsanpham border p-4 rounded">
                <div class="row g-3">
                    <div class="col-md-12 p-2">
                        <label for="book_id" class="form-label">Mã sách (*)</label>
                        <input type="text" class="form-control" name="book_id" id="book_id" value="001" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="book_type" class="form-label">Loại sách (*)</label>
                        <select name="book_type" id="book_type" class="form-select" required disabled>
                            <option selected>[002] Sách tham khảo</option>
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="page_number" class="form-label">Số trang (*)</label>
                        <input type="number" class="form-control" name="page_number" id="page_number"
                            placeholder="Nhập vào số trang" required value="200" readonly />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="book_name" class="form-label">Tên sách (*)</label>
                        <input type="text" class="form-control" name="book_name" id="book_name"
                            placeholder="Nhập vào tên sách" required value="Trốn lên mái nhà để khóc" readonly />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="author_name" class="form-label">Tên tác giả (*)</label>
                        <input type="text" class="form-control" name="author_name" id="author_name"
                            placeholder="Nhập vào tên tác giả" required value="Lam" readonly />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="publisher" class="form-label">Nhà xuất bản (*)</label>
                        <select name="publisher" id="publisher" class="form-select" required disabled>
                            <option selected>[001] NXB Dân trí</option>
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="year_publication" class="form-label">Năm xuất bản (*)</label>
                        <select name="year_publication" id="year_publication" class="form-select" required disabled>
                            <option selected>2013</option>
                        </select>
                    </div>
                    <div class="col-12 p-2">
                        <label for="description" class="form-label">Mô tả</label>
                        <input type="text" class="form-control" name="description" id="description"
                            placeholder="Mô tả cụ thể tại đây" required
                            value="Truyện kể về một cô gái trốn lên mái nhà để khóc" readonly />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="cost" class="form-label">Chi phí (*)</label>
                        <input type="number" class="form-control" name="cost" id="cost" placeholder="Nhập vào chi phí"
                            required value="80000" readonly />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="price" class="form-label">Đơn giá (*)</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Nhập vào đơn giá"
                            required value="100000" readonly />
                    </div>
                    <div class="group_btn d-flex justify-content-end p-2">
                        <button type="button" class="btn btn_exit" id="btnExit">
                            Thoát
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/admin/book/show.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/admin/book/show.js') }}"></script>
@endpush