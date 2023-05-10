<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Xin chào Ban,</p>
    <p>Chúng tôi vừa nhận được yêu cầu thay đổi mật khẩu cho tài khoản cua ban</p>
    <p>Để thay đổi mật khẩu vui lòng bấm vào link sau và làm theo hướng dẫn. (Chú ý: link sẽ hết hạn sau 24 giờ)</p>
    <a href="{{ config('client.url')}}/change-password?resetpw={{$data['resetpw']}}" title="Thay đổi mật khẩu">Thay đổi mật khẩu</a>
    <p>Nếu bạn không phải là người gửi yêu cầu xin vui lòng bỏ qua email này!</p>
    <p>Xin cảm ơn!</p>
</body>
</html>