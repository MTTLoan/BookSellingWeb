<!DOCTYPE html>
<html>

<head>
    <title>Verify Your Account</title>
</head>

<body>
    <h1>Verify Your Account</h1>
    <p>Hello {{$account->name}}</p>
    <p>Thank you for registering with us. Please click the link below to verify your account:</p>
    <a href="{{route('account.verify', $account->email)}}">Verify Account here</a>
    <p>If you did not create an account, no further action is required.</p>
    <p>Regards,<br>ChapterOne Team</p>
</body>

</html>