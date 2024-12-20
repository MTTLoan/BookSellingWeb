@extends('master.admin')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="container-show container-sm p-0">
    <div class="content p-4 bg-white">
        <div class="title fs-1 fw-bold">
            <h2>Xem thông tin Sản phẩm</h2>
            <hr />
        </div>
        <div class="form_xemsanpham border p-4 rounded">
            <div class="row g-3">
                <div class="col-md-12 p-2">Mã sách: {{ $book->id }} </div>
                <div class="col-md-6 p-2">Loại sách: {{ $book->bookTitle->bookType->name }} </div>
                <div class="col-md-6 p-2">Số trang: {{ $book->page_number }} </div>
                <div class="col-md-6 p-2">Tên sách: {{ $book->bookTitle->name }} </div>
                <div class="col-md-6 p-2">Tên tác giả: {{ $book->bookTitle->author }} </div>
                <div class="col-md-6 p-2">Nhà xuất bản: {{ $book->bookTitle->suppliers->name }} </div>
                <div class="col-md-6 p-2">Năm xuất bản: {{ $book->publishing_year }} </div>
                <div class="col-md-6 p-2">Loại bìa: {{ $book->cover }} </div>
                <div class="col-md-6 p-2">Chi phí: {{ $book->cost }} </div>
                <div class="col-md-6 p-2">Đơn giá: {{ $book->unit_price }} </div>
                <div class="col-md-6 p-2">Số lượng: {{ $book->quantity }} </div>
                <div class="col-12 p-2">
                    Mô tả: {{ $book->bookTitle->description }}
                </div>
                <div class="col-md-12 p-2">Hình ảnh:
                    @foreach($book->images as $image)
                    <img src="{{ asset(uploads/products/$image->url) }}" alt="Hình ảnh" class="img-fixed-size" />
                    @endforeach
                </div>
                <div class="group_btn d-flex justify-content-end p-2">
                    <button type="button" class="btn btn_exit" id="btnExit">
                        Thoát
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/admin/book/show.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/admin/book/show.js') }}"></script>
@endpush