@extends('master.admin')

@section('title', 'Quản lý khuyến mãi')

@section('content')
<div class="container-sm container_product mb-4 mt-4">
    <div class="header-container d-flex flex-md-row flex-column justify-content-between align-items-md-end align-items-start mb-3">
        <h1 class="card-group-title-main fw-bold text-nowrap me-4" data-category="VanHoc">Văn học</h1>
        <div class="filter-group d-flex flex-sm-row flex-column align-items-sm-center align-items-start">
            <span class="filter-option"><i class="bi bi-sort-down">Sắp xếp theo:</i></span>
            <select class="filter-dropdown">
                <option value="default" selected disabled>Giá</option>
                <option value="high">Giá cao nhất</option>
                <option value="low">Giá thấp nhất</option>
            </select>
            {{-- <button class="filter-button">Giá<i class="bi bi-chevron-down"></i></button> --}}
            <select class="filter-dropdown">
                <option value="default" selected disabled>Khác</option>
                <option value="top-rated">Được đánh giá hàng đầu</option>
                <option value="most-rated">Được đánh giá nhiều nhất</option>
                <option value="best-deals">Ưu đãi hấp dẫn</option>
            </select>
        </div>
    </div>


    <!-- Product Cards -->
    <div class="card_group row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
        <div class="col">
            <div class="product p-20 mb-20 rounded w-auto bg-white">
                <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                    class="img-fluid" />
                <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                <p class="mb-2" id="title">Trốn Lên Mái Nhà Để Khóc</p>
                <div class="d-flex  p-0 justify-content-between align-content-center">
                    <span id="sales">Đã bán 2</span>
                    <div class="d-flex gap-md-1 mt-2 mt-md-0">
                        <button class="btn d-flex p-0 bg-white" id="btnCart">
                            <span class="material-symbols-outlined cart_icon">add_shopping_cart</span>
                        </button>
                        <button class="btn btn_buy d-flex align-content-center justify-content-center p-0 w-0" id="btnBuy">
                            Mua ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product p-20 mb-20 rounded w-auto bg-white">
                <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                    class="img-fluid" />
                <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                <p class="mb-2" id="title">Trốn Lên Mái Nhà Để Khóc</p>
                <div class="d-flex  p-0 justify-content-between align-content-center">
                    <span id="sales">Đã bán 2</span>
                    <div class="d-flex gap-md-1 mt-2 mt-md-0">
                        <button class="btn d-flex p-0 bg-white" id="btnCart">
                            <span class="material-symbols-outlined cart_icon">add_shopping_cart</span>
                        </button>
                        <button class="btn btn_buy d-flex align-content-center justify-content-center p-0 w-0" id="btnBuy">
                            Mua ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product p-20 mb-20 rounded w-auto bg-white">
                <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                    class="img-fluid" />
                <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                <p class="mb-2" id="title">Trốn Lên Mái Nhà Để Khóc</p>
                <div class="d-flex  p-0 justify-content-between align-content-center">
                    <span id="sales">Đã bán 2</span>
                    <div class="d-flex gap-md-1 mt-2 mt-md-0">
                        <button class="btn d-flex p-0 bg-white" id="btnCart">
                            <span class="material-symbols-outlined cart_icon">add_shopping_cart</span>
                        </button>
                        <button class="btn btn_buy d-flex align-content-center justify-content-center p-0 w-0" id="btnBuy">
                            Mua ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product p-20 mb-20 rounded w-auto bg-white">
                <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                    class="img-fluid" />
                <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                <p class="mb-2" id="title">Trốn Lên Mái Nhà Để Khóc</p>
                <div class="d-flex  p-0 justify-content-between align-content-center">
                    <span id="sales">Đã bán 2</span>
                    <div class="d-flex gap-md-1 mt-2 mt-md-0">
                        <button class="btn d-flex p-0 bg-white" id="btnCart">
                            <span class="material-symbols-outlined cart_icon">add_shopping_cart</span>
                        </button>
                        <button class="btn btn_buy d-flex align-content-center justify-content-center p-0 w-0" id="btnBuy">
                            Mua ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product p-20 mb-20 rounded w-auto bg-white">
                <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                    class="img-fluid" />
                <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                <p class="mb-2" id="title">Trốn Lên Mái Nhà Để Khóc</p>
                <div class="d-flex  p-0 justify-content-between align-content-center">
                    <span id="sales">Đã bán 2</span>
                    <div class="d-flex gap-md-1 mt-2 mt-md-0">
                        <button class="btn d-flex p-0 bg-white" id="btnCart">
                            <span class="material-symbols-outlined cart_icon">add_shopping_cart</span>
                        </button>
                        <button class="btn btn_buy d-flex align-content-center justify-content-center p-0 w-0" id="btnBuy">
                            Mua ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product p-20 mb-20 rounded w-auto bg-white">
                <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                    class="img-fluid" />
                <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                <p class="mb-2" id="title">Trốn Lên Mái Nhà Để Khóc</p>
                <div class="d-flex  p-0 justify-content-between align-content-center">
                    <span id="sales">Đã bán 2</span>
                    <div class="d-flex gap-md-1 mt-2 mt-md-0">
                        <button class="btn d-flex p-0 bg-white" id="btnCart">
                            <span class="material-symbols-outlined cart_icon">add_shopping_cart</span>
                        </button>
                        <button class="btn btn_buy d-flex align-content-center justify-content-center p-0 w-0" id="btnBuy">
                            Mua ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/VanHoc_DanhMuc.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/VanHoc_DanhMuc.js') }}"></script>
@endpush