<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('uploads/logo/Favicon.png') }}" type="image/x-icon">
    <title>@yield('title', 'Đăng nhập')</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
    <!-- link google material -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <!-- link font awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <!-- link sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('assets/css/account/login.css') }}" rel="stylesheet">
</head>

<body>

    <div class="content p-4">
        <form id="loginForm" method="POST" action="{{ route('account.login') }}">
            @csrf
            <div class="title fw-bold text-center mb-4">
                <h2>ĐĂNG NHẬP</h2>
            </div>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Tên tài khoản</label>
                <i class="text-danger">(*)</i>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập vào tên tài khoản..."
                    required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <i class="text-danger">(*)</i>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Nhập vào mật khẩu..." required />
            </div>
            <div class="d-flex justify-content-start text-danger">
                <a href="{{ route('account.forgot-password') }}" class="forgot">Bạn quên mật khẩu?</a>
            </div>
            <div class="group_btn d-flex justify-content-center mt-4 p-2">
                <button type="reset" class="btn btn_cancel me-3" id="btnCancel">
                    Hủy
                </button>
                <button type="submit" class="btn btn_login" id="btnLogin">
                    Đăng nhập
                </button>
            </div>
        </form>
    </div>
    <script>
    const forgotPasswordUrl = "{{ route('account.forgot-password') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Chèn các script riêng cho từng view -->
    <script src="{{ asset('assets/js/account/login.js') }}"></script>
</body>