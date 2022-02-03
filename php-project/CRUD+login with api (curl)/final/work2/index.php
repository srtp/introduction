<?php include 'connect.php'; 
@$get_data=file_get_contents('http://localhost:3001/account/');
$list_account =json_decode($get_data);
session_start();
 
// if already logged in redirect
if (isset($_SESSION['email'])) {
 header('Location: member.php');
}
?>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;400;500&display=swap" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body_index">
    <?php
if (@$_GET['do'] == 'fail') {
    echo '<script type="text/javascript">
Swal.fire("ข้อมูลไม่ถูกต้อง","กรุณาลองใส่อีเมล์หรือรหัสผ่านอีกครั้ง","error");</script>';
}?>
    <center>
        <div class="container">
            <form align="center" action="login_db2.php" action="login_db.php" method="post" class="form_r">
                <div class="row">
                    <div class="single_line">
                        <h1 align="center">LOGIN E-DOCUMENT</h1>
                        <div class="row"><input class="input_login" type="email" name="email" id="email"
                                placeholder="อีเมล์" required></div>
                        <div class="row"><input class="input_login" type="password" name="password" id="password"
                                placeholder="รหัสผ่าน" required></div>
                        <br>
                    </div>
                    <div class="row"><input type="submit"  name="login" value="เข้าสู่ระบบ"></div>
            </form>
    </center>

</body>

</html>