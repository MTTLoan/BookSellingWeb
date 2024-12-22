@extends('master.main')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="container_DetailsProduct container-fluid-sm">
    <!-- Frame Sản phẩm chính-->
    <div class="row container_product m-0 g-4 bg-white">
        <div class="col-md-5 bg-white px-md-5 m-0 p-0">
            <div class="main-image text-center mb-4">
                <img id="mainImage" src="{{ asset('uploads/products/13_3 1.png') }}" alt="Main Image"
                    class="img-fluid" />
            </div>
            <div class="thumbnail-container d-flex justify-content-center gap-2 py-2">
                <div class="thumbnail">
                    <img src="{{ asset('uploads/products/13_1 1.png') }}" alt="Thumbnail 1"
                        onclick="updateMainImage(this)" class="img-fluid" />
                </div>
                <div class="thumbnail">
                    <img src="{{ asset('uploads/products/13_3 1.png') }}" alt="Thumbnail 2"
                        onclick="updateMainImage(this)" class="img-fluid" />
                </div>
                <div class="thumbnail">
                    <img src="{{ asset('uploads/products/13_1 1.png') }}" alt="Thumbnail 3"
                        onclick="updateMainImage(this)" class="img-fluid" />
                </div>
                <div class="thumbnail">
                    <img src="{{ asset('uploads/products/13_3 1.png') }}" alt="Thumbnail 4"
                        onclick="updateMainImage(this)" class="img-fluid" />
                </div>
            </div>
        </div>

        <div class="col-md-7 info_product px-md-2 px-4 pb-4">
            <h2 class="fw-bold fs-2 mb-4" id="title">
                Trốn Lên Mái Nhà Để Khóc
            </h2>
            <div class="description_main_product p-0">
                <div class="d-flex gap-5">
                    <div class="">
                        <p>Năm xuất bản: 2023</p>
                        <p>Nhà xuất bản: Dân trí</p>
                        <div class="d-flex align-content-center">
                            <span class="material-symbols-outlined kid_star">
                                kid_star
                            </span>
                            <span class="material-symbols-outlined kid_star">
                                kid_star
                            </span>
                            <span class="material-symbols-outlined kid_star">
                                kid_star
                            </span>
                            <span class="material-symbols-outlined kid_star">
                                kid_star
                            </span>
                            <span class="material-symbols-outlined kid_star me-2">
                                kid_star
                            </span>
                            <span>(10 đánh giá)</span>
                        </div>
                    </div>
                    <div class="">
                        <p>&nbsp;</p>
                        <p>Tác giả: Lam</p>
                        <p>Đã bán 2</p>
                    </div>
                </div>
                <hr />
                <h1 class="fw-bold text-danger" id="Price">84.240 đ</h1>
                <hr />
                <div class="d-flex gap-4 mb-4">
                    <span class="label_edition text-secondary" value="Năm 2012">Năm 2012</span>
                    <span class="label_edition text-secondary" value="Năm 2020">Năm 2020</span>
                </div>
            </div>
            <div class="d-flex gap-3 mb-4">
                <label for="quantity" class="form-label">Số lượng:</label>
                <div class="quantity-control">
                    <button type="button" class="btn-decrease" onclick="decreaseQuantity()">-</button>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 1) }}" min="1" max="100" readonly>
                    <button type="button" class="btn-increase" onclick="increaseQuantity()">+</button>
                </div>        
            </div>
            <div class="d-flex gap-3 mb-4">
                <button class="btn btn_AddCart" id="btnAddCart">
                    Thêm vào giỏ hàng
                </button>
                <button class="btn btn_buyNow" id="btnBuyNow">
                    Mua ngay
                </button>
            </div>
        </div>
    </div>

    <!-- Frame 2 -->
    <div class="container_description container-sm p-0" id="content_description">
        <!-- Frame Sản phẩm khác-->
        <div class="row container_product m-0 g-4">
            <div class="col-md-3 other_product d-flex flex-column rounded bg-white p-20 mb-20">
                <h6 class="p-2">SẢN PHẨM CÙNG DANH MỤC</h6>
                <div class="d-flex flex-row flex-md-column overflow-x-auto">
                    <!-- Sản phẩm 1-->
                    <div class="product p-20 mb-20 me-2 rounded w-auto">
                        <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                            class="img-fluid" />
                        <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                        <p class="mb-2" id="title">
                            Trốn Lên Mái Nhà Để Khóc
                        </p>
                        <div class="d-flex flex-column flex-lg-row p-0 justify-content-between align-content-center">
                            <span id="sales">Đã bán 2</span>
                            <div class="d-flex gap-md-1">
                                <button class="btn d-flex p-0 bg-white" id="btnCart">
                                    <span class="material-symbols-outlined cart_icon">
                                        add_shopping_cart
                                    </span>
                                </button>
                                <button class="btn btn_buy d-flex align-content-center justify-content-center p-0"
                                    id="btnBuy">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Sản phẩm 2-->
                    <div class="product p-20 mb-20 me-2 rounded w-auto">
                        <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                            class="img-fluid" />
                        <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                        <p class="mb-2" id="title">
                            Trốn Lên Mái Nhà Để Khóc
                        </p>
                        <div class="d-flex flex-column flex-lg-row p-0 justify-content-between align-content-center">
                            <span id="sales">Đã bán 2</span>
                            <div class="d-flex gap-md-1">
                                <button class="btn d-flex p-0 bg-white" id="btnCart">
                                    <span class="material-symbols-outlined cart_icon">
                                        add_shopping_cart
                                    </span>
                                </button>
                                <button class="btn btn_buy d-flex align-content-center justify-content-center p-0"
                                    id="btnBuy">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Sản phẩm 3-->
                    <div class="product p-20 mb-20 me-2 rounded w-auto">
                        <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                            class="img-fluid" />
                        <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                        <p class="mb-2" id="title">
                            Trốn Lên Mái Nhà Để Khóc
                        </p>
                        <div class="d-flex flex-column flex-lg-row p-0 justify-content-between align-content-center">
                            <span id="sales">Đã bán 2</span>
                            <div class="d-flex gap-md-1">
                                <button class="btn d-flex p-0 bg-white" id="btnCart">
                                    <span class="material-symbols-outlined cart_icon">
                                        add_shopping_cart
                                    </span>
                                </button>
                                <button class="btn btn_buy d-flex align-content-center justify-content-center p-0"
                                    id="btnBuy">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Sản phẩm 4-->
                    <div class="product p-20 mb-20 me-2 rounded w-auto">
                        <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                            class="img-fluid" />
                        <h5 class="fw-bold my-2" id="price">84.240 đ</h5>
                        <p class="mb-2" id="title">
                            Trốn Lên Mái Nhà Để Khóc
                        </p>
                        <div class="d-flex flex-column flex-lg-row p-0 justify-content-between align-content-center">
                            <span id="sales">Đã bán 2</span>
                            <div class="d-flex gap-md-1">
                                <button class="btn d-flex p-0 bg-white" id="btnCart">
                                    <span class="material-symbols-outlined cart_icon">
                                        add_shopping_cart
                                    </span>
                                </button>
                                <button class="btn btn_buy d-flex align-content-center justify-content-center p-0"
                                    id="btnBuy">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Frame Mô tả sản phẩm -->
            <div class="col-md-9 description bg-white mb-20" id="description">
                <div class="buttons d-flex g-0">
                    <button class="btn bg-white px-3" id="btnDescription">
                        MÔ TẢ SẢN PHẨM
                    </button>
                    <button class="btn bg-white p-0" id="btnFeedback">
                        ĐÁNH GIÁ
                    </button>
                </div>
                <div id="content">
                    <!-- Nội dung mặc định -->
                    <div class="d-flex flex-column gap-35">
                        <p class="fs-5 fw-bold my-4">Thông tin sản phẩm</p>
                        <p>
                            Số trang: 208 <br /><br />
                            “Vị chua chát của cái nghèo hòa trộn với vị ngọt
                            ngào khi khám phá ra những điều khiến cuộc đời
                            này đáng sống... một tác phẩm kinh điển của
                            Brazil.” - Booklist <br /><br />
                            “Một cách nhìn cuộc sống gần như hoàn chỉnh từ
                            con mắt trẻ thơ… có sức mạnh sưởi ấm và làm tan
                            nát cõi lòng, dù người đọc ở lứa tuổi nào.” -
                            The National
                        </p>
                        <p class="fs-5 fw-bold my-4">Hình ảnh sản phẩm</p>
                        <img src="{{ asset('uploads/products/13_1 1.png') }}" alt="product" class="img-fluid px-md-5" />
                        <img src="{{ asset('uploads/products/13_3 1.png') }}" alt="product" class="img-fluid px-md-5" />
                    </div>
                </div>
            </div>
        </div>
        <!-- Frame Đánh giá sản phẩm-->
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/ChiTietSP.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/ChiTietSP.js') }}"></script>
@endpush