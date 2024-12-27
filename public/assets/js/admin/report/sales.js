document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("fetchReportBtn")
        .addEventListener("click", fetchReport);
    document
        .getElementById("exportExcelBtn")
        .addEventListener("click", exportToExcel);
});

function fetchReport() {
    const startDate = document.getElementById("startDate").value;
    if (!startDate) {
        alert("Vui lòng chọn ngày để xem báo cáo!");
        return;
    }

    const url = `/admin/sales-report?startDate=${startDate}`;
    window.location.href = url;
}

function exportToExcel() {
    const startDate = document.getElementById("startDate").value;
    const filename = startDate
        ? `SalesReport_${startDate}.xlsx`
        : "SalesReport.xlsx";

    fetch(`/admin/export-sales-report?startDate=${startDate}`)
        .then((response) => response.json())
        .then((data) => {
            const table = document.createElement("table");
            const thead = document.createElement("thead");
            const tbody = document.createElement("tbody");

            const headers = [
                "Ngày bán",
                "Chi nhánh",
                "Mã giao dịch",
                "Tên sách",
                "Số lượng",
                "Doanh thu",
            ];
            const headerRow = document.createElement("tr");
            headers.forEach((header) => {
                const th = document.createElement("th");
                th.textContent = header;
                headerRow.appendChild(th);
            });
            thead.appendChild(headerRow);

            data.forEach((row) => {
                const tr = document.createElement("tr");
                Object.values(row).forEach((cell) => {
                    const td = document.createElement("td");
                    td.textContent = cell;
                    tr.appendChild(td);
                });
                tbody.appendChild(tr);
            });

            table.appendChild(thead);
            table.appendChild(tbody);

            const workbook = XLSX.utils.table_to_book(table, {
                sheet: "SalesReport",
            });
            XLSX.writeFile(workbook, filename);
        })
        .catch((error) => {
            console.error("Error exporting data:", error);
            alert("Đã xảy ra lỗi khi xuất dữ liệu. Vui lòng thử lại.");
        });
}
