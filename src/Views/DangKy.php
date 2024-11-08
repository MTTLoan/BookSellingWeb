<?php
// Include the Header.php file
include './layouts/Header_ChuaDangNhap.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
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

    .form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
        font-size: 24px;
    }

    .form-group label {
        font-weight: bold;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        /* Đặt các nút ở giữa */
        gap: 10px;
        /* Khoảng cách giữa các nút */
    }

    .btn {
        flex: 0 0 30%;
        /* Đặt chiều rộng của nút bằng nhau */
    }

    .btn-register {
        background-color: #C53327 !important;
        /* Bootstrap's primary color */
        color: white !important;
    }

    .btn-cancel {
        background-color: white !important;
        /* Bootstrap's primary color */
        color: #C53327 !important;
        border-color: #C53327 !important;
    }
    </style>

</head>

<body>
    <main>
        <div class="form-container">
            <div class="form-title">ĐĂNG KÝ</div>
            <form id="registrationForm">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên tài khoản (*)</label>
                    <input type="text" class="form-control" id="username" placeholder="Mô tả cụ thể tại đây">
                </div>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Họ và tên (*)</label>
                    <input type="text" class="form-control" id="fullname" placeholder="Mô tả cụ thể tại đây">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email (*)</label>
                    <input type="email" class="form-control" id="email" placeholder="Mô tả cụ thể tại đây">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại (*)</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Mô tả cụ thể tại đây">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu (*)</label>
                    <input type="password" class="form-control" id="password" placeholder="Mô tả cụ thể tại đây">
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Nhập lại mật khẩu (*)</label>
                    <input type="password" class="form-control" id="confirm-password"
                        placeholder="Mô tả cụ thể tại đây">
                </div>
                <div class="btn-container">
                    <button type="reset" class="btn btn-cancel">Hủy</button>
                    <button type="submit" class="btn btn-register">Đăng ký</button>
                </div>
            </form>
        </div>
    </main>

    <?php
    // Include the Footer.php file
    include './layouts/Footer.php';
    ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện submit cho form
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của form

            // Chuyển hướng đến trang NhapOTP.php
            window.location.href = 'NhapOTP.php'; // Đảm bảo đường dẫn đến file đúng
        });

    });
    </script>
</body>

</html>