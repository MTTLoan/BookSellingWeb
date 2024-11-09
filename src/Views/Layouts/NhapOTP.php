<?php
// Include the Header.php file
include './../Components/Header_ChuaDangNhap.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.js"></script>

    <!-- Internal CSS -->
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

    .form-control {
        width: 50px;
        margin-right: 5px;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn {
        flex: 0 0 30%;
    }

    .btn-complete {
        background-color: #C53327 !important;
        color: white !important;
    }

    .btn-cancel {
        background-color: white !important;
        color: #C53327 !important;
        border-color: #C53327 !important;
    }

    #Resend {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .timer {
        margin-right: auto;
    }

    .send-button {
        background-color: white !important;
        color: #C53327;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .modal-header {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .modal-title {
        width: 100%;
        text-align: center;
    }
    </style>
</head>

<body>
    <main>
        <div class="form-container">
            <div class="form-title">NHẬP MÃ</div>
            <form id="codeForm">
                <div class="mb-3">
                    <label for="code" class="form-label"><strong>Nhập mã</strong> (*) <i>Mã được gửi qua
                            email</i></label>
                    <div class="d-flex justify-content-center">
                        <input type="text" class="form-control" id="code1" maxlength="1">
                        <input type="text" class="form-control" id="code2" maxlength="1">
                        <input type="text" class="form-control" id="code3" maxlength="1">
                        <input type="text" class="form-control" id="code4" maxlength="1">
                        <input type="text" class="form-control" id="code5" maxlength="1">
                        <input type="text" class="form-control" id="code6" maxlength="1">
                    </div>
                </div>
                <div class="mb-3 container" id="Resend">
                    <small class="timer">Gửi lại sau 5 giây</small>
                    <button type="button" class="send-button" id="resendButton">
                        Gửi lại <i class="bi bi-arrow-clockwise"></i>
                    </button>
                </div>
                <div class="btn-container">
                    <button type="reset" class="btn btn-cancel">Hủy</button>
                    <button type="submit" class="btn btn-complete">Hoàn tất</button>
                </div>
            </form>
        </div>

        <!-- Popup -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <div class="modal-title" style="font-size: 1.5rem; text-align: center;">ĐĂNG KÝ</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Chúc mừng bạn đã đăng ký thành công!</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" onclick="redirectToLogin()">Đăng nhập</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    // Include the Footer.php file
    include './../Components/Footer.php';
    ?>

    <!-- Internal JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện submit cho form
        document.getElementById('codeForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của form

            // Hiển thị modal
            var modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            modal.show();
        });

        // Nút "Gửi lại" (tuỳ chỉnh sau 5 giây)
        document.getElementById('resendButton').addEventListener('click', function() {
            // Logic gửi lại mã sẽ ở đây (chẳng hạn, gọi API hoặc gửi lại mã qua email)
            alert('Mã đã được gửi lại!');
        });

        // Định nghĩa hàm redirectToLogin
        window.redirectToLogin = function() {
            // Chuyển hướng đến trang Đăng nhập
            window.location.href = 'DangNhap.html'; // Đảm bảo đường dẫn chính xác
        };
    });
    </script>

</body>

</html>