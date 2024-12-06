// nhấn button Thêm sản phẩm, sẽ hiện ra form thêm sản phẩm
document.addEventListener("DOMContentLoaded", function () {
    // Lắng nghe sự kiện nhấn nút
    document.getElementById("btnAdd").addEventListener("click", function () {
      window.location.href = "ThemKH.html";
    });
    document.getElementById("btnPreview").addEventListener("click", function () {
      window.location.href = "XemKH.html";
    });
    document.getElementById("btnEdit").addEventListener("click", function () {
      window.location.href = "SuaKH.html";
    });
  });
  document.getElementById("btnDelete").addEventListener("click", function () {
    const modal = new bootstrap.Modal(document.getElementById("modal_Delete"));
    modal.show();
  });
  