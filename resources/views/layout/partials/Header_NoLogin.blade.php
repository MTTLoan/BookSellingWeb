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
    <link href="{{ asset('assets/css/layout/partials/Header_NoLogin.css') }}" rel="stylesheet">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-sm navbar-white bg-white">
            <div class="container-fluid d-flex justify-content-between align-items-center" id="Logo">
                <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand" href="#">
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
                <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link register-link">ĐĂNG KÝ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link login-link">ĐĂNG NHẬP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cart-icon">
                                <i class="bi bi-bag-heart-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script src="{{ asset('assets/js/layout/partials/Header_NoLogin.js') }}"></script>
</body>

</html>