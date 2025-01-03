document.addEventListener("DOMContentLoaded", function () {
    // Lắng nghe sự kiện nhấn nút Hủy
    document.getElementById("btnCancel").addEventListener("click", function () {
        window.history.back();
    });
});

