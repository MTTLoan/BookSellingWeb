// nhấn button Thêm sản phẩm, sẽ hiện ra form thêm sản phẩm
document.addEventListener("DOMContentLoaded", function () {
  // Lắng nghe sự kiện nhấn nút
  document.getElementById("btnAdd").addEventListener("click", function () {
    window.location.href = "/quan-ly-san-pham/them-san-pham";
  });
  document.getElementById("btnPreview").addEventListener("click", function () {
    window.location.href = "XemSP.html";
  });
  document.getElementById("btnEdit").addEventListener("click", function () {
    window.location.href = "SuaSP.html";
  });
});
document.getElementById("btnDelete").addEventListener("click", function () {
  const modal = new bootstrap.Modal(document.getElementById("modal_Delete"));
  modal.show();
});
