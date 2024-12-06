document.addEventListener('DOMContentLoaded', function() {
    const userButton = document.getElementById('userButton');
    const cartButton = document.getElementById('cartButton');

    if (userButton) {
        userButton.addEventListener('click', function() {
            window.location.href = '{{ route("UserProfile ") }}'; // Redirect to user profile route
        });
    }

    if (cartButton) {
        cartButton.addEventListener('click', function() {
            window.location.href = '{{ route("GioHang") }}'; // Redirect to cart route
        });
    }
});
