<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<input type="button" name="login" value="เพิ่มสมาชิก" class="button_add" onclick="location.href='member.php?act=add'">

<?php
      include 'check.php';
                echo '<div class="table-responsive-lg" >';
                echo ' <table class="table table-hover" >';
                  //หัวข้อตาราง 
                    echo "
                      <tr>
                      <td>ไอดี</td>
                      <td>อีเมล์</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>                 
                    </tr>";
                    @$data = file_get_contents('http://localhost:3001/account/');
		                $data = json_decode($data);
		                if(!empty($data)){
		                foreach($data as $row){			
                  echo '<tr>';
                    echo '<td>' .$row->user.  '</td> ';
                    echo '<td>' .$row->email.  '</td> ';
                    //แก้ไขข้อมูล
                    echo '<td><a href="member.php?edit_id='.$row->user.'" class="btn btn-dark btn-sm">Edit</a>';  
                    //ลบข้อมูล
                    echo '<td><a href="delete.php?delete_id='.$row->user.'" class="btn btn-danger btn-sm">Delete</a>';  
                  echo "</tr>";
                  }
                echo "</table>";
                echo "</div>";
                    }
                ?>

</body>
</html>