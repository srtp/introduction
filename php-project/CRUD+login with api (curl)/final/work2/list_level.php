<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<input type="button" name="login" value="เพิ่มแผนก" class="button_add" onclick="location.href='manage_level.php?act=add'">
</body>
</html>

<?php
      include 'check.php';
                //1. เชื่อมต่อ database:
                include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_type ORDER BY level ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($conn, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo '<div class="table-responsive-lg" >';
                echo ' <table class="table table-hover" >';
                  //หัวข้อตาราง 
                    echo "
                      <tr>
                      <td>ไอดี</td>
                      <td>แผนก</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>                 
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["level"] .  "</td> ";
                    echo "<td>" .$row["type_name"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><input type='button' name='login' value='Edit' align='center' class='button_info5' onclick='location.href='memberSQ.php?act=edit&ID=$row[0]''>";  
                    //ลบข้อมูล
                    echo "<td><input type='button' name='login' value='Delete' align='center' class='button_info6' onclick='location.href='memberform_deletedb.php?ID=$row[0]''>";
                  echo "</tr>";
                  }
                echo "</table>";
                echo "</div>";
                //5. close connection
                mysqli_close($conn);
                ?>