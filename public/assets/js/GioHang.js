// Function to change item quantity
// Function to change item quantity
function changeQuantity(action, itemId) {
    const quantityInput = document.querySelector(`#quantity${itemId}`);
    let quantity = parseInt(quantityInput.value);

    if (action === 'increase') {
        quantity++;
    } else if (action === 'decrease' && quantity > 1) {
        quantity--;
    }

    quantityInput.value = quantity;

    // Gọi API để cập nhật số lượng giỏ hàng
    fetch('/update-cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            item_id: itemId,
            quantity: quantity
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Cập nhật tổng số lượng và tổng tiền sau khi cập nhật
                document.getElementById('total-quantity').textContent = data.totalQuantity;
                document.getElementById('total-price').textContent = data.totalPrice.toLocaleString('vi-VN') + ' đ';
                updateItemTotal(itemId);
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


// Function to update total price for a single item
// Function to update total price for a single item
function updateItemTotal(itemId) {
    const quantity = parseInt(document.querySelector(`#quantity${itemId}`).value);
    const unitPriceText = document.querySelector(`#item${itemId} .cart-item-price span`).textContent;
    const unitPrice = parseInt(unitPriceText.replace(/\./g, '').replace(' đ', '')); // Remove dots and "đ" to parse price

    // Calculate total price for this item
    const totalPrice = quantity * unitPrice;

    // Update the total price displayed for the item
    document.querySelector(`#total-price${itemId}`).textContent = totalPrice.toLocaleString('vi-VN') + ' đ';

    // Update the total in the cart
    updateTotal();
}


// Function to remove an item from the cart
function removeItem(itemId) {
    const item = document.querySelector(`#item${itemId}`);
    if (item) {
        item.remove();
        updateTotal();
    }
}

// Function to update total quantity and total price
// Function to update total quantity and total price
// Function to update total quantity and total price
function updateTotal() {
    const cartItems = document.querySelectorAll('.cart-item');
    let totalQuantity = 0;
    let totalPrice = 0;

    cartItems.forEach(item => {
        const checkbox = item.querySelector('.cart-item-checkbox');
        const quantity = parseInt(item.querySelector('.cart-item-quantity input').value);
        const unitPriceText = item.querySelector('.cart-item-price span').textContent;
        const unitPrice = parseInt(unitPriceText.replace(/\./g, '').replace(' đ', ''));

        if (checkbox.checked) {
            totalQuantity += quantity;
            totalPrice += quantity * unitPrice;
        }
    });

    // Update total quantity in cart-summary
    document.getElementById('total-quantity').textContent = totalQuantity;

    // Update total price in cart-summary
    document.getElementById('total-price').textContent = totalPrice.toLocaleString('vi-VN') + ' đ';
}



// Attach event listeners to checkboxes
document.querySelectorAll('.cart-item-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateTotal);
});

// Attach event listeners to quantity input fields
document.querySelectorAll('.cart-item-quantity input').forEach(input => {
    input.addEventListener('change', () => {
        const itemId = input.id.replace('quantity', '');
        updateItemTotal(itemId);
        updateTotal();
    });
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
