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
    <title>Footer UI</title>
    <style>
    /* Styles for the footer */
    #col1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .footer {
        padding: 40px 0;
        background-color: white;
        border-top: 1px solid white;
    }

    .footer .footer-column {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }

    .footer .footer-title {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .footer .footer-border {
        border-top: 1px solid #d3d3d3;
        margin-top: 20px;
        padding-top: 20px;
    }

    .footer-column p {
        word-wrap: break-word;
        word-break: break-word;
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .footer-button {
        background: none;
        border: none;
        color: black;
        text-align: left;
        padding: 0;
        font-size: 14px;
        cursor: pointer;
    }

    .footer-button:hover {
        color: #007bff;
    }

    .company-name {
        color: #F2584C;
        font-size: 40px;
        font-family: 'Old English Text MT', serif;
        font-weight: 400;
        word-wrap: break-word;
        display: inline-block;
        margin-left: 10px;
    }

    .footer-logo {
        max-width: 50%;
    }

    .footer-check {
        max-width: 60%;
    }

    @media (max-width: 576px) {
        .footer-logo {
            max-width: 30%;
        }

        .footer-check {
            max-width: 30%;
        }
    }
    </style>
</head>

<body>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <!-- Column 1: Logo -->
            <div class="row">
                <div class="col-md-3 footer-column" id="col1">
                    <img src="../../../public/assets/images/Logo.png" alt="Logo" class="footer-logo">
                    <img src="../../../public/assets/images/bct 1.png" alt="Xác nhận" class="footer-check">
                </div>

                <!-- Column 2: Chính sách -->
                <div class="col-md-3 footer-column">
                    <div class="footer-title">Chính sách</div>
                    <ul class="list-unstyled">
                        <li><button class="footer-button" onclick="navigateToPage('chinh_sach_quy_dinh')">Chính sách và
                                quy định</button></li>
                        <li><button class="footer-button" onclick="navigateToPage('quy_che_hoat_dong')">Quy chế hoạt
                                động</button></li>
                        <li><button class="footer-button" onclick="navigateToPage('bao_mat_thong_tin')">Bảo mật thông
                                tin</button></li>
                        <li><button class="footer-button" onclick="navigateToPage('giai_quyet_tranh_chap')">Giải quyết
                                tranh chấp</button></li>
                    </ul>
                </div>

                <!-- Column 3: Tìm hiểu thêm -->
                <div class="col-md-3 footer-column">
                    <div class="footer-title">Tìm hiểu thêm</div>
                    <ul class="list-unstyled">
                        <li><button class="footer-button" onclick="navigateToPage('huong_dan_chung')">Hướng dẫn
                                chung</button></li>
                        <li><button class="footer-button" onclick="navigateToPage('dat_hang')">Hướng dẫn đặt
                                hàng</button></li>
                        <li><button class="footer-button" onclick="navigateToPage('thanh_toan')">Hướng dẫn thanh
                                toán</button></li>
                        <li><button class="footer-button" onclick="navigateToPage('hoi_va_tra_loi')">Hỏi và trả
                                lời</button></li>
                    </ul>
                </div>

                <!-- Column 4: Về Chapter One -->
                <div class="col-md-3 footer-column">
                    <div style="height: 33px;"></div>
                    <ul class="list-unstyled">
                        <li><button class="footer-button" onclick="navigateToPage('ve_chapter_one')">Về Chapter
                                One</button></li>
                        <li><button class="footer-button" onclick="navigateToPage('blog')">Chapter One Blog</button>
                        </li>
                        <li><button class="footer-button" onclick="navigateToPage('tuyen_dung')">Tuyển dụng</button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Common Row for Address and Bank Details -->
            <div class="row footer-border">
                <div class="col-md-3">
                    <p>Địa chỉ: Toà nhà Pearl Plaza, Số 561A Điện Biên Phủ, Phường 25, Quận Bình Thạnh, Thành phố Hồ Chí
                        Minh, Việt Nam.</p>
                </div>
                <div class="col-md-3">
                    <p>Tên TK: CT CP CHAPTER ONE</p>
                </div>
                <div class="col-md-3">
                    <p>STK: 102-989-1989</p>
                </div>
                <div class="col-md-3">
                    <p>Ngân hàng Vietcombank - CN Tân Định</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
    function navigateToPage(page) {
        window.location.href = page + ".blade.php";
    }
    </script>
</body>

</html>
