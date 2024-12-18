document
    .getElementById("loginForm")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Ngừng form tự động gửi khi submit

        const form = event.target;

        // Lấy dữ liệu từ form
        const formData = {
            name: form.name.value,
            password: form.password.value,
        };

        // Lấy CSRF token từ meta tag
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        // Gửi AJAX request với fetch
        fetch(form.action, {
            method: "POST",
            body: JSON.stringify(formData),
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                Accept: "application/json",
                "Content-Type": "application/json",
            },
        })
            .then(async (response) => {
                const data = await response.json(); // Lấy dữ liệu JSON từ response
                if (!response.ok) {
                    if (response.status === 403) {
                        Swal.fire({
                            icon: "warning",
                            title: "Đăng nhập thất bại",
                            text:
                                data.message || "Tài khoản chưa được xác thực.", // Hiển thị message từ server
                        });
                        throw new Error(
                            data.message || "Tài khoản chưa được xác thực."
                        );
                    } else if (response.status === 422) {
                        Swal.fire({
                            icon: "error",
                            title: "Đăng nhập thất bại",
                            text:
                                data.message ||
                                "Sai tên tài khoản hoặc mật khẩu.", // Hiển thị message từ server
                        });
                        throw new Error(
                            data.message || "Sai tên tài khoản hoặc mật khẩu."
                        );
                    }

                    throw new Error(data.message || "Lỗi không xác định");
                }
                return data;
            })
            .then((data) => {
                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Đăng nhập thành công!",
                        text: "Chào mừng bạn trở lại.",
                        timer: 3000,
                    }).then(() => {
                        window.location.href = data.redirect_url || "/admin/";
                    });
                }
            })
            .catch((error) => {
                console.error("Có lỗi xảy ra:", error);

                Swal.fire({
                    icon: "error",
                    title: "Có lỗi xảy ra",
                    text:
                        error.message ||
                        "Không thể gửi thông tin. Vui lòng thử lại sau!",
                });
            });
    });

function clearErrors() {
    const invalidFields = document.querySelectorAll(".is-invalid");
    invalidFields.forEach((field) => {
        field.classList.remove("is-invalid");
    });

    const errorMessages = document.querySelectorAll(".invalid-feedback");
    errorMessages.forEach((error) => {
        error.remove();
    });
}

// Handle cancel button click
document.getElementById("btnCancel").addEventListener("click", function () {
    window.history.back(); // Go back to the previous page
});

