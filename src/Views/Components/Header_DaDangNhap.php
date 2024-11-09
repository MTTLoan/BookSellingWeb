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
    .header .navbar {
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header .navbar-brand {
        display: flex;
        align-items: center;
        margin-left: 60px;
    }

    .header .company-name {
        color: #C53327;
        font-size: 25px;
        font-family: Old English Text MT;
        font-weight: 400;
        margin-left: 5px;
    }

    .header .search-input {
        border: 1px solid #d35400;
        border-radius: 0;
        height: 38px;
        min-width: 50px;
        max-width: 500px;
        flex-grow: 1;
    }

    .header .search-btn {
        background-color: #d35400;
        color: white;
        border-radius: 0;
        height: 38px;
    }

    .header .navbar-nav {
        flex-direction: row;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header .navbar-nav .nav-link {
        padding: 0 10px;
        display: flex;
        justify-content: center;
        width: auto;
        align-items: center;
        background: none;
    }

    .header .register-link {
        color: black;
        border: none;
    }

    .header .login-link {
        color: #9E291F;
        border-left: 2px solid #9E291F;
        border-right: 2px solid #9E291F;
        border-top: none;
        border-bottom: none;
        padding: 0 10px;
        margin: 0 5px;
    }

    .header .cart-icon {
        font-size: 1.5rem;
        color: black;
        border: none;
        margin-right: 60px;
    }

    .header .user-icon {
        font-size: 1.5rem;
        color: black;
        border: none;
        margin-right: 10px;
    }

    @media (max-width: 576px) {
        .header .navbar {
            flex-wrap: wrap;
            justify-content: center;
        }

        .header .navbar-brand {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 0px;
        }

        .header .navbar-brand img {
            width: 30px;
            height: 25px;
        }

        .header .company-name {
            font-size: 20px;
        }

        .header .search-input {
            width: 100%;
            min-width: 0;
            font-size: 0.9rem;
        }

        .header .search-btn {
            font-size: 0.9rem;
        }

        .header .navbar-nav .nav-link {
            font-size: 0.9rem;
            padding: 0 10px;
            text-align: center;
            width: 100%;
        }

        .header .navbar-nav {
            margin-top: 5px;
            align-items: center;
        }

        .header .cart-icon {
            font-size: 1.5rem;
            color: black;
            border: none;
            margin-right: 60px;
        }

        .header .user-icon {
            font-size: 1.5rem;
            color: black;
            border: none;
            margin-right: 10px;
        }
    }
    </style>
    <script defer>
    document.addEventListener('DOMContentLoaded', function() {
        const userButton = document.getElementById('userButton');
        const cartButton = document.getElementById('cartButton');

        if (userButton) {
            userButton.addEventListener('click', function() {
                window.location.href =
                    'UserProfile.php'; // Change this to the appropriate page for user profile or authentication
            });
        }

        if (cartButton) {
            cartButton.addEventListener('click', function() {
                window.location.href = 'GioHang.php';
            });
        }
    });
    </script>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-sm navbar-white bg-white">
            <div class="container-fluid d-flex justify-content-between align-items-center" id="Logo">
                <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="./../../../../public/images/Favicon.png" alt="" width="40" height="40">
                    <span class="company-name">Chapter One</span>
                </a>
                <form class="d-flex mx-auto flex-grow-1 mx-2 justify-content-center">
                    <input class="form-control search-input" type="search" placeholder="Tìm kiếm sản phẩm..."
                        aria-label="Search">
                    <button class="btn search-btn" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
                    <ul class="navbar-nav">
                        <!-- Replaced Register and Login buttons with a User Icon button -->
                        <li class="nav-item">
                            <button class="nav-link user-icon" id="userButton">
                                <i class="bi bi-person-fill"></i>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link cart-icon" id="cartButton">
                                <i class="bi bi-bag-heart-fill"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>