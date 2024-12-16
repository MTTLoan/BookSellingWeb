<!DOCTYPE html>
<html>

<head>
    <title>Đặt lại mật khẩu</title>
</head>

<body>
    <p>Chào bạn,</p>
    <p>Bạn đã yêu cầu đặt lại mật khẩu cho tài khoản của mình. Vui lòng nhấp vào liên kết bên dưới để đặt lại mật khẩu:
    </p>
    <p><a href="{{ $resetLink }}">{{ $resetLink }}</a></p>
    <p>Liên kết này sẽ hết hạn sau 15 phút vì lý do bảo mật. Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua
        email này.</p>
    <p>Lưu ý: Bạn chỉ có thể yêu cầu đặt lại mật khẩu một lần mỗi 10 phút. Nếu bạn gặp vấn đề, vui lòng liên hệ với bộ
        phận hỗ trợ của chúng tôi.</p>
    <p>Trân trọng,</p>
    <p>Đội ngũ hỗ trợ</p>
</body>

</html>