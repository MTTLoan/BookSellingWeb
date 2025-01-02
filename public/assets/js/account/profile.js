// Handle cancel button click
document.getElementById("btnCancel").addEventListener("click", function () {
    window.history.back(); // Go back to the previous page
});

// Khai báo các biến toàn cục
const province = document.getElementById("province");
const districts = document.getElementById("district");
const wards = document.getElementById("ward");

let data = []; // Biến toàn cục lưu trữ dữ liệu tỉnh/thành phố

// Tải dữ liệu tỉnh/thành phố
const Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
    method: "GET",
    responseType: "application/json",
};

axios(Parameter)
    .then(function (result) {
        data = result.data; // Lưu dữ liệu vào biến toàn cục
        renderProvince(data);
    })
    .catch((error) => {
        console.error("Lỗi khi tải dữ liệu tỉnh thành:", error);
        alert("Không thể tải dữ liệu tỉnh thành. Vui lòng thử lại sau.");
    });

function renderProvince(data) {
    // Render tỉnh/thành phố
    data.forEach((x) => {
        province.options[province.options.length] = new Option(x.Name, x.Id);
    });

    // Đặt giá trị mặc định cho tỉnh/thành phố
    province.value = customerProvince;

    province.onchange = function () {
        districts.length = 1; // Reset danh sách quận/huyện
        wards.length = 1; // Reset danh sách phường/xã
        if (this.value !== "") {
            const result = data.filter((n) => n.Id === this.value);
            result[0].Districts.forEach((k) => {
                districts.options[districts.options.length] = new Option(
                    k.Name,
                    k.Id
                );
            });

            // Đặt giá trị mặc định cho quận/huyện
            districts.value = customerDistrict;
            districts.onchange(); // Gọi onchange để tải phường/xã
        }
    };

    // Kích hoạt sự kiện onchange để load quận/huyện và phường/xã
    province.onchange();
}

districts.onchange = function () {
    wards.length = 1; // Reset danh sách phường/xã
    if (province.value !== "" && this.value !== "") {
        const dataProvince = data.filter((n) => n.Id === province.value);
        const dataWards = dataProvince[0].Districts.filter(
            (n) => n.Id === this.value
        )[0].Wards;

        dataWards.forEach((w) => {
            wards.options[wards.options.length] = new Option(w.Name, w.Id);
        });

        // Đặt giá trị mặc định cho phường/xã
        wards.value = customerWard;
    }
};

//
// Xử lý gửi form với AJAX
document
    .getElementById("profileForm")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Ngừng form tự động gửi khi submit

        const form = event.target;

        // Lấy dữ liệu từ form
        const formData = {
            name: form.name.value,
            fullname: form.fullname.value,
            birthday: form.birthday.value,
            sex: form.sex.value,
            email: form.email.value,
            phone_number: form.phone_number.value,
            province: form.province.value,
            district: form.district.value,
            ward: form.ward.value,
            address: form.address.value,
        };

        // Lấy CSRF token
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        // Gửi request AJAX sử dụng fetch
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
                if (!response.ok) {
                    const errorData = await response.json(); // Lấy dữ liệu lỗi từ response

                    clearErrors(); // Xóa lỗi cũ trên form

                    let errorDetails = ""; // Khởi tạo chuỗi để lưu lỗi

                    // Lặp qua các lỗi và hiển thị chúng
                    Object.keys(errorData.errors || {}).forEach((field) => {
                        const errorMessages = errorData.errors[field];
                        const fieldElement = document.getElementById(field);

                        if (fieldElement) {
                            fieldElement.classList.add("is-invalid"); // Thêm class lỗi

                            // Tạo phần tử thông báo lỗi và gắn vào form
                            const errorElement = document.createElement("div");
                            errorElement.classList.add("invalid-feedback");
                            errorElement.textContent = errorMessages.join(", ");
                            fieldElement.parentNode.appendChild(errorElement);
                        }

                        // Tổng hợp lỗi chi tiết để hiển thị trong popup
                        errorDetails += `<li>${field}: ${errorMessages.join(
                            ", "
                        )}</li>`;
                    });

                    // Hiển thị popup chi tiết lỗi
                    Swal.fire({
                        icon: "error",
                        title: "Cập nhật thất bại",
                        html: `<ul>${errorDetails}</ul>`, // Hiển thị lỗi dưới dạng danh sách
                    });

                    throw new Error("Cập nhật thất bại");
                }
                return response.json(); // Nếu response không lỗi, tiếp tục
            })
            .then((data) => {
                if (data.success) {
                    // Hiển thị popup thành công
                    Swal.fire({
                        icon: "success",
                        title: "Cập nhật thành công!",
                        text: data.message,
                    }).then(() => {
                        location.reload(); // Tải lại trang sau khi hiển thị thông báo thành công
                    });
                    form.reset();
                    clearErrors(); // Xóa lỗi sau khi gửi thành công
                } else {
                    // Nếu không phải lỗi nhập liệu mà là lỗi hệ thống, hiển thị thông báo thất bại
                    Swal.fire({
                        icon: "warning",
                        title: "Cập nhật thất bại",
                        text: data.message,
                    });
                }
            })
            .catch((error) => {
                console.error("Có lỗi xảy ra:", error);

                // Hiển thị lỗi hệ thống
                Swal.fire({
                    icon: "error",
                    title: "Có lỗi xảy ra",
                    text: "Không thể gửi thông tin. Vui lòng thử lại sau!",
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
