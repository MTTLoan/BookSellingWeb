@extends('master.admin')

@section('title', 'Tạo sản phẩm')

@section('content')
<div class="container-create container-sm p-0">
    <div class="content p-4 bg-white">
        <div class="title fs-1 fw-bold">
            <h2>Thêm mới Sản phẩm</h2>
            <hr />
        </div>
        <form id="productForm" action="QLSanPham.php?act=ThemSP" method="post">
            <div class="form_themsanpham border p-4 rounded">
                <div class="row g-3">
                    <div class="col-md-6 p-2">
                        <label for="book_type" class="form-label">Loại sách (*)</label>
                        <select name="book_type" id="book_type" class="form-select" required>
                            <option value="" selected>Chọn loại sách...</option>
                            <option selected>[001] Sách giáo khoa</option>
                            <option selected>[002] Sách tiếng anh</option>
                            <option selected>[003] Sách văn học</option>
                            <option selected>[004] Sách kỹ năng sống</option>
                            <option selected>[005] Sách thiếu nhi</option>
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="page_number" class="form-label">Số trang (*)</label>
                        <input type="number" class="form-control" name="page_number" id="page_number"
                            placeholder="Nhập vào số trang" required />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="book_name" class="form-label">Tên sách (*)</label>
                        <input type="text" class="form-control" name="book_name" id="book_name"
                            placeholder="Nhập vào tên sách" required />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="author_name" class="form-label">Tên tác giả (*)</label>
                        <input type="text" class="form-control" name="author_name" id="author_name"
                            placeholder="Nhập vào tên tác giả" required />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="publisher" class="form-label">Nhà xuất bản (*)</label>
                        <select name="publisher" id="publisher" class="form-select" required>
                            <option value="" selected>Chọn loại sách...</option>
                            <option selected>[001] NXB Dân trí</option>
                            <option selected>[002] NXB Văn học</option>
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="year_publication" class="form-label">Năm xuất bản (*)</label>
                        <select name="year_publication" id="year_publication" class="form-select" required>
                            <option value="" selected>Chọn năm xuất bản...</option>
                        </select>
                    </div>
                    <div class="col-12 p-2">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="description" id="description" row="3"
                            placeholder="Mô tả cụ thể tại đây" required></textarea>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="cost" class="form-label">Chi phí (*)</label>
                        <input type="number" class="form-control" name="cost" id="cost" placeholder="Nhập vào chi phí"
                            required />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="price" class="form-label">Đơn giá (*)</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Nhập vào đơn giá"
                            required />
                    </div>
                    <div class="group_btn d-flex justify-content-end p-2">
                        <button class="btn btn_cancel me-3" id="btnCancel" type="button">
                            Hủy
                        </button>
                        <button type="button" class="btn btn_save" id="btnSave">
                            Lưu
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="modal_Complete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm sản phẩm</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">Bạn đã thêm sản phẩm thành công.</div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn_close" id="btnClose">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
<link href="{{ asset('assets/css/admin/book/create.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/admin/book/create.js') }}"></script>
@endpush