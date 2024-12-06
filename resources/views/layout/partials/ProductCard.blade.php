@extends('master.main')

@section('title', 'Product Card')

@section('content')
<div class="col">
    <div class="card custom-card">
        <img src="{{ $product['image'] }}" class="card-img-top" alt="ảnh sản phẩm">
        <div class="card-body">
            <h5 class="card-title">{{ $product['price'] }}</h5>
            <p class="card-text">{{ $product['name'] }}</p>
            <div class="d-flex">
                <p class="card-text sold">Đã bán {{ $product['sold'] }}</p>
                <a href="GioHang.php" class="btn btn-addcart" onclick="addToCart(event, @json($product))">
                    <i class="bi bi-cart-plus"></i>
                </a>
                <a href="GioHang.php" class="btn btn-buynow">
                    Mua ngay
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/layout/partials/ProductCard.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/layout/partials/ProductCard.js') }}"></script>
@endpush
