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
    window.location.href = "QLKhachHang.html";
  });
});

// Bộ select tỉnh thành, quận huyện, phường xã
const citis = document.getElementById("city");
const districts = document.getElementById("district");
const wards = document.getElementById("ward");

const Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
  method: "GET",
  responseType: "application/json",
};

const promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }

  citis.onchange = function () {
    districts.length = 1;
    wards.length = 1;
    if (this.value != "") {
      const result = data.filter((n) => n.Id === this.value);
      for (const k of result[0].Districts) {
        districts.options[districts.options.length] = new Option(k.Name, k.Id);
      }
    }
  };

  districts.onchange = function () {
    wards.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(
        (n) => n.Id === this.value
      )[0].Wards;
      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}
