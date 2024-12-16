// Handle cancel button click
document.getElementById("btnCancel").addEventListener("click", function () {
    window.history.back(); // Go back to the previous page
});

document
    .getElementById("registrationForm")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Ngừng form tự động gửi khi submit

        const form = event.target;

        // Lấy dữ liệu từ form
        const formData = {
            name: form.name.value,
            fullname: form.fullname.value,
            email: form.email.value,
            password: form.password.value,
            password_confirmation: form.password_confirmation.value,
            phone_number: form.phone_number.value,
            birthday: form.birthday.value,
            address: form.address.value,
            ward: form.ward.value,
            district: form.district.value,
            province: form.province.value,
            sex: form.sex.value,
        };

        // Lấy CSRF token từ meta tag
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        // Gửi AJAX request với fetch
        fetch(form.action, {
            method: "POST", // Phương thức gửi dữ liệu
            body: JSON.stringify(formData), // Dữ liệu form dưới dạng JSON
            headers: {
                "X-CSRF-TOKEN": csrfToken, // Thêm CSRF token vào header
                Accept: "application/json", // Chấp nhận JSON response
                "Content-Type": "application/json", // Xác định loại nội dung là JSON
            },
        })
            .then(async (response) => {
                if (!response.ok) {
                    const errorData = await response.json();
                    clearErrors();

                    let errorDetails = ""; // Chuỗi tổng hợp lỗi
                    Object.keys(errorData.errors || {}).forEach((field) => {
                        const errorMessages = errorData.errors[field];
                        const fieldElement = document.getElementById(field);

                        if (fieldElement) {
                            fieldElement.classList.add("is-invalid"); // Thêm class lỗi

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
                        title: "Đăng ký thất bại",
                        html: `<ul>${errorDetails}</ul>`, // Hiển thị lỗi dưới dạng danh sách
                    });

                    throw new Error("Đăng ký thất bại");
                }
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    // Hiển thị popup thành công
                    Swal.fire({
                        icon: "success",
                        title: "Đăng ký thành công!",
                        text: "Hãy kiểm tra email để xác nhận tài khoản.",
                        timer: 3000,
                    });
                    form.reset();
                    clearErrors();
                } else {
                    // Hiển thị popup thất bại (không do nhập liệu)
                    Swal.fire({
                        icon: "warning",
                        title: "Đăng ký thất bại",
                        text: data.message,
                    });
                }
            })
            .catch((error) => {
                console.error("Có lỗi xảy ra:", error);

                // Hiển thị popup lỗi hệ thống
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

// Tải dữ liệu tỉnh/thành phố
const province = document.getElementById("province");
const districts = document.getElementById("district");
const wards = document.getElementById("ward");

const Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
    method: "GET",
    responseType: "application/json",
};

const promise = axios(Parameter);
promise
    .then(function (result) {
        renderProvince(result.data);
    })
    .catch((error) => {
        console.error("Lỗi khi tải dữ liệu tỉnh thành:", error);
        alert("Không thể tải dữ liệu tỉnh thành. Vui lòng thử lại sau.");
    });

function renderProvince(data) {
    data.forEach((x) => {
        province.options[province.options.length] = new Option(x.Name, x.Id);
    });

    province.onchange = function () {
        districts.length = 1;
        wards.length = 1;
        if (this.value != "") {
            const result = data.filter((n) => n.Id === this.value);
            result[0].Districts.forEach((k) => {
                districts.options[districts.options.length] = new Option(
                    k.Name,
                    k.Id
                );
            });
        }
    };

    districts.onchange = function () {
        wards.length = 1;
        const dataProvince = data.filter((n) => n.Id === province.value);
        if (this.value != "") {
            const dataWards = dataProvince[0].Districts.filter(
                (n) => n.Id === this.value
            )[0].Wards;
            dataWards.forEach((w) => {
                wards.options[wards.options.length] = new Option(w.Name, w.Id);
            });
        }
    };
}
