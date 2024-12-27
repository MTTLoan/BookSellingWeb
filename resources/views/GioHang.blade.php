@extends('master.main')

@section('title', 'Giỏ hàng')

@section('content')

<div class="form-container container-sm p-4 mt-4 mb-4">
    <div class="row">
        <!-- Phần cart items bên trái -->
        <div class="cart-items-container col-md-9 pe-md-4">
            <div class="form-header">
                <span class="form-title fs-4 fs-md-2 fw-bold">Giỏ hàng</span>
            </div>

            @foreach ($cartItems as $cartItem)
            <div class="cart-item d-flex mt-3 align-items-center" id="item{{ $cartItem->id }}">
                <input type="checkbox" class="cart-item-checkbox mx-md-3 mx-2">

                <!-- Kiểm tra xem có ảnh không và hiển thị ảnh đầu tiên -->
                @if($cartItem->book->images->isNotEmpty())
                <img src="{{ asset('uploads/products/' . $cartItem->book->images->first()->url) }}"
                    alt="{{ $cartItem->book->bookTitle->name }}" class="cart-item-image">
                @else
                <img src="{{ asset('path/to/default-image.jpg') }}" alt="Default Image" class="cart-item-image">
                @endif

                <div class="cart-item-name">{{ $cartItem->book->bookTitle->name }}</div>
                <div class="cart-item-quantity d-flex mx-md-3 mx-2">
                    <button onclick="changeQuantity('decrease', {{ $cartItem->id }})">-</button>
                    <input type="text" value="{{ $cartItem->quantity }}" id="quantity{{ $cartItem->id }}"
                        onchange="updateItemTotal({{ $cartItem->id }})">
                    <button onclick="changeQuantity('increase', {{ $cartItem->id }})">+</button>
                </div>
                <div class="cart-item-price d-flex flex-md-row flex-column">
                    <span>{{ number_format($cartItem->book->unit_price, 0, ',', '.') }} đ</span>
                    <span class="cart-item-total-price ms-md-3" id="total-price{{ $cartItem->id }}">
                        {{ number_format($cartItem->quantity * $cartItem->book->unit_price, 0, ',', '.') }} đ
                    </span>
                </div>
                <span class="remove-item mx-md-3 mx-2" onclick="removeItem('{{ $cartItem->id }}')">Xóa</span>
            </div>
            @endforeach

        </div>


        <!-- Phần thông tin đơn hàng bên phải -->
        <div class="cart-summary bg-white col-md-3 mt-4 mt-md-0">
            <div class="fs-5 fw-bold text-center pb-2 border-bottom">Thông tin đơn hàng</div>
            <div class="">
                <div class="d-flex justify-content-between mt-3">
                    <strong>Số lượng:</strong>
                    <span id="total-quantity">{{ $totalQuantity }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Tổng:</strong>
                    <span id="total-price">{{ number_format($totalPrice, 0, ',', '.') }} đ</span>
                </div>
            </div>
            <button class="btn-checkout mt-3 w-100" onclick="checkout()">Thanh toán</button>
        </div>

    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/GioHang.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/GioHang.js') }}"></script>
@endpush