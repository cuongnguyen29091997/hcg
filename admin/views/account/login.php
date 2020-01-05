<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrator Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="/common/img/b-logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/common/css/style.css">
</head>
<body>
<div class="container-fluid form-huemall">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="wrap form-sign-in" style="margin-top: 45%; height: auto;">
                <div class="text-center" style="margin-bottom: -20px;">
                    <img src="/common/img/b-logo.png" class="img-responsive" style="height: 100px;">
                </div>
                <div style="color: red;text-align: center;">Red bull hân hạnh tài trợ ứng dụng này</div>
                <form method="POST" action="/cms-admin/account/checklogin">
                    <td><?php if(isset($data) && isset($data['message'])) echo $data['message']; ?></td>
                    <td>
                        <input type="text" name="username" class="form-control" placeholder="Tài Khoản" required>
                    </td>
                    <td>
                        <input type="password" name="password" class="form-control" placeholder="Mật Khẩu" required>
                    </td>
                    <div class="text-center">
                        <button class="btn" type="submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
        <footer>
            <strong>
                <p style="color: #fff;" class="text-center">Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2018 
                    <a style="color: #fff; text-decoration: none;" href="http://bdata.vn" target="_blank">hcg-Co-Phuoc</a>
                </p>
            </strong>
        </footer>
    </div>
</div>
</body>
</html>