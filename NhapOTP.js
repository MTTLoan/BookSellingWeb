function resetForm() {
    // Reset tất cả các trường trong form
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
