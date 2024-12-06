document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('productCategoryButton').addEventListener('click', function() {
        window.location.href = '{{ route("DanhMucSP") }}';
    });

    document.getElementById('promotionButton').addEventListener('click', function() {
        window.location.href = '{{ route ("KhuyenMai")}}';
    });

    document.getElementById('orderSlipButton').addEventListener('click', function() {
        window.location.href = '{{ route ("PhieuDatHang")}}';
    });

    document.getElementById('importButton').addEventListener('click', function() {
        window.location.href = '{{ route ("NhapHang")}}';
    });

    document.getElementById('customerButton').addEventListener('click', function() {
        window.location.href = '{{ route ("KhachHang")}}';
    });

    document.getElementById('supplierButton').addEventListener('click', function() {
        window.location.href = '{{ route ("NCC")}}';
    });

    document.getElementById('employeeButton').addEventListener('click', function() {
        window.location.href = '{{ route ("NhanVien")}}';
    });

    document.getElementById('salesReportButton').addEventListener('click', function() {
        window.location.href = '{{ route ("BaoCaoBanHang")}}';
    });

    document.getElementById('financialReportButton').addEventListener('click', function() {
        window.location.href = '{{ route ("BaoCaoTaiChinh")}}';
    });

    document.getElementById('salesButton').addEventListener('click', function() {
        window.location.href = '{{ route ("BanHang")}}';
    });
});
