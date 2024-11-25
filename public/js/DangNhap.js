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
// Click vào "Quên mật khẩu"
document.getElementById("forgot").onclick = function() {
  window.location.href = "/resources/views/QuenMatKhau_NhapEmail.html";
};