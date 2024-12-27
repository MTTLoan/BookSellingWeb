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