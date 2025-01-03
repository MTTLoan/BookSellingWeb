document.addEventListener("DOMContentLoaded", function () {
    const cancelOrderForms = document.querySelectorAll(
        "form[action*='cancelorder']"
    );

    cancelOrderForms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Bạn có chắc chắn muốn hủy đơn hàng này?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Có, hủy đơn hàng!",
                cancelButtonText: "Không, giữ lại",
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = new FormData(form);

                    fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                        body: formData,
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.success) {
                                Swal.fire({
                                    title: "Thành công!",
                                    text: "Đơn hàng đã được hủy thành công.",
                                    icon: "success",
                                    confirmButtonText: "OK",
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "Lỗi!",
                                    text: "Không thể hủy đơn hàng này.",
                                    icon: "error",
                                    confirmButtonText: "OK",
                                });
                            }
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                            Swal.fire({
                                title: "Lỗi!",
                                text: "Đã xảy ra lỗi. Vui lòng thử lại.",
                                icon: "error",
                                confirmButtonText: "OK",
                            });
                        });
                }
            });
        });
    });
});
