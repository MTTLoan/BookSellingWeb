@extends('master.main')

@section('title', 'Giỏ hàng')

@section('content')
<div class="form-container container-sm p-4 mt-4 mb-4">
    <div class="row" style="height: 100vh;">
        <!-- Phần cart items bên trái -->
        <div class="cart-items-container col-md-9 pe-md-4">
            <div class="form-header">
                <span class="form-title fs-4 fs-md-2 fw-bold">Giỏ hàng</span>
            </div>
            @foreach ($cartItems as $item)
            <div class="cart-item d-flex mt-3 align-items-center justify-content-between" id="item{{ $item->id }}">
                <div class="d-flex justify-content-start" style="width: 60%;">
                    <input type="checkbox" class="cart-item-checkbox mx-md-3 mx-2">
                    <img src="{{ asset($item->book->images->first()->url) }}" alt="Product Image"
                        class="cart-item-image">
                    <div>
                        <div class="cart-item-name">{{ $item->book->bookTitle->name }}</div>
                        <!-- Loại bìa -->
                        <div class="cart-item-ver">{{ $item->book->publishing_year }} - {{ $item->book->cover }}</div>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="width: 40%;">
                    <div class="cart-item-quantity d-flex mx-md-3 mx-2 ">
                        <button onclick="changeQuantity('decrease', {{ $item->id }})">-</button>
                        <input type="text" value="{{ $item->quantity }}" id="quantity{{ $item->id }}"
                            onchange="updateItemTotal({{ $item->id }})">
                        <button onclick="changeQuantity('increase', {{ $item->id }})">+</button>
                    </div>
                    <div class="cart-item-price d-flex flex-md-row flex-column">
                        <span>{{ number_format($item->book->unit_price) }} đ</span>
                        <span class="cart-item-total-price ms-md-3" id="total-price{{ $item->id }}"
                            data-unit-price="{{ $item->book->unit_price }}">
                            {{ number_format($item->quantity * $item->book->unit_price) }} đ
                        </span>
                    </div>
                    <span class="remove-item mx-md-3 mx-2" onclick="removeItem('{{ $item->id }}')">Xóa</span>
                </div>
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