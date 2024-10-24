function resetForm() {
    // Reset tất cả các trường trong form
    document.getElementById('registrationForm').reset();
}

document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của form

    // Chuyển hướng đến trang NhapOTP.html
    window.location.href = 'NhapOTP.html'; // Đảm bảo đường dẫn đến file đúng
});