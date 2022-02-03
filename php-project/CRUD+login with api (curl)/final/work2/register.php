<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;400;500&display=swap" rel="stylesheet">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <center>
        <form align="center" action="register_db.php" method="post" class="register_form">

            <div class="single_line">
                <h1 align="center">เพิ่มสมาชิก</h1>
                <input class="input_login"type="email" name="email" id="email" placeholder="อีเมล์" required>
                <input class="input_login"type="text" name="user" id="user" placeholder="ยูสเซอร์เนม" required>
                <input class="input_login"type="password" name="password" id="password" placeholder="รหัสผ่าน" required>
                <input class="input_login"type="password" name="password2" id="password2" placeholder="ยืนยันรหัสผ่าน" required>
                <br>
            </div>
                <input type="submit" name="rig" value="ยืนยัน" >
        </form>
    </center>

</body>

</html>
