@extends('master.admin')

@section('title', 'Tổng quan')

@section('content')
<div class="container-sm p-0">
    <div class="row g-0">
        <!-- Nav_Mobile -->
        <div class="mobile_togger d-flex align-items-center d-md-none ms-3 my-3 p-0">
            <span class="material-symbols-outlined menu start-0">
                menu
            </span>
            <p class="mobile_title fs-2 fw-bold text-center w-100 m-0">
                SẢN PHẨM
            </p>
        </div>
        <!-- Content-->
        <div class="content bg-white p-4">
            <p class="fs-5 fw-bold mb-4">KẾT QUẢ BÁN HÀNG HÔM NAY</p>
            <div class="row">
                <div class="col-6 col-lg-3 p-auto d-flex border-end mb-3">
                    <div class="card_icon pe-2 align-content-center">
                        <span class="material-symbols-outlined color-orange">
                            export_notes
                        </span>
                    </div>
                    <div class="card_body align-content-center">
                        <span class="fs-2 color-orange">{{ $orderDataToday->total_orders }}</span>
                        <br />
                        <span>Hóa đơn</span>
                    </div>
                </div>
                <div class="col-6 col-lg-3 p-auto d-flex mb-3">
                    <div class="card_icon pe-2 align-content-center">
                        <span class="material-symbols-outlined color-orange">
                            paid
                        </span>
                    </div>
                    <div class="card_body align-content-center">
                        <span
                            class="fs-2 color-orange">{{ number_format($orderDataToday->total_sales, 0, ',', '.') }}</span>
                        <br />
                        <span>Doanh thu</span>
                    </div>
                </div>
                <div class="col-6 col-lg-3 p-auto d-flex border-end mb-3">
                    <div class="card_icon pe-2 align-content-center">
                        <span
                            class="material-symbols-outlined {{ $percentChangeYesterday >= 0 ? 'color-green' : 'color-red' }}">
                            {{ $percentChangeYesterday >= 0 ? 'arrow_circle_up' : 'arrow_circle_down' }}
                        </span>
                    </div>
                    <div class="card_body align-content-center">
                        <span
                            class="fs-2 {{ $percentChangeYesterday >= 0 ? 'color-green' : 'color-red' }}">{{ number_format($percentChangeYesterday, 2) }}%</span>
                        <br />
                        <span>So với hôm qua</span>
                    </div>
                </div>
                <div class="col-6 col-lg-3 p-auto d-flex mb-3">
                    <div class="card_icon pe-2 align-content-center">
                        <span
                            class="material-symbols-outlined {{ $percentChangeLastMonth >= 0 ? 'color-green' : 'color-red' }}">
                            {{ $percentChangeLastMonth >= 0 ? 'arrow_circle_up' : 'arrow_circle_down' }}
                        </span>
                    </div>
                    <div class="card_body align-content-center">
                        <span
                            class="fs-2 {{ $percentChangeLastMonth >= 0 ? 'color-green' : 'color-red' }}">{{ number_format($percentChangeLastMonth, 2) }}%</span>
                        <br />
                        <span>So với cùng kỳ tháng trước</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content 1-->
        <div class="content bg-white p-4 mt-4">
            <div class="d-flex justify-content-between p-auto">
                <span class="fs-5 fw-bold">DOANH THU THÁNG NÀY</span>
                <div class="d-flex align-content-between">
                    @if(in_array(auth('web')->user()->role, ['director', 'admin']))
                    <select id="branchSelect" class="form-select" onchange="location = this.value;">
                        <option value="{{ url('/admin') }}?branch_id=all" {{ $branchId == 'all' ? 'selected' : '' }}>Tất
                            cả chi nhánh</option>
                        @foreach($branches as $branch)
                        <option value="{{ url('/admin') }}?branch_id={{ $branch->id }}"
                            {{ $branchId == $branch->id ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>
                        @endforeach
                    </select>
                    @else
                    <span>{{ auth('web')->user()->branch->name }}</span>
                    @endif
                </div>
            </div>
            <div class="group_button d-flex g-0">
                <button class="btn bg-white px-3 active" id="btnDay">
                    Theo ngày
                </button>
                <button class="btn bg-white px-3" id="btnWeek">
                    Theo tuần
                </button>
                <button class="btn bg-white px-3" id="btnMonth">
                    Theo tháng
                </button>
            </div>
            <div class="chart">
                <canvas class="bg-white mt-4" id="myChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
window.salesByDay = @json($salesByDay);
window.salesByWeek = @json($salesByWeek);
window.salesByMonth = @json($salesByMonth);

window.branchId = @json($branchId);
</script>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/home/index.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/home/index.js') }}"></script>
@endpush