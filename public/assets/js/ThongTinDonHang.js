// Lấy tất cả các liên kết nav-link
const navLinks = document.querySelectorAll(".nav-link");
const tabContents = document.querySelectorAll(".tab-content");

navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
        e.preventDefault();

        // Xóa class "active" khỏi tất cả các liên kết và nội dung
        navLinks.forEach((nav) => nav.classList.remove("active"));
        tabContents.forEach((tab) => tab.classList.remove("active"));

        // Thêm class "active" vào liên kết và nội dung được chọn
        link.classList.add("active");
        const targetId = link.getAttribute("href").substring(1);
        document.getElementById(targetId).classList.add("active");
    });
});

document.getElementById("btnDetails").addEventListener("click", function () {
    const modal = new bootstrap.Modal(document.getElementById("modal_DetailOrder"));
    modal.show();
});