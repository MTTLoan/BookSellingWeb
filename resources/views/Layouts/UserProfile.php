<?php
// Include the Header.php file
include './../Components/Header_DaDangNhap.php';
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
        max-width: 1000px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

    .form-subtitle {
        color: #666;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .form-subtitle::after {
        content: "";
        display: block;
        height: 2px;
        background-color: #989696;
        width: 100%;
        margin-top: 20px;
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

    .btn-container {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 150px;
    }

    .btn-register {
        background-color: #C53327 !important;
        color: white !important;
    }

    .btn-register:hover {
        background-color: #a02a21 !important;
    }

    .btn-cancel {
        background-color: white !important;
        color: #C53327 !important;
        border: 1px solid #C53327 !important;
    }

    .btn-cancel:hover {
        background-color: #f9e6e4 !important;
        color: #a02a21 !important;
    }

    input[type="date"]::-webkit-inner-spin-button,
    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(0.5);
        cursor: pointer;
    }
    </style>
    <script>
    // Inline JavaScript
    function resetForm() {
        const form = document.getElementById('personal-info-form');
        form.reset();
    }

    function submitForm(event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = {
            name: document.getElementById('name').value,
            dob: document.getElementById('dob').value,
            gender: document.getElementById('gender').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            city: document.getElementById('city').value,
            district: document.getElementById('district').value,
            ward: document.getElementById('ward').value,
            address: document.getElementById('address').value,
        };

        console.log('Form Data Submitted:', formData);
    }
    </script>
</head>

<body>
    <main>
        <div class="container">
            <div class="form-container">
                <div class="form-header">
                    <div class="form-title">THÔNG TIN CÁ NHÂN</div>
                    <p class="form-subtitle">Cập nhật thông tin của bạn</p>
                </div>

                <form id="personal-info-form">
                    <div class="form-group mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Họ và tên (*)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" placeholder="Mô tả cụ thể tại đây">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="dob" class="col-sm-3 col-form-label">Ngày sinh</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="dob">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="gender" class="col-sm-3 col-form-label">Giới tính</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="gender" placeholder="Mô tả cụ thể tại đây">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email (*)</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" placeholder="Mô tả cụ thể tại đây">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="phone" class="col-sm-3 col-form-label">Số điện thoại (*)</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="phone" placeholder="Mô tả cụ thể tại đây">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="city" class="col-sm-3 col-form-label">Tỉnh, thành</label>
                        <div class="col-sm-9">
                            <select id="city" class="form-select">
                                <option>Chọn</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="district" class="col-sm-3 col-form-label">Quận, huyện</label>
                        <div class="col-sm-9">
                            <select id="district" class="form-select">
                                <option>Chọn</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="ward" class="col-sm-3 col-form-label">Phường, xã</label>
                        <div class="col-sm-9">
                            <select id="ward" class="form-select">
                                <option>Chọn</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" placeholder="Mô tả cụ thể tại đây">
                        </div>
                    </div>
                    <div class="btn-container">
                        <button type="button" class="btn btn-cancel" onclick="resetForm()">Hủy</button>
                        <button type="submit" class="btn btn-register" onclick="submitForm(event)">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php
    // Include the Footer.php file
    include './../Components/Footer.php';
    ?>

</body>

</html>