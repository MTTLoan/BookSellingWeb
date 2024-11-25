btnDescription.classList.add("active");
// Đảm bảo mã chỉ chạy sau khi DOM đã tải
document.addEventListener("DOMContentLoaded", function () {
    // Lấy các phần tử nút và container nội dung
    const btnDescription = document.getElementById("btnDescription");
    const btnFeedback = document.getElementById("btnFeedback");
    const contentContainer = document.getElementById("content");

    // Lưu HTML gốc (mô tả sản phẩm)
    const originalHTML = contentContainer.innerHTML;

    // HTML thay thế (đánh giá sản phẩm)
    const feedbackHTML = `
    <style>
    .kid_star {
    color: #F6A500;
    }
    </style>
        <div class="d-flex flex-column gap-35">
            <p class="fs-5 fw-bold my-4">Đánh giá sản phẩm</p>
            <div class="row general flex-column flex-sm-row mb-4">
                <div class="col-3 gap-1">
                    <div>
                        <span class="fs-1 fw-bold" id="math_start">5</span>
                        <span class="fs-4">/5</span>
                    </div>
                    <div>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                    </div>
                    <span>(10 đánh giá)</span>
                </div>
                <form class="math_range d-flex flex-column col-lg-5 gap-1">
                    <label>5 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="70"
                        disabled
                    />
                    <label>4 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="70"
                        disabled
                    />
                    <label>3 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="70"
                        disabled
                    />
                    <label>2 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="70"
                        disabled
                    />
                    <label>1 sao</label>
                    <input
                        type="range"
                        id="math"
                        name="math"
                        min="0"
                        max="100"
                        value="10"
                        disabled
                    />
                </form>
                <div class="col-4">
                    <p class="fs-12">
                        Chỉ có thành viên mới có thể viết nhận xét. Vui lòng
                        đăng nhập hoặc đăng ký.
                    </p>
                </div>
            </div>
            <hr />
            <div class="row comment my-4">
                <div class="col-2">
                    <p id="name">Thái Thị Sửu</p>
                    <p id="date">10/10/2024</p>
                </div>
                <div class="col-10 d-flex flex-column gap-2">
                    <div>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                    </div>
                    <p id="comment">
                        Sách rất hay, nội dung rất hấp dẫn, giá cả phải chăng
                    </p>
                    <div class="d-flex gap-5">
                        <div
                            class="text-secondary justify-content-center d-flex gap-2"
                        >
                            <span class="material-symbols-outlined">
                                thumb_up
                            </span>
                            <span>Thích</span>
                            <span id="quantity">(10)</span>
                        </div>
                        <div
                            class="text-secondary justify-content-center d-flex gap-2"
                        >
                            <span class="material-symbols-outlined">
                                info
                            </span>
                            <span>Báo cáo</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row comment mt-4">
                <div class="col-2">
                    <p id="name">Thái Thị Sửu</p>
                    <p id="date">10/10/2024</p>
                </div>
                <div class="col-10">
                    <div>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                        <span class="material-symbols-outlined kid_star">
                            kid_star
                        </span>
                    </div>
                    <p id="comment">
                        Sách rất hay, nội dung rất hấp dẫn, giá cả phải chăng
                    </p>
                    <div class="d-flex gap-5">
                        <div
                            class="text-secondary justify-content-center d-flex gap-2"
                        >
                            <span class="material-symbols-outlined">
                                thumb_up
                            </span>
                            <span>Thích</span>
                            <span id="quantity">(10)</span>
                        </div>
                        <div
                            class="text-secondary justify-content-center d-flex gap-2"
                        >
                            <span class="material-symbols-outlined">
                                info
                            </span>
                            <span>Báo cáo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    // Thêm sự kiện click cho nút "Mô tả sản phẩm"
    btnDescription.addEventListener("click", function () {
        contentContainer.innerHTML = originalHTML; // Trả lại HTML gốc
        btnDescription.classList.add("active");
        btnFeedback.classList.remove("active");
    });

    // Thêm sự kiện click cho nút "Đánh giá"
    btnFeedback.addEventListener("click", function () {
        contentContainer.innerHTML = feedbackHTML;
        btnFeedback.classList.add("active");
        btnDescription.classList.remove("active");
    });
});

/*Woo qty*/
jQuery(function ($) {
    if (!String.prototype.getDecimals) {
        String.prototype.getDecimals = function () {
            var num = this,
                match = ("" + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            if (!match) {
                return 0;
            }
            return Math.max(
                0,
                (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0)
            );
        };
    }

    function wcqi_refresh_quantity_increments() {
        $("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)")
            .addClass("buttons_added")
            .append('<input type="button" value="+" class="plus" />')
            .prepend('<input type="button" value="-" class="minus" />');
    }

    $(document).on("updated_wc_div", function () {
        wcqi_refresh_quantity_increments();
    });

    $(document).on("click", ".plus, .minus", function () {
        // Get values
        var $qty = $(this).closest(".quantity").find(".qty"),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr("max")),
            min = parseFloat($qty.attr("min")),
            step = $qty.attr("step");

        // Format values
        if (!currentVal || currentVal === "" || currentVal === "NaN")
            currentVal = 0;
        if (max === "" || max === "NaN") max = "";
        if (min === "" || min === "NaN") min = 0;
        if (
            step === "any" ||
            step === "" ||
            step === undefined ||
            parseFloat(step) === "NaN"
        )
            step = 1;

        // Change the value
        if ($(this).is(".plus")) {
            if (max && currentVal >= max) {
                $qty.val(max);
            } else {
                $qty.val(
                    (currentVal + parseFloat(step)).toFixed(step.getDecimals())
                );
            }
        } else {
            if (min && currentVal <= min) {
                $qty.val(min);
            } else if (currentVal > 0) {
                $qty.val(
                    (currentVal - parseFloat(step)).toFixed(step.getDecimals())
                );
            }
        }

        // Trigger change event
        $qty.trigger("change");
    });
    wcqi_refresh_quantity_increments();
});

//
function updateMainImage(thumbnail) {
    const mainImage = document.getElementById("mainImage");
    mainImage.src = thumbnail.src;
}

const spans = document.querySelectorAll(".label_edition");

// Thêm sự kiện click cho từng span
spans.forEach((span) => {
    span.addEventListener("click", function () {
        // Toggle class "active" để giữ hiệu ứng
        span.classList.toggle("active");
    });
});
