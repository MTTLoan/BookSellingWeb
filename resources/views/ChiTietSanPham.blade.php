@extends('master.main')

@section('title', 'Chi tiết sản phẩm')

@section('content')

<div class="container_DetailsProduct container-fluid-sm">
    <!-- Frame Sản phẩm chính-->
    <div class="row container_product m-0 g-4 bg-white">
        <div class="col-md-5 bg-white px-md-5 m-0 p-0">
            <div class="main-image text-center mb-4">
                <img id="mainImage" src="{{ asset($images->first()->url) }}" alt="Main Image" class="img-fluid" />
            </div>
            <div class="thumbnail-container d-flex justify-content-center gap-2 py-2">
                @foreach ($images as $image)
                @if (!$loop->first)
                <div class="thumbnail">
                    <img src="{{ asset($image->url) }}" alt="Thumbnail 4" onclick="updateMainImage(this)"
                        class="img-fluid" />
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-7 info_product px-md-2 px-4 pb-4">

            <h2 class="fw-bold fs-2 mb-4" id="title">
                {{ $booktitle->name }}
            </h2>
            <div class="description_main_product p-0">
                <div class="gap-5">
                    <div class="">
                        <div class="d-flex align-content-center">
                            <span class="material-symbols-outlined kid_star">
                                kid_star
                            </span>
                            <span class="material-symbols-outlined kid_star">
                                kid_star
                            </span>
                            <span class="material-symbols-outlined kid_star">
                                kid_star
                            </span>
                            <span class="material-symbols-outlined kid_star">
                                kid_star
                            </span>
                            <span class="material-symbols-outlined kid_star me-2">
                                kid_star
                            </span>
                            <span>({{ $review_score->review_count ?? 0 }} đánh giá)</span>
                        </div>
                    </div>
                    <div class="">
                        <p>&nbsp;</p>
                        <p>Tác giả: {{ $booktitle->author }}</p>
                        <p>Số trang: {{ $books->first()->page_number ?? 'N/A' }}</p>
                        <p>Mô tả: {{ $booktitle->description }}</p>
                    </div>
                </div>
                <hr />
                <h1 class="fw-bold text-danger" id="priceDisplay">{{ number_format($books->first()->unit_price ?? 0, 0, '', '.') }} đ</h1>
                <hr />
                <h4>Chọn phiên bản:</h4>
                <div class="d-flex gap-3 mb-4">
                    @foreach ($books as $book)
                    <button class="btn btn-outline-primary version-btn" data-book-id="{{ $book->id }}"
                        data-price="{{ $book->unit_price }}" data-page-number="{{ $book->page_number }}">
                        {{ $book->publishing_year }} - {{ $book->cover }}
                    </button>
                    @endforeach
                </div>
            </div>
            <div class="d-flex gap-3 mb-4">
                <label for="quantity" class="form-label">Số lượng:</label>
                <div class="quantity-control">
                    <button type="button" class="btn-decrease" onclick="decreaseQuantity()">-</button>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 1) }}" min="1"
                        max="100" readonly>
                    <button type="button" class="btn-increase" onclick="increaseQuantity()">+</button>
                </div>
            </div>
            <div class="d-flex gap-3 mb-4">
                <button class="btn btn_AddCart" id="btnAddCart">
                    Thêm vào giỏ hàng
                </button>
                <button class="btn btn_buyNow" id="btnBuyNow">
                    Mua ngay
                </button>
            </div>
        </div>
    </div>

    <!-- Frame 2 -->
    <div class="container_description container-sm p-0" id="content_description">
        <div class="col-md-12 description bg-white mb-20" id="description">
            <div class="buttons d-flex g-0">
                <button class="btn bg-white px-3" id="btnDescription">
                    MÔ TẢ SẢN PHẨM
                </button>
            </div>
            <div id="content">
                <!-- Nội dung mặc định -->
                <div class="d-flex flex-column gap-35">
                    <p class="fs-5 fw-bold my-4">Thông tin sản phẩm</p>
                    <p>
                        Tác giả: {{ $booktitle->author }}<br />
                        Số trang: {{ $books->first()->page_number ?? 'N/A' }}<br /><br />
                        {{ $booktitle->description }}
                    </p>
                    <p class="fs-5 fw-bold my-4">Hình ảnh sản phẩm</p>
                    @foreach ($images as $image)
                    <img src="{{ asset($image->url) }}" alt="product" class="img-fluid px-md-5" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/css/ChiTietSP.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/ChiTietSP.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    let selectedBookId = `{{ $books->first() ? $books->first()->id : '' }}`;
    document.querySelectorAll('.version-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            selectedBookId = this.getAttribute('data-book-id');
            document.getElementById('priceDisplay').innerText = new Intl.NumberFormat().format(this.getAttribute('data-price')) + ' đ';
            document.getElementById('pageNumber').innerText = this.getAttribute('data-page-number');
        });
    });

    document.getElementById('btnAddCart').addEventListener('click', function () {
        const quantity = document.getElementById('quantity').value;
        console.log('Selected Book ID:', selectedBookId); // Log the selected book ID
        fetch(`{{ route('cart.store') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ book_id: selectedBookId, quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.success);
            } else {
                alert(data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Đã xảy ra lỗi. Vui lòng thử lại!');
        });
    });

    const quantityInput = document.getElementById('quantity');
    quantityInput.addEventListener('input', function () {
        if (this.value < 1) this.value = 1;
        if (this.value > 100) this.value = 100;
    });
});
</script>
@endpush
