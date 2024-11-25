@extends('layout.app')

@section('title', 'Đăng Ký')

@section('content')
<div class="form-container">
    <div class="form-title">ĐĂNG KÝ</div>
    <form id="registrationForm" method="POST" action="{{ route('account.register') }}">
        @csrf
        <!-- Các trường input form ở đây -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên tài khoản (*)</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Mô tả cụ thể tại đây" required>
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên (*)</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Mô tả cụ thể tại đây"
                required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email (*)</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Mô tả cụ thể tại đây"
                required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Số điện thoại (*)</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number"
                placeholder="Mô tả cụ thể tại đây" required>
        </div>
        <div class="col-md-4 p-2">
            <label for="sex" class="form-label">Giới tính (*)</label>
            <select class="form-select" id="sex" name="sex" required>
                <option value="">Chọn giới tính</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="col-md-4 p-2">
            <label for="birthday" class="form-label">Ngày sinh (*)</label>
            <input type="date" class="form-control" id="birthday" name="birthday" required>
        </div>
        <div class="col-md-4 p-2">
            <label for="province" class="form-label">Tỉnh, thành phố (*)</label>
            <select class="form-select" id="province" name="province">
                <option value="">Chọn tỉnh, thành phố</option>
            </select>
        </div>
        <div class="col-md-4 p-2">
            <label for="district" class="form-label">Quận, huyện (*)</label>
            <select class="form-select" id="district" name="district">
                <option value="">Chọn quận, huyện</option>
            </select>
        </div>
        <div class="col-md-4 p-2">
            <label for="ward" class="form-label">Phường, xã (*)</label>
            <select class="form-select" id="ward" name="ward">
                <option value="">Chọn phường, xã</option>
            </select>
        </div>
        <div class="col-md-12 p-2">
            <label for="address" class="form-label">Địa chỉ (*)</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Nhập vào địa chỉ..."
                required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu (*)</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mô tả cụ thể tại đây"
                required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu (*)</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Mô tả cụ thể tại đây" required>
        </div>
        <div class="btn-container">
            <button type="reset" class="btn btn-cancel">Hủy</button>
            <button type="submit" class="btn btn-register">Đăng ký</button>
        </div>

    </form>
</div>
@endsection

@push('styles')
<style>
body {
    background-color: #f7f7f7 !important;
}

.form-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-title {
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 24px;
}

.form-group label {
    font-weight: bold;
}

.btn-container {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn {
    flex: 0 0 30%;
}

.btn-register {
    background-color: #C53327 !important;
    color: white !important;
}

.btn-cancel {
    background-color: white !important;
    color: #C53327 !important;
    border-color: #C53327 !important;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn chặn submit mặc định

        const formData = new FormData(this); // Thu thập dữ liệu từ form

        axios.post(this.action, formData)
            .then(function(response) {
                alert('Đăng ký thành công!'); // Thông báo thành công
            })
            .catch(function(error) {
                if (error.response) {
                    console.error(error.response.data); // Xử lý lỗi từ server
                    alert('Đăng ký thất bại. Vui lòng kiểm tra thông tin!');
                }
            });
    });
});

const province = document.getElementById("province");
const districts = document.getElementById("district");
const wards = document.getElementById("ward");

const Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
    method: "GET",
    responseType: "application/json",
};

const promise = axios(Parameter);
promise.then(function(result) {
    renderProvince(result.data);
});

function renderProvince(data) {
    for (const x of data) {
        province.options[province.options.length] = new Option(x.Name, x.Id);
    }

    province.onchange = function() {
        districts.length = 1;
        wards.length = 1;
        if (this.value != "") {
            const result = data.filter((n) => n.Id === this.value);
            for (const k of result[0].Districts) {
                districts.options[districts.options.length] = new Option(k.Name, k.Id);
            }
        }
    };

    districts.onchange = function() {
        wards.length = 1;
        const dataProvince = data.filter((n) => n.Id === province.value);
        if (this.value != "") {
            const dataWards = dataProvince[0].Districts.filter(
                (n) => n.Id === this.value
            )[0].Wards;
            for (const w of dataWards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Id);
            }
        }
    };
}
</script>
@endpush