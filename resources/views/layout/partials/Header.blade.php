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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>@yield('title', 'Header UI')</title>
    <link href="{{ asset('assets/css/layout/partials/Header.css') }}" rel="stylesheet">
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-md navbar-white bg-white">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <button class="btn navbar-toggler me-2 d-md-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>

                <div class="offcanvas offcanvas-start d-md-none" data-bs-scroll="true" data-bs-backdrop="false"
                    tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h4 class="offcanvas-title" id="offcanvasScrollingLabel">MENU</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="list-unstyled components ">
                            <li>
                                <a href="#">TRANG CHỦ</a>
                            </li>
                            <li>
                                <a href="#">ĐƠN HÀNG</a>
                            </li>
                            <li>
                                <a href="#">VOUCHER</a>
                            </li>
                            <li>
                                <a href="#">REVIEW</a>
                            </li>
                            <li>
                                <a href="#">BLOG</a>
                            </li>
                            @if(auth('cus')->check())
                            <li>
                                <a href="{{ route('account.profile') }}">TÀI KHOẢN</a>
                            </li>
                            <li>
                                <a href="{{ route('account.logout') }}">ĐĂNG XUẤT</a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('account.register') }}">ĐĂNG KÝ</a>
                            </li>
                            <li>
                                <a href="{{ route('account.login') }}">ĐĂNG NHẬP</a>
                            </li>
                            @endif
                            <li>
                                <a href="#">GIỎ HÀNG</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('uploads/logo/Favicon.png') }}" alt="" width="40" height="40">
                    <span class="company-name">Chapter One</span>
                </a>
                <form class="d-flex mx-auto flex-grow-1 mx-2 justify-content-center">
                    <input class="form-control search-input" type="search" placeholder="Tìm kiếm sản phẩm..."
                        aria-label="Search">
                    <button class="btn search-btn" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <div class="d-none d-md-flex" id="navbarMenu">
                    <ul class="navbar-nav">
                        @if(auth('cus')->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person-fill user-icon"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('account.profile') }}">Tài khoản</a></li>
                                <li><a class="dropdown-item" href="{{ route('account.change-password') }}">Đổi mật
                                        khẩu</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('account.logout') }}">Đăng xuất</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('account.register') }}" class="nav-link register-link">ĐĂNG KÝ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.login') }}" class=" nav-link login-link">ĐĂNG NHẬP</a>
                        </li>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="#" class="nav-link cart-icon" id="cartButton">
                                <i class="bi bi-bag-heart-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>



</html>