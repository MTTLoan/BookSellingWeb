document.addEventListener("DOMContentLoaded", function () {
    // Thêm sự kiện click cho các nút phiên bản
    document.querySelectorAll(".version-btn").forEach((button) => {
        button.addEventListener("click", function () {
            // Loại bỏ lớp 'active' khỏi tất cả các nút phiên bản
            document
                .querySelectorAll(".version-btn")
                .forEach((btn) => btn.classList.remove("active"));
            // Thêm lớp 'active' vào nút đã chọn
            this.classList.add("active");

            const price = this.getAttribute("data-price");
            const pageNumber = this.getAttribute("data-page-number");
            document.getElementById("priceDisplay").innerText =
                new Intl.NumberFormat().format(price) + " đ";
        });
    });

    // Thêm sự kiện click cho nút "Thêm vào giỏ hàng"
    document
        .getElementById("btnAddCart")
        .addEventListener("click", function () {
            const activeButton = document.querySelector(".version-btn.active");
            if (!activeButton) {
                Swal.fire({
                    icon: "warning",
                    title: "Chưa chọn phiên bản",
                    text: "Vui lòng chọn phiên bản sách.",
                });
                return;
            }
            const bookId = activeButton.getAttribute("data-book-id");
            const quantity = document.getElementById("quantity").value;

            if (quantity < 1) {
                Swal.fire({
                    icon: "warning",
                    title: "Số lượng không hợp lệ",
                    text: "Số lượng sách phải lớn hơn 0.",
                });
                return;
            }
            // Kiểm tra xem người dùng đã đăng nhập chưa
            fetch("/check-login-status", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.logged_in) {
                        // Gọi API để thêm vào giỏ hàng
                        fetch("/cart", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                            },
                            body: JSON.stringify({
                                book_id: bookId,
                                quantity: quantity,
                            }),
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.success) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Thành công",
                                        text: "Thêm vào giỏ hàng thành công!",
                                    });
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Lỗi",
                                        text: "Có lỗi xảy ra, vui lòng thử lại.",
                                    });
                                }
                            });
                    } else {
                        Swal.fire({
                            icon: "warning",
                            title: "Chưa đăng nhập",
                            text: "Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.",
                        });
                    }
                });
        });
});

function increaseQuantity() {
    const quantityInput = document.getElementById("quantity");
    let currentValue = parseInt(quantityInput.value) || 0;
    quantityInput.value = currentValue + 1;
}

function decreaseQuantity() {
    const quantityInput = document.getElementById("quantity");
    let currentValue = parseInt(quantityInput.value) || 0;
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
}

function updateMainImage(element) {
    const mainImage = document.getElementById("mainImage");
    mainImage.src = element.src;
}
