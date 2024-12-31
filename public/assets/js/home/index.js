document.addEventListener("DOMContentLoaded", function () {
    // Chọn tất cả các liên kết có class 'card-group-link-1', 'card-group-link-2', ..., 'card-group-link-6' và 'card-group-link-blog'
    const viewMoreLinks = document.querySelectorAll(
        ".card-group-link-1, .card-group-link-2, .card-group-link-3, .card-group-link-4, .card-group-link-5, .card-group-link-6, .card-group-link-blog"
    );

    // Lặp qua tất cả các liên kết và gắn sự kiện click cho mỗi liên kết
    viewMoreLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Ngừng hành vi mặc định của liên kết

            // Lấy phần tử tiêu đề chứa class 'card-group-title-main'
            const titleElement = this.closest(
                ".card-group-title"
            ).querySelector(".card-group-title-main");

            if (titleElement) {
                // Lấy giá trị category từ thuộc tính dataset
                const category = titleElement.dataset.category;
                console.log("Category: ", category);

                // Gọi hàm chuyển hướng đến trang tương ứng
                navigateToPage(category);
            } else {
                console.error(
                    "Không tìm thấy phần tử 'card-group-title-main'."
                );
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

document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
        });
    });
});

document.querySelectorAll(".button-section .btn").forEach((button) => {
    button.addEventListener("click", function () {
        const targetPage = this.getAttribute("data-target");
        window.location.href = targetPage + ".blade.php";
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("myChart").getContext("2d");
    let chart = null;

    function renderChart(data, labels, chartInstance, ctx) {
        if (chartInstance) {
            chartInstance.destroy();
        }
        chartInstance = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Doanh thu",
                        data: data,
                        backgroundColor: "rgba(75, 192, 192, 1)",
                        barThickness: 5,
                    },
                ],
            },
            options: {
                scales: {
                    x: {
                        type: "category",
                        labels: labels,
                    },
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
        return chartInstance;
    }

    function getDataByDay() {
        const labels = Array.from({ length: 31 }, (_, i) => `Ngày ${i + 1}`);
        const data = labels.map((label) => {
            const day = parseInt(label.split(" ")[1]);
            const salesData = salesByDay.find((item) => item.day === day);
            return salesData ? salesData.total_sales : 0;
        });
        chart = renderChart(data, labels, chart, ctx);
    }

    function getDataByWeek() {
        const labels = Array.from({ length: 53 }, (_, i) => `Tuần ${i + 1}`);
        const data = labels.map((label) => {
            const week = parseInt(label.split(" ")[1]);
            const salesData = salesByWeek.find((item) => item.week === week);
            return salesData ? salesData.total_sales : 0;
        });
        chart = renderChart(data, labels, chart, ctx);
    }

    function getDataByMonth() {
        const labels = Array.from({ length: 12 }, (_, i) => `Tháng ${i + 1}`);
        const data = labels.map((label) => {
            const month = parseInt(label.split(" ")[1]);
            const salesData = salesByMonth.find((item) => item.month === month);
            return salesData ? salesData.total_sales : 0;
        });
        chart = renderChart(data, labels, chart, ctx);
    }

    function updateCharts() {
        const branchSelect = document.getElementById("branchSelect");
        const branchId = branchSelect
            ? branchSelect.value
            : window.branchId || "current";

        fetch(`/admin?branch_id=${branchId}`)
            .then((response) => response.json())
            .then((data) => {
                window.salesByDay = data.salesByDay || [];
                window.salesByWeek = data.salesByWeek || [];
                window.salesByMonth = data.salesByMonth || [];
                getDataByDay(); // Hiển thị dữ liệu theo ngày mặc định
            })
            .catch((error) => {
                console.error("Error loading chart data:", error);
            });
    }

    // Xử lý sự kiện thay đổi chi nhánh (nếu có quyền)
    const branchSelect = document.getElementById("branchSelect");
    if (branchSelect) {
        branchSelect.addEventListener("change", function () {
            updateCharts();
        });
    }

    // Render biểu đồ khi tải trang
    updateCharts();

    // Xử lý sự kiện cho các nút thời gian
    document.getElementById("btnDay").addEventListener("click", function () {
        getDataByDay();
        setActiveButton("btnDay");
    });

    document.getElementById("btnWeek").addEventListener("click", function () {
        getDataByWeek();
        setActiveButton("btnWeek");
    });

    document.getElementById("btnMonth").addEventListener("click", function () {
        getDataByMonth();
        setActiveButton("btnMonth");
    });

    function setActiveButton(buttonId) {
        document.querySelectorAll(".group_button .btn").forEach((button) => {
            button.classList.remove("active");
        });
        document.getElementById(buttonId).classList.add("active");
    }
});
