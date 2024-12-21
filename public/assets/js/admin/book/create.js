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
                text: 'Đã có lỗi xảy ra, vui lòng thử lại.'.concat(' ', error),
            });
        });
    });
});
