document.addEventListener("DOMContentLoaded", function () {
    const currentYear = new Date().getFullYear();
    const startYear = 1800;
    const yearSelect = document.getElementById("publishing_year");

    for (let year = currentYear; year >= startYear; year--) {
        const option = document.createElement("option");
        option.value = year;
        option.textContent = year;
        yearSelect.appendChild(option); // Thêm tùy chọn vào dropdown
    }

    // Lắng nghe sự kiện nhấn nút Hủy
    document.getElementById("btnCancel").addEventListener("click", function () {
        window.history.back();
    });

    // Lắng nghe sự kiện nhấn nút Lưu
    document.getElementById("productForm").addEventListener("submit", function (e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của form

        const formData = new FormData(this);

        fetch(this.action, {
            method: this.method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: data.message,
                }).then(() => {
                    window.location.href = '/admin/book'; // Điều hướng đến trang danh sách sản phẩm
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Thất bại',
                    text: data.message,
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Thất bại',
                text: 'Đã có lỗi xảy ra, vui lòng thử lại.',
            });
        });
    });
});


// // Kiểm tra trường có trống hay không
// document.getElementById("btnSave").addEventListener("click", function (e) {
//     // Lấy giá trị các trường input
//     const inputFields = document.querySelectorAll(".form-control, .form-select");
//     let allFilled = true;

//     // Kiểm tra từng trường input
//     inputFields.forEach(function (input) {
//     if (input.value.trim() === "") {
//         allFilled = false; // Nếu có trường trống, đặt allFilled thành false
//         input.classList.add("is-invalid"); // Thêm lớp CSS cho trường không hợp lệ
//     } else {
//         input.classList.remove("is-invalid"); // Xóa lớp CSS nếu trường hợp lệ
//     }
//     });

//     // Nếu tất cả các trường đều được điền, mở modal
//     if (allFilled) {
//     // Mở modal nếu biểu mẫu hợp lệ
//     const modal = new bootstrap.Modal(
//         document.getElementById("modal_Complete")
//     );
//     modal.show();
//     } else {
//     console.log("Vui lòng điền đầy đủ các trường bắt buộc.");
//     }
// });

// document.addEventListener('DOMContentLoaded', function() {
//     // Lắng nghe sự kiện nhấn nút
//     document.getElementById('btnClose').addEventListener('click', function() {
//         window.location.href = 'QLSanPham.html';
//     });
// });
