@extends('layout.app')

@section('title', 'Danh Mục')
<!-- Tiêu đề của trang -->

@section('content')
<main>
    <div class="container-fluid-product">
        <div class="header-container">
            <h4 id="VanHoc" class="card-group-title">
                <span class="card-group-title-main" data-category="VanHoc">Văn học</span>
            </h4>
            <div class="filter-group">
                <span class="filter-option"><i class="bi bi-sort-down">Sắp xếp theo:</i></span>
                <button class="filter-button">Giá<i class="bi bi-chevron-down"></i></button>
                <select class="filter-dropdown">
                    <option>Được đánh giá hàng đầu</option>
                    <option>Được đánh giá nhiều nhất</option>
                    <option>Ưu đãi hấp dẫn</option>
                </select>
            </div>
        </div>

        <!-- Product Cards -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
            @foreach($products as $product)
            @include('partials.ProductCard', ['product' => $product])
            @endforeach
        </div>
    </div>
</main>
@endsection

@push('styles')
<style>
body {
    background-color: #f7f7f7 !important;
}

.container-fluid-product {
    margin: 10px 60px;
    padding: 20px;
}

.card-group-title {
    font-size: 2rem;
    font-weight: bold;
    display: flex;
    align-items: end;
    justify-content: space-between;
    width: 100%;
    margin-bottom: 1rem;
    margin-top: 2rem;
}

.card-group-title-main {
    font-size: 1.5rem;
    color: #333;
}

.header-container {
    display: flex;
    align-items: center;
}

.filter-group {
    display: flex;
    align-items: center;
}

.filter-option {
    margin-right: 8px;
    white-space: nowrap;
}

.filter-button,
.filter-dropdown {
    margin-right: 8px;
    display: flex;
    height: 2rem;
}

.filter-button {
    background-color: #BA1A1A;
    color: white;
}

@media (max-width: 700px) {
    .filter-group {
        flex-direction: column;
        align-items: flex-start;
    }

    .filter-button,
    .filter-dropdown {
        margin-right: 0;
        margin-bottom: 8px;
    }
}
</style>
@endpush

@push('scripts')
<script>

</script>
@endpush