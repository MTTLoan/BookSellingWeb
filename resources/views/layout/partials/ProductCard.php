<?php
// Dữ liệu sản phẩm mẫu (có thể thay bằng dữ liệu từ CSDL hoặc API)
$product = [
    'image' => '../../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg',  // Đường dẫn hình ảnh sản phẩm
    'price' => '100,000 VND',
    'name' => 'Sản phẩm A',
    'sold' => 2
];
?>

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
    <title>Product Card</title>
    <style>
    /* Product Card CSS */
    .product-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        transition: transform 0.2s ease-in-out;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-card:hover {
        transform: scale(1.05);
    }

    .product-image {
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .product-card h6 {
        color: #C53327;
        font-weight: bold;
    }

    .card.custom-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card.custom-card .card-img-top {
        width: 85%;
        height: auto;
        object-fit: cover;
        margin: 1rem;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .card.custom-card .card-body {
        padding: 1rem;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .card.custom-card .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        text-align: left;
    }

    .card.custom-card .card-text {
        font-size: 1rem;
        margin-bottom: 1rem;
        text-align: left;
    }

    .card.custom-card .sold {
        font-size: 0.9rem;
        margin-right: 10px;
        align-items: center;
    }

    .card.custom-card .card-body .d-flex {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .card.custom-card .btn-buynow {
        background-color: #C53327;
        color: white;
        font-size: 15px;
        font-weight: bold;
        text-align: center;
        display: inline-block;
        margin-right: 5px;
        transition: background-color 0.3s ease;
    }

    .card.custom-card .btn-buynow:hover {
        background-color: #9E291F;
    }

    .card.custom-card .btn-addcart {
        color: #C53327;
        border-color: #C53327;
        display: inline-block;
        margin-right: 5px;
        transition: background-color 0.3s ease;
    }

    .card.custom-card .btn-addcart:hover {
        opacity: 50%;
    }

    .card.custom-card {
        margin-bottom: 1.5rem;
    }
    </style>
</head>

<body>
    <div class="container mt-4">
        <!-- Product Card -->
        <div class="col">
            <div class="card custom-card">
                <img src="<?= $product['image']; ?>" class="card-img-top" alt="ảnh sản phẩm">
                <div class="card-body">
                    <h5 class="card-title"><?= $product['price']; ?></h5>
                    <p class="card-text"><?= $product['name']; ?></p>
                    <div class="d-flex">
                        <p class="card-text sold">Đã bán <?= $product['sold']; ?></p>
                        <a href="GioHang.php" class="btn btn-addcart"
                            onclick="addToCart(event, <?= json_encode($product); ?>)">
                            <i class="bi bi-cart-plus"></i>
                        </a>
                        <a href="GioHang.php" class="btn btn-buynow">
                            Mua ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // JavaScript to handle Add to Cart button
    function addToCart(event, product) {
        event.preventDefault(); // Ngừng hành động mặc định của link
        console.log('Thêm vào giỏ hàng: ', product);

        // Chức năng thêm vào giỏ hàng (có thể lưu vào localStorage hoặc gửi tới server)
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push(product); // Thêm sản phẩm vào giỏ hàng
        localStorage.setItem('cart', JSON.stringify(cart)); // Lưu giỏ hàng vào localStorage
        alert('Sản phẩm đã được thêm vào giỏ hàng!');
    }
    </script>
</body>

</html>
