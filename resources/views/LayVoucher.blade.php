@extends('master.main')

@section('title', "Voucher")

@section('content')

<div class="voucher_container container-sm p-0">
    <div class="content p-4 bg-white rounded">
        <div class="title fs-1 fw-bold pb-4">
            <h1>Voucher</h1>
        </div>
        <div class="list">
            <div class="col coupon justify-content-center d-flex mb-2 rounded">
                <div class="icon_coupon align-content-center rounded-start">
                    <img src="/public/assets/images/ico_coupongreen.png" alt="Voucher" class="img-fluid" />
                </div>
                <div class="coupon_code justify-content-start p-3">
                    <p class="fw-bold">Mã giảm giá 100K</p>
                    <p>
                        Không áp dụng cho đơn hàng bao gồm giá trị của
                        các sản phẩm Ngoại Văn, Manga, Phiếu Quà Tặng,
                        Sách Giáo Khoa, Máy Tính và Giấy Photo và Một Số
                        Loại Giấy và Bảng Khác
                    </p>
                    <p class="fw-bold">Mã voucher - FHS100KT10</p>
                </div>
                <div class="buttons p-3">
                    <button class="btn btn_details text-nowrap">
                        Chi tiết
                    </button>
                    <button class="btn btn_copy text-nowrap">
                        Sao chép
                    </button>
                </div>
            </div>
            <div class="col coupon justify-content-center d-flex mb-2 rounded">
                <div class="icon_coupon align-content-center rounded-start">
                    <img src="/public/assets/images/ico_coupongreen.png" alt="Voucher" class="img-fluid" />
                </div>
                <div class="coupon_code justify-content-start p-3">
                    <p class="fw-bold">Mã giảm giá 100K</p>
                    <p>
                        Không áp dụng cho đơn hàng bao gồm giá trị của
                        các sản phẩm Ngoại Văn, Manga, Phiếu Quà Tặng,
                        Sách Giáo Khoa, Máy Tính và Giấy Photo và Một Số
                        Loại Giấy và Bảng Khác
                    </p>
                    <p class="fw-bold">Mã voucher - FHS100KT10</p>
                </div>
                <div class="buttons p-3">
                    <button class="btn btn_details text-nowrap">
                        Chi tiết
                    </button>
                    <button class="btn btn_copy text-nowrap">
                        Sao chép
                    </button>
                </div>
            </div>
            <div class="col coupon justify-content-center d-flex mb-2 rounded">
                <div class="icon_coupon align-content-center rounded-start">
                    <img src="/public/assets/images/ico_coupongreen.png" alt="Voucher" class="img-fluid" />
                </div>
                <div class="coupon_code justify-content-start p-3">
                    <p class="fw-bold">Mã giảm giá 100K</p>
                    <p>
                        Không áp dụng cho đơn hàng bao gồm giá trị của
                        các sản phẩm Ngoại Văn, Manga, Phiếu Quà Tặng,
                        Sách Giáo Khoa, Máy Tính và Giấy Photo và Một Số
                        Loại Giấy và Bảng Khác
                    </p>
                    <p class="fw-bold">Mã voucher - FHS100KT10</p>
                </div>
                <div class="buttons p-3">
                    <button class="btn btn_details text-nowrap">
                        Chi tiết
                    </button>
                    <button class="btn btn_copy text-nowrap">
                        Sao chép
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<link href="{{ asset('assets/css/LayVoucher.css') }}" rel="stylesheet">
@endpush
