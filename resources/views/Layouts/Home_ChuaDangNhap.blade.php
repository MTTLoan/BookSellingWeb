<?php
// Include the Header.php file
include './../Components/Header_ChuaDangNhap.blade.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.js"></script>

    <style>
    body {
        background-color: #f7f7f7 !important;
    }

    .container-fluid-product {
        margin: 10px 60px;
        padding: 20px;
    }


    /* Button Section */
    .button-section {
        display: flex;
        justify-content: start;
        flex-wrap: wrap;
        margin-top: 0;
        /* Đặt margin-top bằng 0 để căn chỉnh với các phần tử khác */
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .button-section button {
        flex: 1 1 50px;
        /* Các nút sẽ chiếm ít nhất 150px, nhưng có thể linh hoạt */
        white-space: nowrap;
        /* Đảm bảo chữ không bị ngắt dòng */
    }

    /*3 ảnh*/
    /* Điều chỉnh chiều cao của các ô */
    .table-responsive .banner-cell {
        height: 400px;
        /* Điều chỉnh chiều cao của ảnh banner */
    }

    .table-responsive .book-cell {
        height: 200px;
        /* Điều chỉnh chiều cao của ảnh sách */
    }

    /* Ảnh banner sẽ không bị cắt, giữ nguyên tỷ lệ */
    .table-responsive .banner-cell img {
        object-fit: contain;
        /* Giữ nguyên tỷ lệ ảnh, không cắt */
        width: 100%;
        height: 100%;
    }

    /* Ảnh sách tự động cắt phần thừa */
    .table-responsive .book-cell img {
        object-fit: cover;
        /* Cắt ảnh để chiếm toàn bộ không gian của ô */
        width: 100%;
        height: 100%;
    }

    /* Cột Banner */
    .banner-cell {
        width: 75%;
        /* Điều chỉnh chiều rộng của cột banner */
    }

    /* Cột sách */
    .book-cell {
        width: 25%;
        /* Điều chỉnh chiều rộng của cột sách */
    }

    /* Media Queries - khi màn hình nhỏ lại */
    @media (max-width: 1300px) {
        .table-responsive .banner-cell {
            height: 300px;
            /* Giảm chiều cao của ảnh banner */
        }

        .table-responsive .book-cell {
            height: 150px;
            /* Giảm chiều cao của ảnh sách */
        }

        /* Khi màn hình nhỏ, ảnh sẽ tự động thu nhỏ và không bị cắt */
        .table-responsive .banner-cell img,
        .table-responsive .book-cell img {
            width: 100%;
            height: 100%;
        }
    }

    @media (max-width: 1000px) {
        .table-responsive .banner-cell {
            height: 200px;
            /* Giảm chiều cao của ảnh banner */
        }

        .table-responsive .book-cell {
            height: 120px;
            /* Giảm chiều cao của ảnh sách */
        }

        /* Điều chỉnh ảnh khi màn hình nhỏ hơn 768px */
        .table-responsive .banner-cell img,
        .table-responsive .book-cell img {
            width: 100%;
            height: auto;
            /* Giữ nguyên tỷ lệ ảnh, không bị méo */
        }
    }

    .category-menu {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .category-menu .d-block {
        margin-bottom: 0.5rem;
    }

    .category-header {
        background-color: #f0f0f0;
        padding: 10px;
        margin-bottom: 10px;
        font-weight: bold;
        border-radius: 5px;
    }

    .category-menu a {
        display: block;
        color: #333;
        padding: 8px;
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.2s;
        margin-left: 10px;
    }

    .category-menu a:hover {
        background-color: #e2e6ea;
    }

    .button-section .btn {
        width: 150px;
        font-size: 16px;
        border-radius: 5px;
        font-weight: bold;
        color: black;
        border: none;
        transition: background-color 0.3s;
    }

    .button-section .btn:hover {
        background-color: #e2e6ea;
    }

    /* Title Above Card Group */
    .card-group-title {
        font-size: 2rem;
        font-weight: bold;
        display: flex;
        /* Use flexbox for layout */
        align-items: end;
        /* Vertically center the items */
        justify-content: space-between;
        /* Space out the title and the link */
        width: 100%;
        /* Ensure the title takes the full width */
        margin-bottom: 1rem;
        /* Spacing between title and description */
        margin-top: 2rem;
    }

    /* Title text */
    .card-group-title-main {
        font-size: 1.5 rem;
        color: #333;
        /* Title color */
    }

    /* Subtitle (Smaller Text) */
    .card-group-subtitle {
        font-size: 0.9rem;
        font-weight: normal;
        color: #888;
        /* Gray color */
        margin-left: 1rem;
        /* Space between title and subtitle */
        flex-grow: 1;
        /* Allow the subtitle to take available space */
    }

    /* Link style for 'Xem thêm' */
    .card-group-link-1,
    .card-group-link-2,
    .card-group-link-3,
    .card-group-link-4,
    .card-group-link-5,
    .card-group-link-6,
    .card-group-link-blog {
        font-size: 0.9rem;
        color: #C53327;
        /* Color for the link */
        text-decoration: none;
    }

    .card-group-link:hover {
        text-decoration: underline;
        /* Underline on hover */
    }
    </style>

</head>

<body>
    <main>
        <div class="container-fluid-product">
            <div class="row">
                <!-- Sidebar - Categories -->
                <aside class="col-md-3 col-lg-3 category-menu border rounded p-0 bg-white">
                    <div class="category-header bg-light p-2">
                        <h5 class="fw-bold">
                            <i class="bi bi-list"></i> Danh mục sản phẩm
                        </h5>
                    </div>
                    <a href="#VanHoc" class="d-block py-1">VĂN HỌC</a>
                    <a href="#SachThieuNhi" class="d-block py-1">SÁCH THIẾU NHI</a>
                    <a href="#PhatTrienBanThan" class="d-block py-1">PHÁT TRIỂN BẢN THÂN</a>
                    <a href="#SachGiaoDuc" class="d-block py-1">SÁCH GIÁO DỤC</a>
                    <a href="#KinhDoanh" class="d-block py-1">KINH DOANH</a>
                    <a href="#NgoaiNgu" class="d-block py-1">NGOẠI NGỮ</a>
                </aside>

                <!-- Main Content -->
                <main class="col-md-9 col-lg-9">
                    <!-- Button Section with Border -->
                    <div class="button-section border rounded d-flex justify-content-start my-4 p-3">
                        <button class="btn me-3" data-target="DonHang">Đơn hàng</button>
                        <button class="btn me-3" data-target="Voucher">Voucher</button>
                        <button class="btn me-3" data-target="Review">Review</button>
                        <button class="btn" data-target="Blog">Blog</button>
                    </div>


                    <!-- Image Section -->
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <!-- Column 1 (Banner Image) - Cột 1 chiếm 2 dòng -->
                                    <td rowspan="2" class="banner-cell">
                                        <img src="../../../public/assets/images/Banner.png" alt="Banner Image"
                                            class="img-fluid rounded w-100">
                                    </td>

                                    <!-- Column 2, Row 1 (Book 1) -->
                                    <td class="book-cell">
                                        <img src="../../../public/assets/images/sach1.jpg" alt="Book 1"
                                            class="img-fluid rounded w-100">
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Column 2, Row 2 (Book 2) -->
                                    <td class="book-cell">
                                        <img src="../../../public/assets/images/Sach2.jpg" alt="Book 2"
                                            class="img-fluid rounded w-100">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </main>


            </div>

            <h4 id="VanHoc" class="card-group-title">
                <span class="card-group-title-main" data-category="VanHoc">Văn học</span>
                <span class="card-group-subtitle">Tiểu thuyết | Trinh thám | Truyện ngắn | Giả tưởng | Kinh dị | Thơ
                    ca</span>
                <a href="#" class="card-group-link-1">Xem thêm ></a>
            </h4>

            <!-- Product Cards -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <?php
    // Dữ liệu sản phẩm (có thể lấy từ CSDL hoặc API)
    $products = [
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        // Thêm nhiều sản phẩm ở đây
        // ['image' => 'path-to-image', 'price' => 'price', 'name' => 'product name', 'sold' => sold_count],
    ];

    // Lặp qua các sản phẩm và include card cho mỗi sản phẩm
    foreach ($products as $product) {
        include '../Components/ProductCard.blade.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 id="SachThieuNhi" class="card-group-title">
                <span class="card-group-title-main" data-category="SachThieuNhi">Sách thiếu nhi</span>
                <span class="card-group-subtitle">Tô màu | Kiến thức bách khoa | Truyện tranh</span>
                <a href="#" class="card-group-link-2">Xem thêm ></a>
            </h4>

            <!-- Product Cards -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <?php
    // Dữ liệu sản phẩm (có thể lấy từ CSDL hoặc API)
    $products = [
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        // Thêm nhiều sản phẩm ở đây
        // ['image' => 'path-to-image', 'price' => 'price', 'name' => 'product name', 'sold' => sold_count],
    ];

    // Lặp qua các sản phẩm và include card cho mỗi sản phẩm
    foreach ($products as $product) {
        include '../Components/ProductCard.blade.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 id="PhatTrienBanThan" class="card-group-title">
                <span class="card-group-title-main" data-category="PhatTrienBanThan">Phát triển bản thân</span>
                <span class="card-group-subtitle">Kỹ năng mềm | Tư duy | Quản lý thời gian | Thiền & Sống khỏe</span>
                <a href="#" class="card-group-link-3">Xem thêm ></a>
            </h4>

            <!-- Product Cards -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <?php
    // Dữ liệu sản phẩm (có thể lấy từ CSDL hoặc API)
    $products = [
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        // Thêm nhiều sản phẩm ở đây
        // ['image' => 'path-to-image', 'price' => 'price', 'name' => 'product name', 'sold' => sold_count],
    ];

    // Lặp qua các sản phẩm và include card cho mỗi sản phẩm
    foreach ($products as $product) {
        include '../Components/ProductCard.blade.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 id="SachGiaoDuc" class="card-group-title">
                <span class="card-group-title-main" data-category="SachGiaoDuc">Sách giáo dục</span>
                <span class="card-group-subtitle">Sách giáo khoa | Sách tham khảo | Sách luyện thi | Luyện chữ</span>
                <a href="#" class="card-group-link-4">Xem thêm ></a>
            </h4>

            <!-- Product Cards -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <?php
    // Dữ liệu sản phẩm (có thể lấy từ CSDL hoặc API)
    $products = [
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        // Thêm nhiều sản phẩm ở đây
        // ['image' => 'path-to-image', 'price' => 'price', 'name' => 'product name', 'sold' => sold_count],
    ];

    // Lặp qua các sản phẩm và include card cho mỗi sản phẩm
    foreach ($products as $product) {
        include '../Components/ProductCard.blade.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 id="KinhDoanh" class="card-group-title">
                <span class="card-group-title-main" data-category="KinhDoanh">Kinh doanh</span>
                <span class="card-group-subtitle">Quản trị | Marketing | Khởi nghiệp | Đầu tư</span>
                <a href="#" class="card-group-link-5">Xem thêm ></a>
            </h4>

            <!-- Product Cards -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <?php
    // Dữ liệu sản phẩm (có thể lấy từ CSDL hoặc API)
    $products = [
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        // Thêm nhiều sản phẩm ở đây
        // ['image' => 'path-to-image', 'price' => 'price', 'name' => 'product name', 'sold' => sold_count],
    ];

    // Lặp qua các sản phẩm và include card cho mỗi sản phẩm
    foreach ($products as $product) {
        include '../Components/ProductCard.blade.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 id="NgoaiNgu" class="card-group-title">
                <span class="card-group-title-main" data-category="NgoaiNgu">Ngoại ngữ</span>
                <span class="card-group-subtitle">Tiếng Anh | Tiếng Nhật | Tiếng Hàn | Tiếng Trung</span>
                <a href="#" class="card-group-link-6">Xem thêm ></a>
            </h4>

            <!-- Product Cards -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <?php
    // Dữ liệu sản phẩm (có thể lấy từ CSDL hoặc API)
    $products = [
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        ['image' => '../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg', 'price' => '84,240 VND', 'name' => 'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark', 'sold' => 2],
        // Thêm nhiều sản phẩm ở đây
        // ['image' => 'path-to-image', 'price' => 'price', 'name' => 'product name', 'sold' => sold_count],
    ];

    // Lặp qua các sản phẩm và include card cho mỗi sản phẩm
    foreach ($products as $product) {
        include '../Components/ProductCard.blade.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 class="card-group-title">
                <span class="card-group-title-main" data-category="Blog">Blog</span>
                <a href="#" class="card-group-link-blog">Xem thêm ></a>
            </h4>

            <!-- Product Cards -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <?php
    // Dữ liệu sản phẩm (có thể lấy từ CSDL hoặc API)
    $products = [
        ['image' => '../../../public/assets/images/review.png', 'name' => 'Cây cam ngọt của tôi'],
        ['image' => '../../../public/assets/images/review.png', 'name' => 'Cây cam ngọt của tôi'],
        ['image' => '../../../public/assets/images/review.png', 'name' => 'Cây cam ngọt của tôi'],
        ['image' => '../../../public/assets/images/review.png', 'name' => 'Cây cam ngọt của tôi'],
        // Thêm nhiều sản phẩm ở đây
        // ['image' => 'path-to-image', 'price' => 'price', 'name' => 'product name', 'sold' => sold_count],
    ];

    // Lặp qua các sản phẩm và include card cho mỗi sản phẩm
    foreach ($products as $product) {
        include '../Components/BlogCard.blade.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>
        </div>
        </div>
    </main>

    <?php
    // Include the Footer.php file
    include './../Components/Footer.blade.php';
    ?>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Chọn tất cả các liên kết có class 'card-group-link-1', 'card-group-link-2', ..., 'card-group-link-6' và 'card-group-link-blog'
        const viewMoreLinks = document.querySelectorAll(
            '.card-group-link-1, .card-group-link-2, .card-group-link-3, .card-group-link-4, .card-group-link-5, .card-group-link-6, .card-group-link-blog'
        );

        // Lặp qua tất cả các liên kết và gắn sự kiện click cho mỗi liên kết
        viewMoreLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Ngừng hành vi mặc định của liên kết

                // Lấy phần tử tiêu đề chứa class 'card-group-title-main'
                const titleElement = this.closest('.card-group-title').querySelector(
                    '.card-group-title-main');

                if (titleElement) {
                    // Lấy giá trị category từ thuộc tính dataset
                    const category = titleElement.dataset.category;
                    console.log("Category: ", category);

                    // Gọi hàm chuyển hướng đến trang tương ứng
                    navigateToPage(category);
                } else {
                    console.error("Không tìm thấy phần tử 'card-group-title-main'.");
                }
            });
        });
    });

    // Hàm chuyển hướng đến trang danh mục
    function navigateToPage(category) {
        if (category) {
            const targetUrl = `${category}_DanhMuc.blade.php`; // Tạo URL động
            window.location.href = targetUrl; // Chuyển hướng đến trang category_DanhMuc.blade.php
        } else {
            console.error("Category không hợp lệ.");
        }
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    document.querySelectorAll('.button-section .btn').forEach(button => {
        button.addEventListener('click', function() {
            const targetPage = this.getAttribute('data-target');
            window.location.href = targetPage + ".blade.php";
        });
    });
    </script>

</body>

</html>
