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

    .body-container {
        display: flex;
        justify-content: center;
        gap: 10px;
        /* Giảm khoảng cách giữa hai form */
        margin: 20px 50px;
        /* Giảm margin chung cho body-container */
    }

    .form-container {
        flex: 2;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 10px;
        /* Giảm margin của mỗi form */
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
        width: 50%;
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

    .cart-container {
        width: 500px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .cart-item-label {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 2px solid #ccc;
        font-weight: bold;
    }

    .cart-item-name {
        flex: 2;
    }

    .cart-item-quantity {
        flex: 1;
        text-align: center;
    }

    .cart-item-price {
        flex: 1;
        text-align: right;
    }

    .cart-item-total-price {
        font-weight: bold;
        color: black;
    }

    .total {
        font-size: 18px;
        font-weight: bold;
        text-align: right;
        margin-top: 20px;
    }


    .discount-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .discount-code {
        width: 80%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .apply-discount {
        background-color: #C53327;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .apply-discount:hover {
        background-color: #a02a21;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        /* Căn đều 2 nút */
        margin-top: 20px;
    }

    .btn-finish {
        background-color: #C53327 !important;
        color: white !important;
    }

    .btn-finish:hover {
        background-color: #a02a21 !important;
    }
    </style>
    <script>
    function gotoCart() {
        // Chuyển hướng đến trang xử lý đăng xuất
        window.location.href = 'GioHang.blade.php'; // Cập nhật đường dẫn phù hợp
    }
    </script>
</head>

<body>
    <nav class="breadcrumb-nav">
        <a href="Home_DaDangNhap.blade.php" class="breadcrumb-link">Trang chủ</a>
        <span class="breadcrumb-separator"> > </span>
        <a href="GioHang.blade.php" class="breadcrumb-link">Giỏ hàng</a>
        <span class="breadcrumb-separator"> > </span>
        <span class="breadcrumb-current">Thông tin giao hàng</span>
    </nav>
    <main>
        <div class="body-container">
            <div class="form-container">
                <form>
                    <div class="form-header">
                        <div class="form-title">Thông tin giao hàng</div>
                    </div>
                    <form id="personal-info-form">
                        <div class="form-group">
                            <label for="name">Họ và tên (*)</label>
                            <input type="text" class="form-control" id="name" placeholder="Nguyễn Văn Nam">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại (*)</label>
                            <input type="tel" class="form-control" id="phone" placeholder="0123456789">
                        </div>
                        <div class="form-group">
                            <label for="city">Tỉnh, thành</label>
                            <select id="city" class="form-select">
                                <option>Chọn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district">Quận, huyện</label>
                            <select id="district" class="form-select">
                                <option>Chọn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ward">Phường, xã</label>
                            <select id="ward" class="form-select">
                                <option>Chọn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" placeholder="abc xyz">
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <textarea class="form-control" id="note" rows="4"
                                placeholder="Mô tả cụ thể tại đây"></textarea>
                        </div>
                    </form>
                    <div class="form-header">
                        <div class="form-title">Phương thức thanh toán</div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Thanh toán bằng tiền mặt khi nhận hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Thanh toán bằng hình thức chuyển khoản
                        </label>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-back" id="goToCart" onclick="gotoCart()">
                            <i class="bi bi-caret-left-fill"></i> Về giỏ hàng
                        </button>
                        <button type="button" class="btn btn-finish" id="completeOrder">Hoàn tất đơn hàng</button>
                    </div>
                </form>

            </div>
            <div class="form-container">
                <div class="discount-container">
                    <input type="text" class="discount-code" placeholder="Mã giảm giá">
                    <button class="apply-discount">Sử dụng</button>
                </div>
                <div class="cart-item-label">
                    <div class="cart-item-name">Sản phẩm</div>
                    <div class="cart-item-quantity">Số lượng</div>
                    <div class="cart-item-price">
                        <span class="cart-item-total-price">Giá tiền</span>
                    </div>
                </div>

                <div class="cart-item">
                    <div class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
                    <div class="cart-item-quantity">1</div>
                    <div class="cart-item-price">
                        <span class="cart-item-total-price">42.000 đ</span>
                    </div>
                </div>

                <div class="cart-item">
                    <div class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
                    <div class="cart-item-quantity">1</div>
                    <div class="cart-item-price">
                        <span class="cart-item-total-price">42.000 đ</span>
                    </div>
                </div>

                <div class="cart-item">
                    <div class="cart-item-name">Tạm tính</div>
                    <div class="cart-item-price">
                        <span class="cart-item-total-price">84.000 đ</span>
                    </div>
                </div>

                <div class="cart-item">
                    <div class="cart-item-name">Mã giảm giá</div>
                    <div class="cart-item-price">
                        <span class="cart-item-total-price">10.000 đ</span>
                    </div>
                </div>

                <div class="cart-item">
                    <div class="cart-item-name">Phí vận chuyển</div>
                    <div class="cart-item-price">
                        <span class="cart-item-total-price">15.000 đ</span>
                    </div>
                </div>


                <div class="total">
                    <strong>TỔNG CỘNG: </strong> 89.000 đ
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