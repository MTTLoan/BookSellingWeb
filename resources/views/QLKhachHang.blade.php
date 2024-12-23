@extends('master.admin')

@section('title', 'Quản lý khuyến mãi')

@section('content')
<div class="container_customer container-sm p-0">
    <div class="row">
        <div class="sidebar col-md-3 d-none d-md-block">
            <p class="sidebar_title fs-3 fw-bold">Khách hàng</p>
            <!-- Doanh thu -->
            <div class="filter_revenue bg-white p-3 rounded-2 mb-4">
                <label for="filter_revenue" class="form-label d-flex justify-content-between fw-bold" id="headingOne">
                    Doanh thu
                </label>
                <div class="d-flex flex-wrap gap-2 mb-4 ps-2">
                    <span class="label_revenue" value="2000000">
                        Dưới 2 triệu
                    </span>
                    <span class="label_revenue" value="2000000 - 4000000">
                        Từ 2 - 4 triệu </span>
                    <span class="label_revenue" value="4000000 - 7000000">
                        Từ 4 - 7 triệu
                    </span>
                    <span class="label_revenue" value="7000000 - 13000000">
                        Từ 7 - 13 triệu
                    </span>
                    <span class="label_revenue" value="13000000 - 20000000">
                        Từ 13 - 20 triệu
                    </span>
                    <span class="label_revenue" value="20000000" id="revenue_20">
                        Trên 20 triệu
                    </span>
                </div>
            </div>
            <!-- End Doanh thu -->
        </div>


        <!-- Mobile -->
        <div class="mobile_togger d-flex align-items-center d-md-none ms-3 my-3 p-0">
            <p class="mobile_title fs-2 fw-bold text-center w-100 m-0">
                KHÁCH HÀNG
            </p>
        </div>

        <!-- Content -->
        <div class="content col-md-9">
            <!-- Tìm kiếm -->
            <div class="group-top row d-flex justify-content-end">
                <div class="search col-md-6 d-flex mb-3">
                    <input type="text" class="form-control me-1" placeholder="Tên sách, tên tác giả, thể loại..." />
                    <button class="btn btn_search text-nowrap">Tìm kiếm</button>
                </div>
                <div class="group_button col-md-6 d-flex mb-3">
                    <!-- Button trigger modal filter mobile -->
                    <button type="button"
                        class="btn_filter d-flex align-items-center justify-content-center p-0 d-md-none"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="material-symbols-outlined d-md-none filter">
                            filter_alt
                        </span>
                    </button>
                    <!-- Button add/import -->
                    <div class="button d-flex justify-content-end w-100">
                        <button class="btn btn_add d-flex align-items-center text-nowrap" id="btnAdd">
                            <span class="material-symbols-outlined add"> add </span>
                            Thêm
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table sản phẩm -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="serial" style="min-width: 40px">STT</th>
                            <th scope="customer_title" style="min-width: 140px">
                                Tên khách hàng
                            </th>
                            <th scope="gender" style="min-width: 85px">Giới tính</th>
                            <th scope="birth_date" style="min-width: 65px">Ngày sinh</th>
                            <th scope="phone_number" style="min-width: 65px">SĐT</th>
                            <th scope="district" style="min-width: 80px">Quận/Huyện</th>
                            <th scope="city" style="min-width: 80px">Tỉnh/Thành phố</th>
                            <th scope="revenue" style="min-width: 80px">Doanh thu</th>
                            <th scope="action" style="min-width: 100px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nguyễn Văn A</td>
                            <td>Nam</td>
                            <td>20/10/2000</td>
                            <td>0123456789</td>
                            <td>Quận 1</td>
                            <td>TP Hồ Chí Minh</td>
                            <td>2,000,000</td>
                            <td>
                                <button type="button" class="btn_preview p-0" id="btnPreview">
                                    <span class="material-symbols-outlined details">visibility</span>
                                </button>
                                <button type="button" class="btn_edit p-0" id="btnEdit">
                                    <span class="material-symbols-outlined edit">border_color</span>
                                </button>
                                <button type="button" class="btn_delete p-0" id="btnDelete">
                                    <span class="material-symbols-outlined delete">delete</span>
                                </button>
                            </td>
                        </tr>
                        <!-- Thêm các hàng khách hàng khác -->
                    </tbody>
                    <tfoot></tfoot>
                </table>

                {{--
                <!-- Hiển thị liên kết phân trang -->
                <div class="d-flex justify-content-center">
                    {{ $books->links('pagination::bootstrap-5') }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal Filter Mobile -->
<div class="modal modal-filter fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-3 fw-bold" id="staticBackdropLabel">
                    Khách hàng
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Doanh thu -->
                <div class="filter_revenue bg-white p-3 rounded-2 mb-4">
                    <label for="filter_revenue" class="form-label d-flex justify-content-between fw-bold"
                        id="headingOne">
                        Doanh thu
                    </label>
                    <div class="d-flex flex-wrap gap-2 mb-4 ps-2">
                        <span class="label_revenue" value="2000000">
                            Dưới 2 triệu
                        </span>
                        <span class="label_revenue" value="2000000 - 4000000">
                            Từ 2 - 4 triệu </span>
                        <span class="label_revenue" value="4000000 - 7000000">
                            Từ 4 - 7 triệu
                        </span>
                        <span class="label_revenue" value="7000000 - 13000000">
                            Từ 7 - 13 triệu
                        </span>
                        <span class="label_revenue" value="13000000 - 20000000">
                            Từ 13 - 20 triệu
                        </span>
                        <span class="label_revenue" value="20000000" id="revenue_20">
                            Trên 20 triệu
                        </span>
                    </div>
                </div>
                <!-- End Doanh thu -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn_cancel" data-bs-dismiss="modal">
                    Hủy
                </button>
                <button type="button" class="btn btn_complete" data-bs-dismiss="modal">
                    Hoàn tất
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Sidebar -->

<!-- Modal Xóa khách hàng -->
<div class="modal modal_delete fade" id="modal_Delete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fs-3 fw-bold" id="staticBackdropLabel">
                    Xóa khách hàng
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Bạn có chắc chắn muốn xóa khách hàng này?</p>
                <p class="fst-italic">(Khi xóa, dữ liệu sẽ không được hoàn tác.)</p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn_cancel me-4" data-bs-dismiss="modal">
                    Hủy
                </button>
                <button type="button" class="btn btn_agree" data-bs-dismiss="modal">
                    Đồng ý
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/QLKhachHang.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/QLKhachHang.js') }}"></script>
@endpush