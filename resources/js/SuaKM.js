document.addEventListener("DOMContentLoaded", function () {
  // Lắng nghe sự kiện nhấn nút
  document.getElementById("btnCancel").addEventListener("click", function () {
    window.history.back(); // Quay trở lại trang trước đó
  });
});

// Kiểm tra trường có trống hay không
document.getElementById("btnSave").addEventListener("click", function (e) {
  // Lấy giá trị các trường input
  const inputFields = document.querySelectorAll(".form-control, .form-select");
  let allFilled = true;

  // Kiểm tra từng trường input
  inputFields.forEach(function (input) {
    if (input.value.trim() === "") {
      allFilled = false; // Nếu có trường trống, đặt allFilled thành false
      input.classList.add("is-invalid"); // Thêm lớp CSS cho trường không hợp lệ
    } else {
      input.classList.remove("is-invalid"); // Xóa lớp CSS nếu trường hợp lệ
    }
  });

  // Nếu tất cả các trường đều được điền, mở modal
  if (allFilled) {
    // Mở modal nếu biểu mẫu hợp lệ
    const modal = new bootstrap.Modal(
      document.getElementById("modal_Complete")
    );
    modal.show();
  } else {
    console.log("Vui lòng điền đầy đủ các trường bắt buộc.");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  // Lắng nghe sự kiện nhấn nút
  document.getElementById("btnClose").addEventListener("click", function () {
    window.location.href = "QLKhuyenMai.html";
  });
});

// Xử lý bộ select chi nhánh
function toggleBranchSelect() {
  const channelSelect = document.getElementById("chanel_type");
  const branchSelect = document.getElementById("branch_name");
  
  // Kiểm tra "Cửa hàng" có được chọn hay không
  const isStoreSelected = Array.from(channelSelect.selectedOptions).some(
    option => option.text.includes("Cửa hàng")
  );

  if (isStoreSelected) {
    branchSelect.disabled = false; // Mở bộ select chi nhánh nếu "Cửa hàng" được chọn
  } else {
    branchSelect.disabled = true; // Khóa bộ select chi nhánh nếu "Cửa hàng" không được chọn
    branchSelect.selectedIndex = 0; // Đặt lại giá trị của bộ select chi nhánh
  }
}

