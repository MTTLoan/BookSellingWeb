document.addEventListener("DOMContentLoaded", function() {
    // Chọn tất cả các liên kết có class 'card-group-link-1', 'card-group-link-2', ..., 'card-group-link-6' và 'card-group-link-blog'
    const viewMoreLinks = document.querySelectorAll(
        '.card-group-link-1, .card-group-link-2, .card-group-link-3, .card-group-link-4, .card-group-link-5, .card-group-link-6, .card-group-link-blog'
    );

    // Lặp qua tất cả các liên kết và gắn sự kiện click cho mỗi liên kết
    viewMoreLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Ngừng hành vi mặc định của liên kết

            // Lấy phần tử tiêu đề chứa class 'card-group-title-main'
            const titleElement = this.closest('.card-group-title').querySelector(
                '.card-group-title-main');

            if (titleElement) {
                // Lấy giá trị category từ thuộc tính dataset
                const category = titleElement.dataset.category;
                console.log("Category: ", category);

                // Gọi hàm chuyển hướng đến trang tương ứng
                navigateToPage(category);
            } else {
                console.error("Không tìm thấy phần tử 'card-group-title-main'.");
            }
        });
    });
});

// Hàm chuyển hướng đến trang danh mục
function navigateToPage(category) {
    if (category) {
        const targetUrl = `${category}_DanhMuc.blade.php`; // Tạo URL động
        window.location.href = targetUrl; // Chuyển hướng đến trang category_DanhMuc.blade.php
    } else {
        console.error("Category không hợp lệ.");
    }
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

document.querySelectorAll('.button-section .btn').forEach(button => {
    button.addEventListener('click', function() {
        const targetPage = this.getAttribute('data-target');
        window.location.href = targetPage + ".blade.php";
    });
});

document.querySelectorAll('#btnCart').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();

        // Lấy book_title_id từ thuộc tính data-book-id
        const bookTitleId = this.closest('.product').getAttribute('data-book-id');

        fetch('/add-to-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ book_title_id: bookTitleId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi thêm vào giỏ hàng. Vui lòng thử lại.');
            });
    });
});
