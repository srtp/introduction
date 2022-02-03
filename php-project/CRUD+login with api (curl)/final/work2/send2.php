<?php include 'check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>

<link rel="stylesheet" href="css/style.css">
<script>
$(document).ready(function(){	
    $('#email').hide();	
    $('#level').hide();	
	$("#group1").change(function(){
		var value = $("#group1 option:selected").val();
		if (value == "1"){
			$('#email').show();
            $('#level').hide();
		} else {
            $('#email').hide();
			$('#level').show();
		}
	});
});
</script>
</head>
<body class="body_home">
<center>
        <div class="row">
            <div class="col-md-3">
            <?php include 'menu.php';?>
            </div>
            <div class="col-md-12">
            <form  action="send_db.php" method="post" >

<?php 


      $email = $_SESSION['email'];
      $level = $_SESSION['level'];
                //1. เชื่อมต่อ database:
                include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                $doc_id=mysqli_real_escape_string($conn,$_GET['doc_id']);
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_doc WHERE doc_id=$doc_id AND level='$level'ORDER BY doc_id ASC" or die("Error:" . mysqli_error());
                $result = mysqli_query($conn, $query);

                $query2 = "SELECT * FROM tbl_user AS u 
                 INNER JOIN tbl_type AS t ON u.level = t.level
                 WHERE t.level
                 ORDER BY t.level ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result2 = mysqli_query($conn, $query2);
                echo '<div class="table-responsive-lg send" >';
                echo ' <table class="table table-hover" >';
                  //หัวข้อตาราง 
                    echo "
                      <tr class='send2'>
                      <td>เลขทะเบียน</td>
                      <td>ที่</td>
                      <td>วันที่</td>
                      <td>จาก</td>
                      <td>ถึง</td>
                      <td>เรื่อง</td>
                      <td>การปฏิบัติ</td>
                      <td>หมายเหตุ</td>
                      <td>#</td>                
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

                  }
                  echo "</tr>";
              echo "</table>";
              echo "</div>";


?>
<select name="group1" class="send_select" align="center" id="group1"> 
 <option  disabled selected >ส่งถึง</option>
              <option value="2">คณะ</option>
              <option value="1">บุคคล</option>
              </option>
            </select>
<select name="email" class="send_select" align="center" id="email"> 
 <option   value="" >ส่งรายบุคคล</option>
              <?php foreach($result2 as $results){?>
              <option value="<?php echo $results["email"];?>">
                <?php echo $results["type_name"]; echo ' : '; echo $results["name"]; ?>
              </option>
              <?php } ?>
            </select>
           <select  name="level" class="send_select" align="center" id="level">
            <option   value="" >ส่งถึงคณะ</option>
              <?php  foreach($result2 as $results){?>
              <option value="<?php echo $results["level"];?>">
                <?php echo $results["type_name"];?>
              </option>
              <?php } ?>
              </select> 
            <br>
            <br>
            <input type="hidden" name="doc_id" value="<?php echo $doc_id; ?>">
            <input type="submit" name="se" value="ส่งเอกสาร" class="btn btn-success" style="font-family:'Prompt', sans-serif; font-weight: 500; font-size:20px" >
    </div>
    </form>
                </center>
</body>
</html>