<?php
// Include the Header.php file
//include 'layout/partials/Header_VaiTro.blade.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.js"></script>

    <style>
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

    .container {
        display: flex;
        justify-content: space-between;
    }

    .left-panel {
        width: 60%;
    }

    .product-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    .product-card {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        cursor: pointer;
        flex: 1 1 calc(33.333% - 10px);
    }

    .cart-item {
        display: flex;
        flex-direction: row;
        /* Chỉnh lại để giữ các phần tử ở cùng một hàng */
        flex-wrap: wrap;
        /* Cho phép các phần tử xuống dòng nếu không đủ không gian */
        align-items: center;
        /* Căn chỉnh các phần tử theo chiều dọc */
        justify-content: space-between;
        /* Giữ các phần tử cách đều */
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        word-wrap: break-word;
    }

    .product-summary {
        margin-top: 20px;
    }

    .right-panel {
        padding: 20px;
        background-color: white;
        /* Màu nền sáng cho phần thu ngân */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 30%;
        height: auto;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .header {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: center;
    }

    .date-time {
        font-size: 14px;
        color: #6c757d !important;
    }

    #cart {
        width: 100%;
        max-height: 300px;
        /* Giới hạn chiều cao giỏ hàng */
        overflow-y: auto;
        /* Cho phép cuộn */
    }

    .product-summary p {
        margin-bottom: 10px;
        line-height: 1.8;
    }

    .payment-method {
        margin: 20px 0;
    }

    #search-customer,
    #checkout-button {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 20px;
    }

    #search-product {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button#checkout-button {
        background-color: #C53327;
        /* Màu đỏ cho nút thanh toán */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button#checkout-button:hover {
        background-color: #a9321a;
        /* Hiệu ứng hover */
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
    }

    .cart-item-number {
        font-size: 18px;
        font-weight: bold;
        margin-right: 10px;
    }

    .cart-item-name {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .cart-item-price {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .cart-item-total-price {
        color: green;
        font-weight: bold;
    }

    .remove-item {
        cursor: pointer;
        color: black;
        font-size: 16px;
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
    }

    .price-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    .price-box {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
        width: 100px;
        /* Độ rộng của mỗi nút */
        background-color: #f9f9f9;
        /* Màu nền nhạt */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Hiệu ứng đổ bóng */
        font-weight: bold;
        cursor: pointer;
        /* Hiển thị con trỏ chỉ tay */
        transition: background-color 0.3s, transform 0.2s;
        /* Hiệu ứng khi hover */
    }

    .price-box:hover {
        background-color: #e9ecef;
        /* Màu nền khi rê chuột */
        transform: scale(1.05);
        /* Phóng to nhẹ */
    }

    .price-box:active {
        background-color: #ddd;
        /* Màu khi nhấn */
        transform: scale(0.95);
        /* Co nhỏ nhẹ */
    }


    @media (max-width: 768px) {

        /* Điều chỉnh cho màn hình nhỏ như máy tính bảng */
        .container {
            flex-direction: column;
            align-items: center;
        }

        .left-panel,
        .right-panel {
            width: 100%;
        }

        .product-card {
            flex: 1 1 calc(100% - 10px);
            /* Mỗi sản phẩm chiếm 100% chiều rộng */
        }

        .summary {
            width: 100%;
        }

        .price-box {
            width: 48%;
            /* 2 nút trong mỗi hàng */
        }

        .cart-item {
            flex-direction: column;
            align-items: flex-start;
            word-wrap: break-word;
        }

    }

    @media (max-width: 480px) {

        /* Điều chỉnh cho màn hình điện thoại */
        .breadcrumb-nav {
            font-size: 14px;
            margin: 10px;
        }

        #search-customer,
        #search-product,
        #checkout-button {
            font-size: 14px;
            padding: 8px;
        }

        .price-box {
            width: 100%;
            /* 1 nút chiếm toàn bộ chiều rộng */
        }

        .container {
            flex-direction: column;
            align-items: center;
        }

        .left-panel,
        .right-panel {
            width: 100%;
        }

        .product-card {
            flex: 1 1 100%;
        }

        .summary {
            width: 100%;
        }

        .header {
            flex-direction: column;
            align-items: flex-start;
        }

        .cart-item {
            display: flex;
            flex-direction: row;
            /* Chỉnh lại để giữ các phần tử ở cùng một hàng */
            flex-wrap: wrap;
            /* Cho phép các phần tử xuống dòng nếu không đủ không gian */
            align-items: center;
            /* Căn chỉnh các phần tử theo chiều dọc */
            justify-content: space-between;
            /* Giữ các phần tử cách đều */
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            word-wrap: break-word;
        }
    }
    </style>
    <script>
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

    let cart = [];
    let total = 0;

    function addToCart(id, name, price) {
        const itemIndex = cart.findIndex(item => item.id === id);
        if (itemIndex === -1) {
            cart.push({
                id,
                name,
                price,
                quantity: 1
            });
        } else {
            cart[itemIndex].quantity++;
        }
        updateCart();
    }

    function updateCart() {
        const cartElement = document.getElementById('cart');
        cartElement.innerHTML = '';
        total = 0;

        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;

            cartElement.innerHTML += `
            <div class="cart-item">
                <span>${item.name}</span>
                <span>${item.quantity}</span>
                <span>${itemTotal.toLocaleString('vi-VN')} đ</span>
                <button onclick="removeFromCart(${item.id})">Xóa</button>
            </div>
        `;
        });

        document.getElementById('total-price').textContent = total.toLocaleString('vi-VN');
        document.getElementById('amount-due').textContent = total.toLocaleString('vi-VN');
    }

    function removeFromCart(id) {
        cart = cart.filter(item => item.id !== id);
        updateCart();
    }


    document.addEventListener('DOMContentLoaded', function() {
        // Cố định giờ
        const dateTimeElement = document.getElementById('current-date-time');
        const fixedDate = '15/12/2024'; // Ngày cố định
        const fixedTime = '14:30:00'; // Giờ cố định

        // Hiển thị ngày và giờ cố định lên phần tử
        dateTimeElement.textContent = `${fixedDate} - ${fixedTime}`;
    });

    let itemNumber = 1; // Số thứ tự bắt đầu từ 1

    function changeQuantity(action, itemId) {
        const item = cart.find(cartItem => cartItem.id === itemId);
        if (action === 'increase') {
            item.quantity++;
        } else if (action === 'decrease' && item.quantity > 1) {
            item.quantity--;
        }
        updateItemTotal(itemId);
        updateTotal();
    }

    function updateItemTotal(itemId) {
        const item = cart.find(cartItem => cartItem.id === itemId);
        const totalPrice = item.price * item.quantity;
        document.getElementById(`total-price${itemId}`).textContent = totalPrice.toLocaleString('vi-VN') + ' đ';
    }

    function updateTotal() {
        let total = 0;
        cart.forEach(item => {
            total += item.price * item.quantity;
        });
        document.getElementById('total-price').textContent = total.toLocaleString('vi-VN') + ' đ';
    }

    function removeItem(itemId) {
        cart = cart.filter(item => item.id !== itemId);
        document.getElementById(`item${itemId}`).remove();
        updateTotal();
    }

    function addItemToCart(itemId, name, price) {
        cart.push({
            id: itemId,
            name: name,
            price: price,
            quantity: 1
        });

        const cartItem = `
        <div class="cart-item" id="item${itemId}">
            <div class="cart-item-number">${itemNumber++}</div>
            <div class="cart-item-name">${name}</div>
            <div class="cart-item-quantity">
                <button onclick="changeQuantity('decrease', ${itemId})">-</button>
                <input type="text" value="1" id="quantity${itemId}" onchange="updateItemTotal(${itemId})">
                <button onclick="changeQuantity('increase', ${itemId})">+</button>
            </div>
            <div class="cart-item-price">
                <span>${price.toLocaleString('vi-VN')} đ</span>
                <span class="cart-item-total-price" id="total-price${itemId}">${price.toLocaleString('vi-VN')} đ</span>
                <span class="remove-item" onclick="removeItem(${itemId})">Xóa</span>
            </div>
        </div>
    `;

        document.getElementById('cart').innerHTML += cartItem;
        updateTotal();
    }

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
        const unitPrice = 50000;
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

    // Checkout function
    function checkout() {
        const totalQuantity = parseInt(document.getElementById('total-quantity').textContent);
        if (totalQuantity === 0) {
            alert("Vui lòng chọn ít nhất một sản phẩm để thanh toán.");
        } else {
            alert("Thanh toán thành công!");
        }
    }

    document.getElementById('total-price').textContent = totalPrice.toLocaleString() + ' đ';

    document.querySelectorAll('.price-box').forEach(button => {
        button.addEventListener('click', function() {
            const amount = this.textContent.trim();
            console.log('Selected amount:', amount); // Hoặc thực hiện hành động khác
            document.getElementById('price').textContent = amount;
        });
    });
    </script>
