const dropdown = document.querySelector('.filter-dropdown');

document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả dropdown với class filter-dropdown
    const dropdowns = document.querySelectorAll('.filter-dropdown');

    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('change', function () {
            // Kiểm tra nếu giá trị không phải mặc định
            if (this.value !== "default") {
                this.classList.add('selected'); // Thêm class 'selected'
            } else {
                this.classList.remove('selected'); // Loại bỏ class 'selected' nếu quay lại giá trị mặc định
            }
        });
    });
});

