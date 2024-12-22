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
    //Cố định giờ
    const dateTimeElement = document.getElementById('current-date-time');
    const fixedDate = '15/12/2024'; // Ngày cố định
    const fixedTime = '14:30:00'; // Giờ cố định

    //Hiển thị ngày và giờ cố định lên phần tử
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

// // Checkout function
// function checkout() {
//     const totalQuantity = parseInt(document.getElementById('total-quantity').textContent);
//     if (totalQuantity === 0) {
//         alert("Vui lòng chọn ít nhất một sản phẩm để thanh toán.");
//     } else {
//         alert("Thanh toán thành công!");
//     }
// }

// document.getElementById('total-price').textContent = totalPrice.toLocaleString() + ' đ';

// document.querySelectorAll('.price-box').forEach(button => {
//     button.addEventListener('click', function() {
//         const amount = this.textContent.trim();
//         console.log('Selected amount:', amount); // Hoặc thực hiện hành động khác
//         document.getElementById('price').textContent = amount;
//     });
// });

document.getElementById("checkout-button").addEventListener("click", function () {
    const modal = new bootstrap.Modal(document.getElementById("modal_Complete"));
    modal.show();
});