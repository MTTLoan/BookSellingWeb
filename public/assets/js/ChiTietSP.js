btnDescription.classList.add("active");
// Đảm bảo mã chỉ chạy sau khi DOM đã tải
document.addEventListener("DOMContentLoaded", function () {
    // Lấy các phần tử nút và container nội dung
    const btnDescription = document.getElementById("btnDescription");
    const btnFeedback = document.getElementById("btnFeedback");
    const contentContainer = document.getElementById("content");

    // Lưu HTML gốc (mô tả sản phẩm)
    const originalHTML = contentContainer.innerHTML;

    // HTML thay thế (đánh giá sản phẩm)
   

    // Thêm sự kiện click cho nút "Mô tả sản phẩm"
    btnDescription.addEventListener("click", function () {
        contentContainer.innerHTML = originalHTML; // Trả lại HTML gốc
        btnDescription.classList.add("active");
        btnFeedback.classList.remove("active");
    });

    // Thêm sự kiện click cho nút "Đánh giá"
    btnFeedback.addEventListener("click", function () {
        contentContainer.innerHTML = feedbackHTML;
        btnFeedback.classList.add("active");
        btnDescription.classList.remove("active");
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

function updateMainImage(thumbnail) {
    const mainImage = document.getElementById("mainImage");
    mainImage.src = thumbnail.src;
}

document.addEventListener("DOMContentLoaded", function () {
    // Lấy tất cả các span có class "label_revenue"
    const spans = document.querySelectorAll(".label_edition");

    // Thêm sự kiện click cho từng span
    spans.forEach((span) => {
        span.addEventListener("click", function () {
            // Toggle class "active" để giữ hiệu ứng
            span.classList.toggle("active");
        });
    });
});
