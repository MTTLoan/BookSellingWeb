// Khai báo các biến toàn cục
const province = document.getElementById("province");
const districts = document.getElementById("district");
const wards = document.getElementById("ward");
const discountCodeInput = document.querySelector(".discount-code");
const applyDiscountButton = document.querySelector(".apply-discount");
const totalPriceElement = document.getElementById("total-price");
const discountAmountElement = document.querySelector(".discount-amount"); // Thêm phần tử để hiển thị mã giảm giá

let data = []; // Biến toàn cục lưu trữ dữ liệu tỉnh/thành phố
let totalPrice = parseFloat(totalPriceElement.dataset.totalPrice); // Lấy tổng giá từ dataset

// Tải dữ liệu tỉnh/thành phố
const Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
    method: "GET",
    responseType: "json",
};

axios(Parameter)
    .then(function (result) {
        data = result.data; // Lưu dữ liệu vào biến toàn cục
        renderProvince(data);
    })
    .catch((error) => {
        console.error("Lỗi khi tải dữ liệu tỉnh thành:", error);
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

// Kiểm tra mã giảm giá
applyDiscountButton.addEventListener("click", function () {
    const code = discountCodeInput.value;

    axios
        .post(checkDiscountUrl, {
            code: code,
            total_price: totalPrice,
        })
        .then(function (response) {
            if (response.data.success) {
                const discountAmount = response.data.discount;
                const discountId = response.data.discount_id; // Lấy discount_id từ response
                totalPrice -= discountAmount;

                // Hiển thị mã giảm giá
                discountAmountElement.textContent = `-${new Intl.NumberFormat(
                    "vi-VN",
                    {
                        style: "currency",
                        currency: "VND",
                    }
                ).format(discountAmount)}`;

                // Cập nhật tổng giá
                totalPriceElement.textContent = new Intl.NumberFormat("vi-VN", {
                    style: "currency",
                    currency: "VND",
                }).format(totalPrice);

                // Gán discount_id vào input ẩn
                document.getElementById("discount-id").value = discountId;
            } else {
                alert(response.data.message);
            }
        })
        .catch(function (error) {
            console.error("Lỗi khi kiểm tra mã giảm giá:", error.response.data);
            alert(
                "Có lỗi xảy ra khi kiểm tra mã giảm giá. Vui lòng thử lại sau."
            );
        });
});
