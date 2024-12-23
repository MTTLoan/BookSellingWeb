<?php
// Include the Header.php file
include 'layout/partials/Header_DaDangNhap.blade.php';
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
    <title>Thông tin cá nhân</title>
    <style>
    /* Inline CSS */
    body {
        background-color: #f7f7f7 !important;
    }

    .breadcrumb-nav {
        margin: 10px 60px;
        font-size: 16px;
    }

    .breadcrumb-link {
        color: #C53327;
        text-decoration: none;
        font-weight: bold;
    }

    .breadcrumb-separator {
        color: #333;
    }

    .breadcrumb-current {
        color: #333;
        font-weight: bold;
    }

    .form-header {
        text-align: left;
        margin-bottom: 20px;
    }

    .form-title {
        font-weight: bold;
        font-size: 24px;
        color: #333;
        margin-bottom: 5px;
        position: relative;
    }


    .form-title::after {
        content: "";
        display: block;
        height: 2px;
        background-color: #989696;
        width: 10%;
        margin-top: 10px;
    }

    .form-container {
        max-width: 1300px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        /* Chia đều không gian giữa hai phần */
    }

    .cart-items-container {
        flex: 1;
        /* Chiếm không gian còn lại */
        padding-right: 20px;
        /* Khoảng cách giữa các mục và phần thông tin đơn hàng */
    }

    .cart-summary {
        width: 300px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #ddd;
        line-height: 1.8;
        /* Tăng khoảng cách giữa các dòng */
    }

    .cart-summary .d-flex {
        margin-bottom: 15px;
        /* Dãn cách các phần tử trong phần thông tin đơn hàng */
    }

    .cart-summary strong {
        font-weight: bold;
    }

    .cart-summary span {
        font-size: 1.2rem;
    }


    .cart-item {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .cart-item-checkbox {
        margin-right: 15px;
    }

    .cart-item-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 15px;
    }

    .cart-item-name {
        flex: 2;
    }

    .cart-item-price {
        flex: 1;
        text-align: right;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-item-quantity {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cart-item-quantity button {
        color: #C53327;
        border: none;
        padding: 5px;
        cursor: pointer;
        background-color: whitesmoke;
    }

    .cart-item-quantity input {
        width: 40px;
        text-align: center;
        border: none;
        color: #C53327;
    }

    .cart-item-total-price {
        font-weight: bold;
        color: black;
    }

    .remove-item {
        color: #C53327;
        font-weight: bold;
        cursor: pointer;
        margin-left: 10px;
    }


    .btn-checkout {
        width: 100%;
        background-color: #C53327;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-checkout:hover {
        background-color: #a02a21;
    }
    </style>
    <script>
    // Function to change item quantity
    function changeQuantity(action, itemId) {
        const quantity = document.querySelector(`#quantity${itemId}`);
        let newQuantity = parseInt(quantity.value);

        if (action === 'increase') {
            newQuantity++;
        } else if (action === 'decrease' && newQuantity > 1) {
            newQuantity--;
        }

        quantity.value = newQuantity;
        updateItemTotal(itemId); // Update total price for this item
        updateTotal(); // Update overall totals
    }

    // Function to update total price for a single item
    function updateItemTotal(itemId) {
        const quantity = document.querySelector(`#quantity${itemId}`).value;
        const unitPrice = 42000;
        const totalPrice = quantity * unitPrice;
        document.querySelector(`#total-price${itemId}`).textContent = totalPrice.toLocaleString() + ' đ';
        updateTotal(); // Update overall totals
    }

    // Function to remove an item from the cart
    function removeItem(itemId) {
        const item = document.getElementById(itemId);
        item.remove();
        updateTotal(); // Update overall totals after removing item
    }

    // Update total price and quantity for checked items
    function updateTotal() {
        const cartItems = document.querySelectorAll('.cart-item'); // Select all cart items
        let totalQuantity = 0;
        let totalPrice = 0;

        cartItems.forEach(item => {
            const checkbox = item.querySelector('.cart-item-checkbox');
            const quantityInput = item.querySelector('.cart-item-quantity input');
            const quantity = parseInt(quantityInput.value);
            const unitPrice = 42000;

            if (checkbox.checked) { // Only include checked items
                totalQuantity += quantity;
                totalPrice += quantity * unitPrice;
            }
        });

        document.getElementById('total-quantity').textContent = totalQuantity;
        document.getElementById('total-price').textContent = totalPrice.toLocaleString() + ' đ';
    }

    // Attach event listeners to checkboxes
    document.querySelectorAll('.cart-item-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updateTotal); // Recalculate totals when checkbox state changes
    });

    // Checkout function
    function checkout() {
        const totalQuantity = parseInt(document.getElementById('total-quantity').textContent);
        if (totalQuantity === 0) {
            alert("Vui lòng chọn ít nhất một sản phẩm để thanh toán.");
        } else {
            alert("Thanh toán thành công!");
        }
    }
    </script>
</head>

<body>
    <nav class="breadcrumb-nav">
        <a href="Home_DaDangNhap.blade.php" class="breadcrumb-link">Trang chủ</a>
        <span class="breadcrumb-separator"> > </span>
        <span class="breadcrumb-current">Giỏ hàng</span>
    </nav>
    <main>
        <div class="form-container">
            <!-- Phần cart items bên trái -->
            <div class="cart-items-container">
                <div class="form-header">
                    <div class="form-title">Giỏ hàng</div>
                </div>
                <div class="cart-item" id="item1">
                    <input type="checkbox" class="cart-item-checkbox">
                    <img src="../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg" alt="Product Image"
                        class="cart-item-image">
                    <div class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
                    <div class="cart-item-quantity">
                        <button onclick="changeQuantity('decrease', 1)">-</button>
                        <input type="text" value="1" id="quantity1" onchange="updateItemTotal(1)">
                        <button onclick="changeQuantity('increase', 1)">+</button>
                    </div>
                    <div class="cart-item-price">
                        <span>42.000 đ</span>
                        <span class="cart-item-total-price" id="total-price1">42.000 đ</span>
                        <span class="remove-item" onclick="removeItem('item1')">Xóa</span>
                    </div>
                </div>
                <div class="cart-item" id="item2">
                    <input type="checkbox" class="cart-item-checkbox">
                    <img src="../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg" alt="Product Image"
                        class="cart-item-image">
                    <div class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
                    <div class="cart-item-quantity">
                        <button onclick="changeQuantity('decrease', 2)">-</button>
                        <input type="text" value="1" id="quantity2" onchange="updateItemTotal(2)">
                        <button onclick="changeQuantity('increase', 2)">+</button>
                    </div>
                    <div class="cart-item-price">
                        <span>42.000 đ</span>
                        <span class="cart-item-total-price" id="total-price2">42.000 đ</span>
                        <span class="remove-item" onclick="removeItem('item2')">Xóa</span>
                    </div>
                </div>
                <div class="cart-item" id="item3">
                    <input type="checkbox" class="cart-item-checkbox">
                    <img src="../../../public/assets/images/tron-len-mai-nha-de-khoc.jpg" alt="Product Image"
                        class="cart-item-image">
                    <div class="cart-item-name">Combo Tư Duy Ngược và Tư Duy Mở</div>
                    <div class="cart-item-quantity">
                        <button onclick="changeQuantity('decrease', 3)">-</button>
                        <input type="text" value="1" id="quantity3" onchange="updateItemTotal(3)">
                        <button onclick="changeQuantity('increase', 3)">+</button>
                    </div>
                    <div class="cart-item-price">
                        <span>42.000 đ</span>
                        <span class="cart-item-total-price" id="total-price3">42.000 đ</span>
                        <span class="remove-item" onclick="removeItem('item3')">Xóa</span>
                    </div>
                </div>
            </div>

            <!-- Phần thông tin đơn hàng bên phải -->
            <div class="cart-summary">
                <h4>Thông tin đơn hàng</h4>
                <div class="d-flex justify-content-between">
                    <strong>Số lượng:</strong>
                    <span id="total-quantity">0</span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Tổng:</strong>
                    <span id="total-price">0 đ</span>
                </div>
                <button class="btn-checkout" onclick="checkout()">Thanh toán</button>
            </div>
        </div>

    </main>

    <?php
    // Include the Footer.php file
    include 'layout/partials/Footer.blade.php';
    ?>

</body>

</html>