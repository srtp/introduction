<?php include 'check.php'?>
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
        <form align="center" action="type_user_db.php" method="post" class="register_form">

            <div class="single_line">
                <h1 align="center">เพิ่มแผนก</h1>
                <input class="input_login"type="name" name="name" id="name" placeholder="กรุณากรอกแผนก" required>
                <br>
            </div>
                <input type="submit" name="type" value="ยืนยัน" >
        </form>
    </center>
</body>

</html>
