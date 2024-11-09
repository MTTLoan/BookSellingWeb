document.addEventListener("DOMContentLoaded", function () {
  // Lắng nghe sự kiện nhấn nút
  document.getElementById("btnLogin").addEventListener("click", function () {
    window.location.href = "TrangChu.html";
  });
});
document.addEventListener("DOMContentLoaded", function () {
  // Lắng nghe sự kiện nhấn nút
  document.getElementById("btnCancel").addEventListener("click", function () {
    window.history.back(); // Quay trở lại trang trước đó
  });
});
