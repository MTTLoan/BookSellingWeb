@extends('master.admin')

@section('title', 'Báo cáo bán hàng')

@section('content')
<div class="container-sm p-0">
    <div class="row g-0">
        <!-- Content-->
        <div class="col-md-3 bg-white p-4">
            <div class="d-flex flex-column">
                <label for="startDate" class="form-label">Chọn ngày:</label>
                <input type="date" id="startDate" class="form-control mb-3" value="{{ request('startDate') }}">
                <button id="fetchReportBtn" class="btn btn-primary mb-3"
                    style="background-color: #007bff; color: white;">Xem báo cáo</button>
                <button id="exportExcelBtn" class="btn btn-success"
                    style="background-color: #28a745; color: white;">Xuất file Excel</button>
            </div>
        </div>
        <div class="col-md-9 bg-white p-4">
            <div class="table-responsive">
                <table id="salesReport" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ngày bán</th>
                            <th>Chi nhánh</th>
                            <th>Mã giao dịch</th>
                            <th>Tên sách</th>
                            <th>Số lượng</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($salesData as $data)
                        <tr>
                            <td>{{ $data['sale_date'] }}</td>
                            <td>{{ $data['branch'] }}</td>
                            <td>{{ $data['transaction_id'] }}</td>
                            <td>{{ $data['book_title'] }}</td>
                            <td>{{ $data['quantity'] }}</td>
                            <td>{{ $data['revenue'] }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $salesData->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin/report/sales.css') }}">
@endpush

@push('scripts')
<script>
window.startDate = @json($startDate);
</script>
<script src="{{ asset('assets/js/admin/report/sales.js') }}"></script>
@endpush