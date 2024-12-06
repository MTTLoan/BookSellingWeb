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
    <link href="{{ asset('assets/css/layout/partials/Footer.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <!-- Column 1: Logo -->
            <div class="row">
                <div class="col-md-3 footer-column" id="col1">
                    <img src="{{ asset('uploads/logo/Logo.png') }}" alt="Logo" class="footer-logo">
                    <img src="{{ asset('uploads/images/bct 1.png') }}" alt="Xác nhận" class="footer-check">
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

    <script src="{{ asset('assets/js/layout/partials/Footer.js') }}"></script>
</body>

</html>