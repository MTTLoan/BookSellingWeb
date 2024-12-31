@extends('master.main')

@section('title', 'Thông tin đơn hàng')

@section('content')


<div class="container-sm order_infor_container bg-white">
    <div class="form-container">
        <div class="form-header">
            <div class="form-title fs-4 fs-md-2 fw-bold">Đơn hàng</div>
        </div>
        <div class="order-container">
            <!-- Navigation Tabs -->
            <nav class="status_nav d-flex flex-row overflow-x-auto text-nowrap">
                <a class="status_nav_link px-lg-4 active" aria-current="page" href="#all">Tất cả</a>
                <a class="status_nav_link px-lg-4" href="#confirmed">Đã xác nhận</a>
                <a class="status_nav_link px-lg-4" href="#shipping">Đang giao</a>
                <a class="status_nav_link px-lg-4" href="#completed">Hoàn thành</a>
                <a class="status_nav_link px-lg-4" href="#cancelled">Đã hủy</a>
                <a class="status_nav_link px-lg-4" href="#returned">Trả hàng</a>
            </nav>


            <!-- Order Section -->
            <div class="order-section d-flex flex-column gap-4">
                <div class="order-item border rounded p-lg-4 p-2 ">
                    <div class="order-info d-flex justify-content-between p-2">
                        <div class="order-date">14/10/2024</div>
                        <div class="order-status success">HOÀN THÀNH</div>
                    </div>

                    <div class="order-details border-top border-bottom p-2 d-flex flex-column gap-3">
                        <!-- Product 1 -->
                        <div class="product d-flex align-items-center">
                            <div class="image_container d-flex align-items-center justify-content-center me-2">
                                <img src="{{ asset('uploads/products/1_1.png') }}" alt="Product 1"
                                    class="product-image img-fluid">
                            </div>
                            <div class="d-flex justify-content-between w-100">
                                <div class="product-info">
                                    <div class="product-name">Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark</div>
                                    <div class="product-quantity">x 1</div>
                                </div>
                                <div class="product-price d-flex justify-content-end align-items-center text-nowrap">
                                    84.240 đ
                                </div>
                            </div>
                        </div>


                        <!-- Product 2 -->
                        <div class="product d-flex align-items-center">
                            <div class="image_container d-flex align-items-center justify-content-center me-2">
                                <img src="{{ asset('uploads/products/1_1.png') }}" alt="Product 1"
                                    class="product-image img-fluid">
                            </div>
                            <div class="d-flex justify-content-between w-100">
                                <div class="product-info">
                                    <div class="product-name">Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark</div>
                                    <div class="product-quantity">x 1</div>
                                </div>
                                <div class="product-price d-flex justify-content-end align-items-center text-nowrap">
                                    84.240 đ
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order-total d-flex justify-content-end align-items-center py-2">
                        <span>Thành tiền:</span>
                        <span class="total-price ps-2 fs-5 fw-bold text-nowrap">168.480 đ</span>
                    </div>

                    <div class="order-actions">
                        <button class="btn btn-red">Đánh giá</button>
                        <button class="btn btn-white">Trả hàng/Hoàn tiền</button>
                        <button class="btn btn_details btn-white" id="btnDetails" type="button" data-bs-dismiss="modal">Chi tiết đơn hàng</button>
                    </div>
                </div>

                <!-- Order 2 -->
                <div class="order-item border rounded p-lg-4 p-2 ">
                    <div class="order-info d-flex justify-content-between p-2">
                        <div class="order-date">14/10/2024</div>
                        <div class="order-status success">HOÀN THÀNH</div>
                    </div>

                    <div class="order-details border-top border-bottom p-2 d-flex flex-column gap-3">
                        <!-- Product 1 -->
                        <div class="product d-flex align-items-center">
                            <div class="image_container d-flex align-items-center justify-content-center me-2">
                                <img src="{{ asset('uploads/products/1_1.png') }}" alt="Product 1"
                                    class="product-image img-fluid">
                            </div>
                            <div class="d-flex justify-content-between w-100">
                                <div class="product-info">
                                    <div class="product-name">Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark</div>
                                    <div class="product-quantity">x 1</div>
                                </div>
                                <div class="product-price d-flex justify-content-end align-items-center text-nowrap">
                                    84.240 đ
                                </div>
                            </div>
                        </div>


                        <!-- Product 2 -->
                        <div class="product d-flex align-items-center">
                            <div class="image_container d-flex align-items-center justify-content-center me-2">
                                <img src="{{ asset('uploads/products/1_1.png') }}" alt="Product 1"
                                    class="product-image img-fluid">
                            </div>
                            <div class="d-flex justify-content-between w-100">
                                <div class="product-info">
                                    <div class="product-name">Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark</div>
                                    <div class="product-quantity">x 1</div>
                                </div>
                                <div class="product-price d-flex justify-content-end align-items-center text-nowrap">
                                    84.240 đ
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order-total d-flex justify-content-end align-items-center py-2">
                        <span>Thành tiền:</span>
                        <span class="total-price ps-2 fs-5 fw-bold text-nowrap">168.480 đ</span>
                    </div>

                    <div class="order-actions">
                        <button class="btn btn-red">Đánh giá</button>
                        <button class="btn btn-white">Trả hàng/Hoàn tiền</button>
                        <button class="btn btn-white">Chi tiết đơn hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup modal fade" id="modal_DetailOrder" aria-hidden="true">
    <div class="popup_container modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title">Chi tiết đơn hàng</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container-sm p-0" id="content_description">
                    <!-- Frame Sản phẩm khác-->
                    <div class="row m-0 g-4">
                        <div class="col-md-8 table-responsive m-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Combo Tư Duy Ngược và Tư Duy
                                            Mở
                                        </td>
                                        <td>1</td>
                                        <td>42.000đ</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Combo Tư Duy Ngược và Tư Duy
                                            Mở
                                        </td>
                                        <td>1</td>
                                        <td>42.000đ</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Tạm tính</td>
                                        <td class="fw-bold">84.000đ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Mã giảm giá</td>
                                        <td class="fw-bold">10.00đ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Phí vận chuyển
                                        </td>
                                        <td class="fw-bold">15.00đ</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td colspan="2">TỔNG CỘNG</td>
                                        <td class="fs-5">89.000đ</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="delivery_infor col-md-4 infor p-3 m-0 mb-4 border border-secondary-subtle rounded">
                            <p class="fw-bold m-0">
                                Thông tin giao hàng
                            </p>
                            <hr />
                            <div>
                                <span> Mai Thị Thanh Loan </span> <br />
                                <span class="text-secondary">(+84) 942170300</span>
                                <br />
                                <span class="text-secondary">37 đường số 12, Linh Tây, Thủ Đức,
                                    Thành phố Hồ Chí Minh</span><br />
                            </div>
                            <p class="fw-bold mt-3 mb-0">
                                Phương thức thanh toán
                            </p>
                            <hr />
                            <span>Thanh toán khi nhận hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/ThongTinDonHang.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/ThongTinDonHang.js') }}"></script>
@endpush