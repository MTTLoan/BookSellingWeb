@extends('master.main')

@section('title', 'Thể loại '.$booktypeName)

@section('content')
<div class="container-sm container_product mb-4 mt-4">
    <div
        class="header-container d-flex flex-md-row flex-column justify-content-between align-items-md-end align-items-start mb-3">
        <h1 class="card-group-title-main fw-bold text-nowrap me-4" data-category="VanHoc">{{ $booktypeName }}</h1>
    </div>


    <!-- Product Cards -->
    <div class="card_group row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
        @foreach ($books as $book)
        <div class="col">
            <div class="product p-20 mb-20 rounded w-auto bg-white">
                <div class="image_container d-flex align-items-center justify-content-center">
                    <img src="{{ asset($images[$book->book_id]) }}" alt="product" class="img-fluid" />
                </div>
                <h5 class="fw-bold my-2" id="price">{{ number_format($book->price, 0, ',', '.') }} đ</h5>
                <p class="mb-2" id="title">{{ $book->book_name }}</p>
                <div class="d-flex  p-0 justify-content-between align-content-center">
                    <span id="sales">Đã bán {{ $book->quantity }}</span>
                    <div class="d-flex gap-md-1 mt-2 mt-md-0">
                        <button class="btn d-flex p-0 bg-white" id="btnCart">
                            <span class="material-symbols-outlined cart_icon">add_shopping_cart</span>
                        </button>
                        <button class="btn btn_buy d-flex align-content-center justify-content-center p-0 w-0"
                            id="btnBuy">
                            Mua ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/VanHoc_DanhMuc.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/VanHoc_DanhMuc.js') }}"></script>
@endpush