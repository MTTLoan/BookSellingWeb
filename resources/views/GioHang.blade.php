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
            <div class="cart-item d-flex mt-3 align-items-center" id="item1">
                <input type="checkbox" class="cart-item-checkbox mx-md-3 mx-2">
                <img src="{{ asset('uploads/products/1_1.png') }}" alt="Product Image" class="cart-item-image">
                <div class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
                <div class="cart-item-quantity d-flex mx-md-3 mx-2 ">
                    <button onclick="changeQuantity('decrease', 1)">-</button>
                    <input type="text" value="1" id="quantity1" onchange="updateItemTotal(1)">
                    <button onclick="changeQuantity('increase', 1)">+</button>
                </div>
                <div class="cart-item-price d-flex flex-md-row flex-column">
                    <span>42.000 đ</span>
                    <span class="cart-item-total-price ms-md-3" id="total-price1">42.000 đ</span>
                </div>
                <span class="remove-item mx-md-3 mx-2" onclick="removeItem('item1')">Xóa</span>
            </div>
            <div class="cart-item d-flex mt-3 align-items-center" id="item2">
                <input type="checkbox" class="cart-item-checkbox mx-md-3 mx-2">
                <img src="{{ asset('uploads/products/1_1.png') }}" alt="Product Image" class="cart-item-image">
                <div class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
                <div class="cart-item-quantity d-flex mx-md-3 mx-2">
                    <button onclick="changeQuantity('decrease', 2)">-</button>
                    <input type="text" value="1" id="quantity2" onchange="updateItemTotal(1)">
                    <button onclick="changeQuantity('increase', 2)">+</button>
                </div>
                <div class="cart-item-price d-flex flex-md-row flex-column">
                    <span>42.000 đ</span>
                    <span class="cart-item-total-price ms-md-3" id="total-price2">42.000 đ</span>
                </div>
                <span class="remove-item mx-md-3 mx-2" onclick="removeItem('item2')">Xóa</span>
            </div>
            <div class="cart-item d-flex mt-3 align-items-center" id="item3">
                <input type="checkbox" class="cart-item-checkbox mx-md-3 mx-2">
                <img src="{{ asset('uploads/products/1_1.png') }}" alt="Product Image" class="cart-item-image">
                <span class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</span>
                <div class="cart-item-quantity d-flex mx-md-3 mx-2">
                    <button onclick="changeQuantity('decrease', 3)">-</button>
                    <input type="text" value="1" id="quantity3" onchange="updateItemTotal(1)">
                    <button onclick="changeQuantity('increase', 3)">+</button>
                </div>
                <div class="cart-item-price d-flex flex-md-row flex-column">
                    <span>42.000 đ</span>
                    <span class="cart-item-total-price ms-md-3" id="total-price3">42.000 đ</span>
                </div>
                <span class="remove-item mx-md-3 mx-2" onclick="removeItem('item3')">Xóa</span>
            </div>
        </div>

        <!-- Phần thông tin đơn hàng bên phải -->
        <div class="cart-summary bg-white col-md-3 mt-4 mt-md-0">
            <div class="fs-5 fw-bold text-center pb-2 border-bottom">Thông tin đơn hàng</div>
            <div class="">
                <div class="d-flex justify-content-between mt-3">
                    <strong>Số lượng:</strong>
                    <span id="total-quantity">0</span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Tổng:</strong>
                    <span id="total-price">0 đ</span>
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