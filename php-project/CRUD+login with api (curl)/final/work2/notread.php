<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="body_home">
<div class="col-md-12">
<?php
      include 'check.php';
      $email = $_SESSION['email'];
                //1. เชื่อมต่อ database:
                include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_doc WHERE email LIKE '$email' AND status=1 ORDER BY doc_id ASC" or die("Error:" . mysqli_error());
                $result = mysqli_query($conn, $query);
                echo '<h1 class="mydoc99" align="center">ผู้รับ : ยังไม่ได้รับเอกสาร</h1>';
                ?><div align="center"> <input type="button"  name="login" value="ค้างส่ง" class="button_info99"onclick="location.href='menu.php?act=notread'">
                <input type="button"  name="login" value="รับแล้ว" class="button_info77"onclick="location.href='menu.php?act=mailbox'"></div><?php
                echo '<div class="table-responsive-lg mydoc2" >';
                echo ' <table class="table table-hover" >';
                  //หัวข้อตาราง 
                    echo "
                      <tr class='mydoc3'>
                      <td>เลขทะเบียน</td>
                      <td>ที่</td>
                      <td>วันที่</td>
                      <td>จาก</td>
                      <td>ถึง</td>
                      <td>เรื่อง</td>
                      <td>การปฏิบัติ</td>
                      <td>หมายเหตุ</td>
                      <td>เอกสาร</td>
                                      
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr class='mydoc4'>";
                    echo "<td>" .$row["no_doc"] .  "</td> ";
                    echo "<td>" .$row["run_no"] .  "</td> ";
                     echo "<td>" .$row["date"] .  "</td> ";
                     echo "<td>" .$row["from_doc"] .  "</td> ";
                     echo "<td>" .$row["to_doc"] .  "</td> ";
                     echo "<td>" .$row["topic"] .  "</td> ";
                     echo "<td>" .$row["act"] .  "</td> ";
                     echo "<td>" .$row["more"] .  "</td> ";
                     echo '<td><a href="http://localhost/work1/docfile000/'.$row['fileupload'].'" class="btn btn-primary btn-sm" target="_blank" >View</a>';  


                    echo '<td><a href="send.php?doc_id=$doc_id" class="btn btn-danger btn-sm">ยกเลิกการส่ง</a>';
                  echo "</tr>";
                  }
                echo "</table>";
                echo "</div>";
                //5. close connection
                mysqli_close($conn);
                ?>
</div>
</body>
</html>