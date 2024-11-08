document.addEventListener("DOMContentLoaded", function () {
  // Lắng nghe sự kiện nhấn nút
  document.getElementById("btnAdd").addEventListener("click", function () {
    window.location.href = "ThemKM.html";
  });
  document.getElementById("btnPreview").addEventListener("click", function () {
    window.location.href = "XemKM.html";
  });
  document.getElementById("btnEdit").addEventListener("click", function () {
    window.location.href = "SuaKM.html";
  });
});
document.getElementById("btnDelete").addEventListener("click", function () {
  const modal = new bootstrap.Modal(document.getElementById("modal_Delete"));
  modal.show();
});
