<?php
        // Dữ liệu mẫu sản phẩm
        $products = [
            ['image' => '../../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg',
            "name" => "Sách giáo khoa",
            "quantity" => 5,
            "price" => 50000],
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
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .product-card {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        width: 250px;
        background-color: #ffffff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
    }

    .product-card img {
        width: 100px;
        height: 100px;
        border-radius: 5px;
        object-fit: cover;
        margin-right: 10px;
    }

    .product-info {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .product-info .name,
    .product-info .quantity {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    .product-info .price {
        font-size: 16px;
        font-weight: bold;
        color: #C53327;
    }
    </style>
</head>

<body>
    <div class="product-container">
        <?php foreach ($products as $product): ?>
        <div class="product-card">
            <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
            <div class="product-info">
                <div class="name"><?= $product['name']; ?></div>
                <div class="quantity">SL: <?= $product['quantity']; ?></div>
                <div class="price"><?= number_format($product['price'], 0, ',', '.'); ?> đ</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>