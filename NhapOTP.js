document.addEventListener('DOMContentLoaded', function() {
    // Hàm để reset tất cả các trường trong form
    function resetForm() {
        document.getElementById('codeForm').reset();
    }

    // Hiển thị popup khi nút "Hoàn tất" được nhấn
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
        window.location.href = '../DangNhap.html'; // Đảm bảo đường dẫn chính xác
    };
});