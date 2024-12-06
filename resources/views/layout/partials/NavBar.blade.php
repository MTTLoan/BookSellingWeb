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
    <link href="{{ asset('assets/css/layout/partials/NavBar.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Navbar Toggle Buttton -->
                <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>

            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Tổng quan with eye icon -->
                    <li class="nav-item" href="#" id="overviewButton">
                        <i class="bi bi-eye"></i> Tổng quan
                    </li>

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

    <script src="{{ asset('assets/js/layout/partials/NavBar.js') }}"></script>
</body>

</html>