</head>

<body>
    <?php
    // Include the Header.php file
    include 'layout/partials/NavBar.blade.php';
    ?>

    <nav class="breadcrumb-nav">
        <a href="TongQuan.php" class="breadcrumb-link">Tổng quan</a>
        <span class="breadcrumb-separator"> > </span>
        <span class="breadcrumb-current">Đơn hàng</span>
    </nav>

    <main>
        <div class="container">
            <div class="left-panel">
                <input type="text" id="search-product" placeholder="Tìm hàng hóa" onkeyup="filterProducts()">
                <!-- Thay thế phần PHP trong product-list với việc bao gồm ProductPrice.php -->
                <div class="product-list">
                    <?php
                    // Bao gồm file ProductPrice.php, đảm bảo nó cung cấp dữ liệu sản phẩm
                    include 'layout/partials/ProductPrice.php';
                    include 'layout/partials/ProductPrice.php';
                    include 'layout/partials/ProductPrice.php';
                    include 'layout/partials/ProductPrice.php';
                    include 'layout/partials/ProductPrice.php';
                    ?>
                </div>

            </div>
            <div class="right-panel">
                <div class="header">
                    <p>Thu Ngân</p>
                    <p class="date-time" id="current-date-time"></p>
                </div>
                <input type="text" id="search-customer" placeholder="Tìm khách hàng">
                <div id="cart">
                    <div class="cart-item" id="item1">
                        <div class="cart-item-number">1</div>

                        <span class="remove-item" onclick="removeItem('item1')"><i class="bi bi-trash3"></i></span>

                        <div class="cart-item-name">SP00016</div>

                        <div class="cart-item-quantity">
                            <button onclick="changeQuantity('decrease', 1)">-</button>
                            <input type="text" value="1" id="quantity1" onchange="updateItemTotal(1)">
                            <button onclick="changeQuantity('increase', 1)">+</button>
                        </div>

                        <div class="cart-item-price">
                            <span>50.000 đ</span>
                            <span class="cart-item-total-price" id="total-price1">50.000 đ</span>
                        </div>
                    </div>

                </div>
                <div class="product-summary">
                    <div class="d-flex justify-content-between">
                        <p>Tổng tiền hàng:</p>
                        <span id="total-price"> 0 đ</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Giảm giá:</p>
                        <span id="sale-price"> 0 đ</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong>Khách cần trả:</strong>
                        <strong id="total-price"> 0 đ</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong>Khách thanh toán:</strong>
                        <strong id="price"> 0 đ</strong>
                    </div>
                </div>
                <div class="payment-method">
                    <label><input type="radio" name="payment" value="cash" checked> Tiền mặt</label>
                    <label><input type="radio" name="payment" value="transfer"> Chuyển khoản</label>
                </div>
                <div class="price-container">
                    <button class="price-box">10,000 đ</button>
                    <button class="price-box">20,000 đ</button>
                    <button class="price-box">50,000 đ</button>
                    <button class="price-box">100,000 đ</button>
                    <button class="price-box">200,000 đ</button>
                    <button class="price-box">500,000 đ</button>
                </div>

                <button id="checkout-button" onclick="checkout()">Thanh toán</button>
            </div>


        </div>
    </main>

    <?php
    // Include the Footer.php file
    include 'layout/partials/Footer.blade.php';
    ?>




</body>


</html>