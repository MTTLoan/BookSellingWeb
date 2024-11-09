<?php
// Include the Header.php file
include './../Components/Header_ChuaDangNhap.php';
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

    /* Sidebar */
    .category-menu {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        background-color: #f8f9fa;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
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

    /* Button Section */
    .button-section {
        text-align: center;
        padding: 10px;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
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
        background-color: #a02a21;
    }

    /* Main Banner Section */
    .image-section {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
    }

    .image-section img {
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .image-section img:hover {
        transform: scale(1.05);
    }

    .main-logo {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        color: #ff5722;
        font-family: 'Georgia', serif;
    }

    .main-logo h1 {
        font-size: 32px;
        margin: 0;
    }

    .main-logo p {
        font-size: 14px;
        color: #666;
        margin: 0;
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
    .card-group-link {
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
                    <a href="#" class="d-block py-1">VĂN HỌC</a>
                    <a href="#" class="d-block py-1">SÁCH THIẾU NHI</a>
                    <a href="#" class="d-block py-1">PHÁT TRIỂN BẢN THÂN</a>
                    <a href="#" class="d-block py-1">SÁCH GIÁO DỤC</a>
                    <a href="#" class="d-block py-1">KINH DOANH</a>
                    <a href="#" class="d-block py-1">NGOẠI NGỮ</a>
                </aside>
            </div>

            <h4 class="card-group-title">
                <span class="card-group-title-main" data-category="VanHoc">Văn học</span>
                <span class="card-group-subtitle">Tiểu thuyết | Trinh thám | Truyện ngắn | Giả tưởng | Kinh dị | Thơ
                    ca</span>
                <a href="#" class="card-group-link">Xem thêm ></a>
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
        include '../Components/ProductCard.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 class="card-group-title">
                <span class="card-group-title-main" data-category="SachThieuNhi">Sách thiếu nhi</span>
                <span class="card-group-subtitle">Tô màu | Kiến thức bách khoa | Truyện tranh</span>
                <a href="#" class="card-group-link">Xem thêm ></a>
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
        include '../Components/ProductCard.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 class="card-group-title">
                <span class="card-group-title-main" data-category="PhatTrienBanThan">Phát triển bản thân</span>
                <span class="card-group-subtitle">Kỹ năng mềm | Tư duy | Quản lý thời gian | Thiền & Sống khỏe</span>
                <a href="#" class="card-group-link">Xem thêm ></a>
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
        include '../Components/ProductCard.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 class="card-group-title">
                <span class="card-group-title-main" data-category="SachGiaoDuc">Sách giáo dục</span>
                <span class="card-group-subtitle">Sách giáo khoa | Sách tham khảo | Sách luyện thi | Luyện chữ</span>
                <a href="#" class="card-group-link">Xem thêm ></a>
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
        include '../Components/ProductCard.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 class="card-group-title">
                <span class="card-group-title-main" data-category="KinhDoanh">Kinh doanh</span>
                <span class="card-group-subtitle">Quản trị | Marketing | Khởi nghiệp | Đầu tư</span>
                <a href="#" class="card-group-link">Xem thêm ></a>
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
        include '../Components/ProductCard.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

            <h4 class="card-group-title">
                <span class="card-group-title-main" data-category="NgoaiNgu">Ngoại ngữ</span>
                <span class="card-group-subtitle">Tiếng Anh | Tiếng Nhật | Tiếng Hàn | Tiếng Trung</span>
                <a href="#" class="card-group-link">Xem thêm ></a>
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
        include '../Components/ProductCard.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>
        </div>
        </div>
    </main>

    <?php
    // Include the Footer.php file
    include './../Components/Footer.php';
    ?>

    <script>
    const viewMoreLinks = document.querySelectorAll('.card-group-link');

    // Add click event to each link
    viewMoreLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Get the category from the title
            const category = this.previousElementSibling.querySelector('.card-group-title-main').dataset
                .category;

            // Construct the URL dynamically based on the category
            const targetUrl =
                `${category.replace(/\s+/g, '')}_danhmuc.php`; // Convert space to remove for filename

            // Redirect to the corresponding PHP page
            window.location.href = targetUrl;
        });
    });
    </script>
</body>

</html>