document.addEventListener('DOMContentLoaded', function() {
    // Hàm để reset tất cả các trường trong form
    function resetForm() {
        document.getElementById('registrationForm').reset();
    }

    // Lắng nghe sự kiện submit cho form
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của form

        // Chuyển hướng đến trang NhapOTP.html
        window.location.href = 'NhapOTP.html'; // Đảm bảo đường dẫn đến file đúng
    });
});