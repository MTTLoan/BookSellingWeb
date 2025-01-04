@extends('master.admin')

@section('title', 'Xem khuyến mãi')

@section('content')
<div class="container-show container-sm p-0">
    <div class="content p-4 bg-white">
        <div class="title fs-1 fw-bold">
            <h2>Xem thông tin Khuyến mãi</h2>
            <hr />
        </div>
        <div class="form_xemkhuyenmai border p-4 rounded">
            <div class="row g-3">
                <div class="col-md-12 p-2">Mã khuyến mãi: {{ $discount->id }} </div>
                <div class="col-md-6 p-2">Mã code: {{ $discount->code }} </div>
                <div class="col-md-6 p-2">Loại kênh bán: {{ $discount->type }} </div>
                <div class="col-md-6 p-2">Tên khuyến mãi: {{ $discount->name }} </div>
                <div class="col-md-6 p-2">Chi nhánh: 
                    @foreach ($branches as $branch)
                        {{ $branch->name }}@if (!$loop->last), @endif
                    @endforeach
                </div>
                <div class="col-md-6 p-2">Ngày bắt đầu: {{ $discount->start_date }} </div>
                <div class="col-md-6 p-2">Ngày kết thúc: {{ $discount->end_date }} </div>
                <div class="col-md-6 p-2">Giá trị: {{ $discount->value }} </div>
                <div class="col-md-6 p-2">Đơn từ: {{ $discount->starting_price }} </div>
                <div class="group_btn d-flex justify-content-end p-2">
                    <button type="button" class="btn btn_exit" id="btnExit">
                        Thoát
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/admin/discount/show.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/admin/discount/show.js') }}"></script>
@endpush

@if ($errors->any())
<script>
    Swal.fire({
            icon: 'error',
            title: 'Thêm thất bại',
            html: `
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
        });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
            icon: 'success',
            title: 'Thêm thành công',
            text: "{{ session('success') }}",
        }).then(function() {
            window.location.href = "{{ route('discount.index') }}";
        });
</script>
@endif

</html>