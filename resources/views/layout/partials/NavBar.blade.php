<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Header UI</title>
    <style>
    .navbar {
        background-color: #DA392B;
        padding: 0 60px;
        /* Padding for both sides */
    }

    .navbar .nav-link,
    .navbar .navbar-brand,
    .navbar .nav-link i {
        color: white !important;
    }

    .navbar .dropdown-menu {
        background-color: #C53327;
        margin-top: 0;
        /* Remove the gap between navbar and dropdown */
        padding: 0;
    }

    .navbar .dropdown-item {
        color: white !important;
    }

    .navbar-toggler {
        background-color: transparent;
        /* Make the background transparent */
        border: none;
        /* Remove the border */
    }

    .navbar-toggler .bi {
        color: white;
        /* Change the icon color to white */
    }

    .nav-link:hover,
    .dropdown-item:hover {
        color: #fff !important;
        /* Change text color to white */
        background-color: #9E291F;
        /* Dark red background on hover */
    }

    /* Active state color for navbar links and dropdown items */
    .nav-link.active,
    .dropdown-item.active {
        color: #fff !important;
        /* Change text color to white */
        background-color: #9E291F;
        /* Dark red background when active */
    }

    /* Change active color for navbar links */
    .nav-link.active,
    .dropdown-item.active {
        color: #9E291F;
        /* Red for active state */
    }

    @media (max-width: 940px) {
        .navbar {
            padding: 0;
            /* Set padding to 0 on both sides when screen width is 940px or less */
        }

        .navbar-brand {
            margin-left: 20px;
            /* Adjust the margin for the brand if needed */
        }
    }

    @media (max-width: 840px) {
        .navbar {
            padding: 0;
            /* Remove extra padding on small screens */
        }

        .navbar-collapse {
            display: flex;
            flex-direction: column;
        }

        .navbar-nav {
            width: 100%;
            text-align: left;
        }

        .navbar-nav .nav-item {
            width: 100%;
        }

        .navbar-nav .nav-link {
            padding: 10px 20px;
        }

        .navbar-brand {
            margin-left: 0;
            /* Remove margin entirely on small screens */
            justify-content: center;
            /* Center the brand */
            text-align: center;
            /* Ensure text is centered */
            width: 100%;
            /* Make the brand take up full width */
        }

        .navbar-toggler {
            margin-left: 0;
        }

        .navbar-nav.ms-auto {
            justify-content: center;
            /* Center items on small screens */
            margin-right: 0;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Navbar Toggle Button -->
                <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>

                <!-- Tổng quan with eye icon -->
                <a class="navbar-brand" href="#" id="overviewButton">
                    <i class="bi bi-eye"></i> Tổng quan
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Dropdown 1 -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navDropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-book"></i> Sản phẩm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navDropdown1">
                            <li><a class="dropdown-item" href="#" id="productCategoryButton"><i
                                        class="bi bi-list-ul"></i> Danh mục sản phẩm</a></li>
                            <li><a class="dropdown-item" href="#" id="promotionButton"><i class="bi bi-tags"></i> Khuyến
                                    mãi</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown 2 -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navDropdown2" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-card-checklist"></i> Giao dịch
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navDropdown2">
                            <li><a class="dropdown-item" href="#" id="orderSlipButton"><i
                                        class="bi bi-journal-check"></i> Phiếu đặt hàng</a></li>
                            <li><a class="dropdown-item" href="#" id="importButton"><i class="bi bi-box-arrow-in"></i>
                                    Nhập hàng</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown 3 -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navDropdown3" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-people"></i> Đối tác & Nguồn lực
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navDropdown3">
                            <li><a class="dropdown-item" href="#" id="customerButton"><i class="bi bi-person"></i> Khách
                                    hàng</a></li>
                            <li><a class="dropdown-item" href="#" id="supplierButton"><i class="bi bi-building"></i> Nhà
                                    cung cấp</a></li>
                            <li><a class="dropdown-item" href="#" id="employeeButton"><i
                                        class="bi bi-person-workspace"></i> Nhân viên</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown 4 -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navDropdown4" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bar-chart"></i> Báo cáo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navDropdown4">
                            <li><a class="dropdown-item" href="#" id="salesReportButton"><i class="bi bi-graph-up"></i>
                                    Bán hàng</a></li>
                            <li><a class="dropdown-item" href="#" id="financialReportButton"><i class="bi bi-cash"></i>
                                    Tài chính</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Bán hàng aligned to the right -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="salesButton"><i class="bi bi-basket"></i> Bán hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
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
    </script>
</body>

</html>