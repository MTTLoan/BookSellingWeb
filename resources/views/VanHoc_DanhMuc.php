<?php
// Include the Header.php file
include 'layout/partials/Header_DaDangNhap.blade.php';
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

    .header-container {
        display: flex;
        align-items: center;
        /* Vertically centers items */
    }

    .card-group-title {
        margin-right: 16px;
        /* Adjusts spacing between the title and filters */
    }

    .filter-group {
        display: flex;
        align-items: center;
    }

    .filter-option {
        margin-right: 8px;
        /* Space between text and next filter element */
        white-space: nowrap;
        /* Prevents text from wrapping */
    }

    .filter-button,
    .filter-dropdown {
        margin-right: 8px;
        /* Space between filter elements */
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
            /* Align items to the start on smaller screens */
        }

        .filter-button,
        .filter-dropdown {
            margin-right: 0;
            /* Remove margin on smaller screens for better layout */
            margin-bottom: 8px;
            /* Add space between stacked elements */
        }
    }
    </style>

</head>

<body>
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
        include 'layout/partials/ProductCard.blade.php'; // Gọi file chứa card sản phẩm
    }
                ?>
            </div>

        </div>
    </main>

    <?php
    // Include the Footer.php file
    include 'layout/partials/Footer.blade.php';
    ?>

    <script>

    </script>


</body>

</html>