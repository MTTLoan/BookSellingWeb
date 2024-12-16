function addToCart(event, product) {
    event.preventDefault(); // Ngừng hành động mặc định của link
    console.log('Thêm vào giỏ hàng: ', product);

    // Chức năng thêm vào giỏ hàng (có thể lưu vào localStorage hoặc gửi tới server)
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(product); // Thêm sản phẩm vào giỏ hàng
    localStorage.setItem('cart', JSON.stringify(cart)); // Lưu giỏ hàng vào localStorage
    alert('Sản phẩm đã được thêm vào giỏ hàng!');
}
