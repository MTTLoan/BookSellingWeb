@extends('master.admin')
@section('title', 'Bán hàng') @section('content')
<div class="container_selling container-sm p-0 mt-4 mb-4">
    <div class="row">
        <!-- Mobile -->
        <div class="mobile_togger d-flex align-items-center d-md-none ms-3 my-3 p-0">
            <p class="mobile_title fs-2 fw-bold text-center w-100 m-0">
                BÁN HÀNG
            </p>
        </div>
        <div class="left_panel col-md-8 pe-4">
            <input class="form_input w-100 bg-white rounded" type="text" id="search-product" placeholder="Tìm hàng hóa"
                onkeyup="filterProducts()" />
            <div class="product-list mt-3">
                <div class="row g-4">
                    <div class="product-card col-lg-4 col-sm-6 d-flex">
                        <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                            class="img-fluid" />
                        <div class="product-info">
                            <div class="name">Trốn lên mái nhà để khóc</div>
                            <div class="quantity">SL: 1</div>
                            <div class="price">50.000 đ</div>
                        </div>
                    </div>
                    <div class="product-card col-lg-4 col-sm-6 d-flex">
                        <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                            class="img-fluid" />
                        <div class="product-info">
                            <div class="name">Trốn lên mái nhà để khóc</div>
                            <div class="quantity">SL: 1</div>
                            <div class="price">50.000 đ</div>
                        </div>
                    </div>
                    <div class="product-card col-lg-4 col-sm-6 d-flex">
                        <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                            class="img-fluid" />
                        <div class="product-info">
                            <div class="name">Trốn lên mái nhà để khóc</div>
                            <div class="quantity">SL: 1</div>
                            <div class="price">50.000 đ</div>
                        </div>
                    </div>

                    <!-- Các sản phẩm khác sẽ tiếp tục thêm vào theo dạng 3 sản phẩm mỗi hàng -->
                    <div class="product-card col-lg-4 col-sm-6 d-flex">
                        <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                            class="img-fluid" />
                        <div class="product-info">
                            <div class="name">Trốn lên mái nhà để khóc</div>
                            <div class="quantity">SL: 1</div>
                            <div class="price">50.000 đ</div>
                        </div>
                    </div>
                    <div class="product-card col-lg-4 col-sm-6 d-flex">
                        <img src="{{ asset('uploads/products/tron-len-mai-nha-de-khoc.jpg') }}" alt="product"
                            class="img-fluid" />
                        <div class="product-info">
                            <div class="name">Trốn lên mái nhà để khóc</div>
                            <div class="quantity">SL: 1</div>
                            <div class="price">50.000 đ</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right_panel col-md-4 bg-white p-2 rounded mt-3 mt-md-0">
            <div class="d-flex justify-content-between">
                <p>Thu Ngân</p>
                <p class="date-time" id="current-date-time"></p>
            </div>
            <input class="form_input w-100" type="text" id="search-customer" placeholder="Tìm khách hàng" />
            <div class="cart-item d-flex justify-content-between align-items-center mt-3" id="item1">
                <div class="cart-item-number">1</div>
                <span class="remove-item" onclick="removeItem('item1')"><i class="bi bi-trash3"></i></span>
                <div class="cart-item-name">SP00016</div>
                <div class="cart-item-quantity d-flex">
                    <button class="icon_quantity" onclick="changeQuantity('decrease', 1)">
                        -
                    </button>
                    <input class="form_input bg-white border" type="text" value="1" id="quantity1"
                        onchange="updateItemTotal(1)" />
                    <button class="icon_quantity" onclick="changeQuantity('increase', 1)">
                        +
                    </button>
                </div>
                <div class=""><span>50.000 đ</span>
                    <strong class="cart-item-total-price" id="total-price1">50.000 đ</strong>
                </div>

            </div>
            <div class="product-summary">
                <div class="d-flex justify-content-between mt-3 mb-2">
                    <span>Tổng tiền hàng:</span>
                    <span id="total-price"> 0 đ</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Giảm giá:</span>
                    <span id="sale-price"> 0 đ</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <strong>Khách cần trả:</strong>
                    <h5 class="fw-bold" id="total-price"> 0 đ</h5>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <strong>Khách thanh toán:</strong>
                    <strong id="price"> 0 đ</strong>
                </div>
            </div>
            <div class="payment-method mt-3 d-flex justify-content-between align-items-center">
                <span>Phương thức: </span>
                <label class="d-flex align-items-center"><input class="me-2" type="radio" name="payment" value="cash"
                        checked />
                    Tiền mặt</label>
                <label class="d-flex align-items-center"><input class="me-2" type="radio" name="payment"
                        value="transfer" />
                    Chuyển khoản</label>
            </div>
            <div class="price-container mt-3 d-flex flex-wrap gap-2 mb-3 ps-2">
                <span class="price-box" value="10000">10,000 đ</span>
                <span class="price-box" value="20000">20,000 đ</span>
                <span class="price-box" value="50000">50,000 đ</span>
                <span class="price-box" value="100000">100,000 đ</span>
                <span class="price-box" value="200000">200,000 đ</span>
                <span class="price-box" value="500000">500,000 đ</span>
            </div>
            <button class="btn btn_checkOut w-100" id="checkout-button" onclick="checkout()">
                Thanh toán
            </button>
        </div>
    </div>
</div>

<!-- Modal Thanh toán thành công -->
<div class="modal modal_complete fade" id="modal_Complete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <span class="modal-title fs-3 fw-bold" id="staticBackdropLabel">
                    Thanh toán
                </span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <h5>Thanh toán thành công!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn_close me-4" data-bs-dismiss="modal">
                    Đóng
                </button>
            </div>
        </div>
    </div>
</div>
@endsection @push('styles')
<link href="{{ asset('assets/css/TCN_BanHang.css') }}" rel="stylesheet" />
@endpush @push('scripts')
<script src="{{ asset('assets/js/TCN_BanHang.js') }}"></script>
@endpush