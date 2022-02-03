

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
    <?php $edit_id = $_GET['edit_id']; ?>
</head>

<body>
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


</script>
    <center>
    <?php @$data = file_get_contents('http://localhost:3001/account/'.$edit_id);
		                $data = json_decode($data);
      echo  '<form align="center" action="edit_db.php" method="post" class="register_form">';

      echo '<div class="single_line">';
         echo       '<h1 align="center">แก้ไขสมาชิก</h1>';
           echo '<input class="input_login"type="email" name="email" id="email" placeholder="อีเมล์" value='.$data->data->email.'>';
           echo '<input class="input_login"type="text" name="user" id="user" placeholder="ยูสเซอร์เนม"  value='.$data->data->user.'>';
           echo  '<input class="input_login"type="password" name="password" id="myInput" placeholder="รหัสผ่าน" value='.$data->data->password.'>';
               echo '<br>';
           echo '</div>';
           echo '<input type="checkbox"  onclick="myFunction()"> Show Password <br>';
                echo '<input type="submit" name="rig" value="ยืนยัน" >';
        echo '</form>';
                        

        ?>
    </center>

</body>

</html>
