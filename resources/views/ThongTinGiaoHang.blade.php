@extends('master.main')
@section('title', 'Thông tin giao hàng')
@section('content')

<div class="shipping_infor_container body-container">
    <div class="form-container">
        <form>
            <div class="form-header">
                <div class="form-title">Thông tin giao hàng</div>
            </div>
            <form id="personal-info-form">
                <div class="form-group">
                    <label for="name">Họ và tên (*)</label>
                    <input type="text" class="form-control" id="name" placeholder="Nguyễn Văn Nam">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại (*)</label>
                    <input type="tel" class="form-control" id="phone" placeholder="0123456789">
                </div>
                <div class="form-group">
                    <label for="city">Tỉnh, thành</label>
                    <select id="city" class="form-select">
                        <option>Chọn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="district">Quận, huyện</label>
                    <select id="district" class="form-select">
                        <option>Chọn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ward">Phường, xã</label>
                    <select id="ward" class="form-select">
                        <option>Chọn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" placeholder="abc xyz">
                </div>
                <div class="form-group">
                    <label for="note">Ghi chú</label>
                    <textarea class="form-control" id="note" rows="4" placeholder="Mô tả cụ thể tại đây"></textarea>
                </div>
            </form>
            <div class="form-header">
                <div class="form-title">Phương thức thanh toán</div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Thanh toán bằng tiền mặt khi nhận hàng
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Thanh toán bằng hình thức chuyển khoản
                </label>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-back" id="goToCart" onclick="gotoCart()">
                    <i class="bi bi-caret-left-fill"></i> Về giỏ hàng
                </button>
                <button type="button" class="btn btn-finish" id="completeOrder">Hoàn tất đơn hàng</button>
            </div>
        </form>

    </div>
    <div class="form-container container_right">
        <div class="discount-container">
            <input type="text" class="discount-code" placeholder="Mã giảm giá">
            <button class="apply-discount">Sử dụng</button>
        </div>
        <div class="cart-item-label">
            <div class="cart-item-name">Sản phẩm</div>
            <div class="cart-item-quantity">Số lượng</div>
            <div class="cart-item-price">
                <span class="cart-item-total-price">Giá tiền</span>
            </div>
        </div>

        <div class="cart-item">
            <div class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
            <div class="cart-item-quantity">1</div>
            <div class="cart-item-price">
                <span class="cart-item-total-price">42.000 đ</span>
            </div>
        </div>

        <div class="cart-item">
            <div class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
            <div class="cart-item-quantity">1</div>
            <div class="cart-item-price">
                <span class="cart-item-total-price">42.000 đ</span>
            </div>
        </div>

        <div class="cart-item">
            <div class="cart-item-name">Tạm tính</div>
            <div class="cart-item-price">
                <span class="cart-item-total-price">84.000 đ</span>
            </div>
        </div>

        <div class="cart-item">
            <div class="cart-item-name">Mã giảm giá</div>
            <div class="cart-item-price">
                <span class="cart-item-total-price">10.000 đ</span>
            </div>
        </div>

        <div class="cart-item">
            <div class="cart-item-name">Phí vận chuyển</div>
            <div class="cart-item-price">
                <span class="cart-item-total-price">15.000 đ</span>
            </div>
        </div>


        <div class="total">
            <strong>TỔNG CỘNG: </strong> 89.000 đ
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/ThongTinGiaoHang.css') }}" rel="stylesheet">
@endpush
