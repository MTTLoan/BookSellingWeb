document.addEventListener("DOMContentLoaded", function () {
    // Kiểm tra nếu có thông báo thành công
    const successAlert = document.querySelector(".alert-success");
    if (successAlert) {
        // Hiển thị thông báo trong 3 giây trước khi chuyển hướng
        setTimeout(function () {
            window.location.href = "/account/login";
        }, 3000);
    }
});
