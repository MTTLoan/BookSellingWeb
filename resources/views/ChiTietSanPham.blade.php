@extends('master.main')

@section('title', 'Chi tiết sản phẩm')

@section('content')



<div class="container_DetailsProduct container-fluid-sm">
    <!-- Frame Sản phẩm chính-->
    <div class="row container_product m-0 g-4 bg-white">
        <div class="col-md-5 bg-white px-md-5 m-0 p-0">
            <div class="main-image text-center mb-4">
                <img id="mainImage" src="{{ asset( $images[0]->image_url ) }}" alt="Main Image" class="img-fluid" />
            </div>
            <div class="thumbnail-container d-flex justify-content-center gap-2 py-2">
                @foreach ($images as $image)
                @if (!$loop->first)
                <div class="thumbnail">
                    <img src="{{ asset($image->image_url) }}" alt="Thumbnail 4" onclick="updateMainImage(this)"
                        class="img-fluid" />
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <!-- Thông tin sản phẩm -->

        <div class="col-md-7 info_product px-md-2 px-4 pb-4">

            <h2 class="fw-bold fs-2 mb-4" id="title">
                {{ $book->book_name }}
            </h2>
            <div class="description_main_product p-0">
                <div class="d-flex gap-5">
                    <div class="">
                        <p>Năm xuất bản: {{$book->publishing_year}}</p>
                        <p>Nhà xuất bản: {{$book->supplier_name}}</p>
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
                            <span>({{ $review_total }} đánh giá)</span>
                        </div>
                    </div>
                    <div class="">
                        <p>&nbsp;</p>
                        <p>Tác giả: {{ $book->author }}</p>
                        <p>Đã bán {{ $book->order_quantity }}</p>
                    </div>
                </div>
                <hr />
                <h1 class="fw-bold text-danger" id="Price">{{ number_format($book->unit_price, 0, '', '.') }} đ</h1>
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
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 1) }}" min="1"
                        max="100" readonly>
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
                    <!-- Sản phẩm -->
                    @foreach ($book_same_category as $index => $item )

                    <div class="product p-20 mb-20 me-2 rounded w-auto">
                        <div class="image_container d-flex align-items-center justify-content-center">
                            <img src="{{ asset($book_same_category_image[$index]) }}" alt="product" class="img-fluid" />
                        </div>
                        <h5 class="fw-bold my-2" id="price">{{ number_format($item->unit_price, 0, '', '.') }} đ</h5>
                        <p class="mb-2" id="title_other_book">
                            {{ $item->book_name }}
                        </p>
                        <div class="d-flex flex-column flex-lg-row p-0 justify-content-between align-content-center">
                            <span id="sales">Đã bán {{ $item->order_quantity }}</span>
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
                    @endforeach
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
                            Số trang: {{ $book->page_number}} <br /><br />
                            {{ $book->book_description }}
                        </p>
                        <p class="fs-5 fw-bold my-4">Hình ảnh sản phẩm</p>

                        <div class="img_preview_container d-lg-flex flex-lg-wrap align-content-start">
                            @foreach ($images as $image)
                            <img src="{{ asset($image->image_url ) }}" alt="product"
                                class="img_preview img-fluid px-md-5" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Frame Đánh giá sản phẩm-->
    </div>
</div>
<script>
    const feedbackHTML = `
    <style>
        .kid_star {
        color: #F6A500;
        }
    </style>
        <div class="d-flex flex-column gap-35">
            <p class="fs-5 fw-bold my-4">Đánh giá sản phẩm</p>
            <div class="row general flex-column flex-sm-row mb-4">
                <div class="col-3 gap-1">
                    @php
                        // Gán giá trị cho reviewCount và reviewScore nếu review_score tồn tại
                        $reviewCount = isset($review_score->review_count) ? $review_score->review_count : 0;
                        $reviewScore = isset($review_score->review_score) ? $review_score->review_score : 0;
                    @endphp
                    <div>
                        <span class="fs-1 fw-bold" id="math_start">{{ $reviewScore }}</span>
                        <span class="fs-4">/5</span>
                    </div>
                    <div>
                        @for ($i = 0; $i < $reviewScore; $i++)
                            <span class="material-symbols-outlined kid_star">
                                kid_star 
                            </span>
                        @endfor
                    </div>
                    <span>({{ $reviewCount }} đánh giá)</span>
                </div>
                <form class="math_range d-flex flex-column col-lg-5 gap-1">
                    <label>5 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="70"
                        disabled
                    />
                    <label>4 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="70"
                        disabled
                    />
                    <label>3 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="70"
                        disabled
                    />
                    <label>2 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="70"
                        disabled
                    />
                    <label>1 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="10"
                        disabled
                    />
                </form>
                <div class="col-4">
                    <p class="fs-12">
                        Chỉ có thành viên mới có thể viết nhận xét. Vui lòng
                        đăng nhập hoặc đăng ký.
                    </p>
                </div>
            </div>
            
            @foreach ($customer_reviews as $customer_review)
                <hr />
                <div class="row comment my-4">
                    <div class="col-2">
                    @php
                        // Gán giá trị cho reviewCount và reviewScore nếu review_score tồn tại
                        $reviewDate = isset($customer_review->created_at) ? $customer_review->created_at : '2020-01-01';
                        $customerReviewScore = isset($customer_review->review_score) ? $customer_review->review_score : 0; 
                        $customer_review->customer_name = isset($customer_review->customer_name) ? $customer_review->customer_name : 'Khách hàng ẩn danh';
                    @endphp
                        <p id="name">{{ $customer_review->customer_name }}</p>
                        <p id="date">{{ $reviewDate }}</p>
                    </div>
                    <div class="col-10 d-flex flex-column gap-2">
                        <div>
                            @for ($i = 0; $i < $customerReviewScore; $i++)
                                <span class="material-symbols-outlined kid_star">
                                    kid_star
                                </span>                           
                            @endfor
                        </div>
                        <p id="comment">
                            {{ $customer_review->description }} 
                        </p>
                    </div>
                </div>
            @endforeach
    `;
</script>
@endsection

@push('styles')
<link href="{{ asset('assets/css/ChiTietSP.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/ChiTietSP.js') }}"></script>
@endpush