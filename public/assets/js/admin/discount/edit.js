
document.getElementById("btnDelete").addEventListener("click", function () {
  const modal = new bootstrap.Modal(document.getElementById("modal_Delete"));
  modal.show();
});

document.addEventListener("DOMContentLoaded", function () {
  // Lắng nghe sự kiện nhấn nút Hủy
  document.getElementById("btnCancel").addEventListener("click", function () {
      window.history.back();
  });
});