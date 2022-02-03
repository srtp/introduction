<?php
      include 'check.php';
                //1. เชื่อมต่อ database:
                include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_type ORDER BY level ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($conn, $query);
?>
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
                <input class="input_login"type="name" name="name" id="name" placeholder="ชื่อ-นามสกุล" required>
                <input class="input_login"type="password" name="password" id="password" placeholder="รหัสผ่าน" required>
                <input class="input_login"type="password" name="password2" id="password2" placeholder="ยืนยันรหัสผ่าน" required>
                <div align="center"><select name="level" class="form-control" required  align="center"> 
              <option value="level" disabled selected >โปรดเลือกสถานะสมาขิก</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["level"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
              </div>
                <br>
            </div>
                <input type="submit" name="rig" value="ยืนยัน" >
        </form>
    </center>
</body>

</html>
