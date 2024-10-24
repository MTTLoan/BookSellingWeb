document.addEventListener('DOMContentLoaded', function() {
    // Lấy các nút theo ID
    const registerButton = document.getElementById('registerButton');
    const loginButton = document.getElementById('loginButton');
    const cartButton = document.getElementById('cartButton');

    // Kiểm tra và gán sự kiện click cho nút ĐĂNG KÝ
    if (registerButton) {
        registerButton.addEventListener('click', function() {
            // Chuyển hướng đến trang Đăng ký
            window.location.href = '../DangKy.html';
        });
    }

    // Kiểm tra và gán sự kiện click cho nút ĐĂNG NHẬP
    if (loginButton) {
        loginButton.addEventListener('click', function() {
            // Chuyển hướng đến trang Đăng nhập
            window.location.href = '../DangNhap.html';
        });
    }

    // Kiểm tra và gán sự kiện click cho nút giỏ hàng
    if (cartButton) {
        cartButton.addEventListener('click', function() {
            // Chuyển hướng đến trang Giỏ hàng
            window.location.href = '../GioHang.html';
        });
    }
});