<?php
// Include the Header.php file
include 'layout/partials/Header_DaDangNhap.blade.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.js"></script>
    <title>Thông tin cá nhân</title>
    <style>
    /* Inline CSS */
    body {
        background-color: #f7f7f7 !important;
    }

    .form-container {
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 50px auto;
    }

    @media (max-width: 768px) {
        .body-container {
            flex-direction: column;
            margin: 0;
            /* Giảm margin ở màn hình nhỏ */
        }

        .form-container {
            max-width: 100%;
            margin-top: 10px;
            /* Thêm khoảng cách giữa các form khi thu nhỏ màn hình */
        }
    }

    .breadcrumb-nav {
        margin: 10px 60px;
        font-size: 16px;
    }

    .breadcrumb-link {
        color: #C53327;
        text-decoration: none;
        font-weight: bold;
    }

    .breadcrumb-separator {
        color: #333;
    }

    .breadcrumb-current {
        color: #333;
        font-weight: bold;
    }

    .form-header {
        text-align: left;
        margin-bottom: 20px;
    }

    .form-title {
        font-weight: bold;
        font-size: 24px;
        color: #333;
        margin-bottom: 5px;
        position: relative;
    }

    .form-title::after {
        content: "";
        display: block;
        height: 2px;
        background-color: #989696;
        width: 10%;
        margin-top: 10px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: #ffffff;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #C53327;
        outline: none;
    }

    .form-check-input {
        position: relative;
        width: 20px;
        height: 20px;
        border: 2px solid #ccc;
        border-radius: 50%;
        margin-right: 10px;
        background-color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        padding-left: 10px;
        /* Thêm khoảng cách bên trái của nút radio */
    }

    .form-check-label {
        font-size: 16px;
        color: #333;
        cursor: pointer;
    }

    /* Tạo hiệu ứng khi radio button được chọn */
    .form-check-input:checked {
        background-color: #C53327;
        border-color: #C53327;
    }

    /* Thêm border cho phần label */
    .form-check {
        display: flex;
        align-items: center;
        padding: 10px;
        border: 2px #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
        transition: border 0.3s ease;
    }

    /* Thêm hiệu ứng khi hover lên label */
    .form-check:hover {
        border-color: #C53327;
    }

    .nav {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 20px;
        gap: 10px;
    }

    .nav-link {
        padding: 10px 20px;
        text-decoration: none;
        color: black !important;
        transition: all 0.3s ease;
        margin-bottom: 10px;
    }

    .nav-link.active {
        color: #DA392B !important;
    }

    .nav-link:hover {
        background-color: #ddd;
        /* Nền màu xám nhạt khi hover */
        color: #333;
        /* Màu chữ đen khi hover */
    }

    .tab-content {
        display: none;
        padding: 20px;
    }

    .tab-content.active {
        display: block;
    }


    .order-item {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #fff;
    }

    .order-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .product {
        display: flex;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #ddd;
    }

    .order-date {
        font-size: 14px;
        color: #333;
    }

    .order-status {
        font-size: 14px;
        font-weight: bold;
    }

    .order-status.success {
        color: green;
        /* Màu xanh cho trạng thái hoàn thành */
    }

    .order-status.cancelled {
        color: red;
        /* Màu đỏ cho trạng thái hủy */
    }


    .order-details {
        margin-bottom: 20px;
    }

    .product {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .product-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 15px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    .product-info {
        flex: 1;
    }

    .product-name {
        font-size: 14px;
        font-weight: bold;
        color: #333;
    }

    .product-quantity {
        font-size: 12px;
        color: #777;
    }

    .product-price {
        font-weight: bold;
        color: #333;
    }

    .order-total {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 5px;
        margin-bottom: 10px;
        align-items: flex-end;
    }

    .order-total span {
        font-size: 14px;
        color: #333;
    }

    .order-total .total-price {
        font-weight: bold;
        font-size: 20px;
        color: #000;
    }


    .order-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .btn-white {
        border-radius: 8px !important;
        border: 2px solid #00224D !important;
        color: #00224D !important;
    }

    .btn-red {
        border-radius: 8px !important;
        background-color: #C53327 !important;
        color: white !important;
    }
    </style>
    <script>
    // Lấy tất cả các liên kết nav-link
    const navLinks = document.querySelectorAll(".nav-link");
    const tabContents = document.querySelectorAll(".tab-content");

    navLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

            // Xóa class "active" khỏi tất cả các liên kết và nội dung
            navLinks.forEach((nav) => nav.classList.remove("active"));
            tabContents.forEach((tab) => tab.classList.remove("active"));

            // Thêm class "active" vào liên kết và nội dung được chọn
            link.classList.add("active");
            const targetId = link.getAttribute("href").substring(1);
            document.getElementById(targetId).classList.add("active");
        });
    });
    </script>
