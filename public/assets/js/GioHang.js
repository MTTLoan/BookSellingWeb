function changeQuantity(action, itemId) {
    const quantityInput = document.getElementById(`quantity${itemId}`);
    let quantity = parseInt(quantityInput.value);

    if (action === 'increase') {
        quantity++;
    } else if (action === 'decrease' && quantity > 1) {
        quantity--;
    }

    quantityInput.value = quantity;
    updateItemTotal(itemId);

    // Gọi API để cập nhật số lượng giỏ hàng
    fetch(`/cart/${itemId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            quantity: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartSummary();
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Lỗi khi gọi API:', error);
    });
}

function updateItemTotal(itemId) {
    const quantity = parseInt(document.getElementById(`quantity${itemId}`).value);
    const unitPrice = parseInt(document.getElementById(`total-price${itemId}`).dataset.unitPrice);
    const totalPriceElement = document.getElementById(`total-price${itemId}`);

    totalPriceElement.textContent = (quantity * unitPrice).toLocaleString('vi-VN') + ' đ';

    // Cập nhật tổng giá trị và số lượng toàn bộ giỏ hàng
    updateCartSummary();
}

function removeItem(itemId) {
    fetch(`/cart/${itemId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    }).then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`item${itemId}`).remove();
            updateCartSummary();
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Lỗi khi gọi API:', error);
    });
}

function updateCartSummary() {
    let totalQuantity = 0;
    let totalPrice = 0;

    document.querySelectorAll('.cart-item').forEach(item => {
        const quantity = parseInt(item.querySelector('input[type="text"]').value);
        const unitPrice = parseInt(item.querySelector('.cart-item-total-price').dataset.unitPrice);

        totalQuantity += quantity;
        totalPrice += quantity * unitPrice;
    });

    document.getElementById('total-quantity').textContent = totalQuantity;
    document.getElementById('total-price').textContent = totalPrice.toLocaleString('vi-VN') + ' đ';
}

function checkout() {
    const totalQuantity = parseInt(document.getElementById('total-quantity').textContent);
    if (totalQuantity === 0) {
        alert("Vui lòng chọn ít nhất một sản phẩm để thanh toán.");
    } else {
        alert("Thanh toán thành công!");
    }
}