</head>

<body>
    <nav class="breadcrumb-nav">
        <a href="Home_DaDangNhap.blade.php" class="breadcrumb-link">Trang chủ</a>
        <span class="breadcrumb-separator"> > </span>
        <span class="breadcrumb-current">Đơn hàng</span>
    </nav>
    <main>
        <div class="container">
            <div class="form-container">
                <div class="form-header">
                    <div class="form-title">Đơn hàng</div>
                </div>
                <div class="order-container">
                    <!-- Navigation Tabs -->
                    <nav class="nav">
                        <a class="nav-link active" aria-current="page" href="#all">Tất cả</a>
                        <a class="nav-link" href="#confirmed">Đã xác nhận</a>
                        <a class="nav-link" href="#shipping">Đang giao</a>
                        <a class="nav-link" href="#completed">Hoàn thành</a>
                        <a class="nav-link" href="#cancelled">Đã hủy</a>
                        <a class="nav-link" href="#returned">Trả hàng</a>
                    </nav>


                    <!-- Order Section -->
                    <div class="order-section">
                        <div class="order-item">
                            <div class="order-info">
                                <div class="order-date">14/10/2024</div>
                                <div class="order-status success">HOÀN THÀNH</div>
                            </div>

                            <div class="order-details">
                                <!-- Product 1 -->
                                <div class="product">
                                    <img src="../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg"
                                        alt="Product 1" class="product-image">
                                    <div class="product-info">
                                        <div class="product-name">Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark</div>
                                        <div class="product-quantity">x 1</div>
                                    </div>
                                    <div class="product-price">84.240 đ</div>
                                </div>

                                <!-- Product 2 -->
                                <div class="product">
                                    <img src="../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg"
                                        alt="Product 2" class="product-image">
                                    <div class="product-info">
                                        <div class="product-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
                                        <div class="product-quantity">x 1</div>
                                    </div>
                                    <div class="product-price">84.240 đ</div>
                                </div>
                            </div>

                            <div class="order-total">
                                <span>Thành tiền:</span>
                                <span class="total-price">168.480 đ</span>
                            </div>

                            <div class="order-actions">
                                <button class="btn btn-red">Đánh giá</button>
                                <button class="btn btn-white">Yêu cầu Trả hàng/Hoàn tiền</button>
                                <button class="btn btn-white">Xem chi tiết đơn hàng</button>
                            </div>
                        </div>

                        <!-- Order 2 -->
                        <div class="order-item">
                            <div class="order-info">
                                <div class="order-date">14/10/2024</div>
                                <div class="order-status cancelled">ĐÃ HỦY</div>
                            </div>

                            <div class="order-details">
                                <!-- Product 1 -->
                                <div class="product">
                                    <img src="../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg"
                                        alt="Product 1" class="product-image">
                                    <div class="product-info">
                                        <div class="product-name">Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark</div>
                                        <div class="product-quantity">x 1</div>
                                    </div>
                                    <div class="product-price">84.240 đ</div>
                                </div>

                                <!-- Product 2 -->
                                <div class="product">
                                    <img src="../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg"
                                        alt="Product 2" class="product-image">
                                    <div class="product-info">
                                        <div class="product-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
                                        <div class="product-quantity">x 1</div>
                                    </div>
                                    <div class="product-price">84.240 đ</div>
                                </div>
                            </div>

                            <div class="order-total">
                                <span>Thành tiền:</span>
                                <span class="total-price">168.480 đ</span>
                            </div>

                            <div class="order-actions">
                                <button class="btn btn-red">Mua lại</button>
                                <button class="btn btn-white">Xem chi tiết đơn hàng</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <?php
    // Include the Footer.php file
    include 'layout/partials/Footer.blade.php';
    ?>

</body>

</html>