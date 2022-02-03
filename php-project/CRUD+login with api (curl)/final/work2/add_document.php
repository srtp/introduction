<?php
      include 'check.php';
                //1. เชื่อมต่อ database:
                include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM send_rub ORDER BY id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($conn, $query);

                $query2 = "SELECT * FROM in_out ORDER BY id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result2 = mysqli_query($conn, $query2);
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
    <div class="row">
            <div class="col-md-3">
                <!-- Left side column. contains the logo and sidebar -->
                <?php include 'menu.php';?>
                <!-- Content Wrapper. Contains page content -->
            </div>
            <div class="col-md-12">
        <form align="center" action="data_doc2.php" method="post" class="add_document" enctype="multipart/form-data">

            <div class="document" align="center">
                <h1 align="center">เพิ่มเอกสาร</h1>
                <br>
                &nbsp;&nbsp;เลขทะเบียน&nbsp;&nbsp;<input class="input_document"type="text" name="No_doc" id="No_doc" placeholder="กรอกเลขทะเบียน" required>
                &nbsp;&nbsp;ที่&nbsp;&nbsp;<input class="input_document"type="text" name="run_no" id="run_no" placeholder="กรุณากรอกเลข" required>
               &nbsp;ลงวันที่&nbsp;<input class="input_document"type="date" name="date" id="date"  required><br>
              
                จาก&nbsp;<input class="input_document"type="text" name="from_doc" id="from_doc"  required>&nbsp;&nbsp;&nbsp;ถึง&nbsp;<input class="input_document"type="text" name="to_doc" id="to_doc"  required>
                <select name="sendrub_doc" class="select_add" required  > 
              <option value="id" disabled selected >กรุณาเลือกสถานะ</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["sendrub_doc"];?>">
                <?php echo $results["sendrub_doc"]; ?>
              </option>
              <?php } ?>
            </select>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;เรื่อง&nbsp;<input class="input_document"type="text" name="topic" id="topic"  required> 
                <select name="in_out_doc" class="select_add" required > 
              <option value="id" disabled selected >กรุณาเลือก</option>
              <?php foreach($result2 as $results2){?>
              <option value="<?php echo $results2["in_out_doc"];?>">
                <?php echo $results2["in_out_doc"]; ?>
              </option>
              <?php } ?>
            </select>
              การปฎิบัติ&nbsp;<input class="input_document"type="text" name="act" id="act"  required><br>
              หมายเหตุ&nbsp;<input class="input_document"type="text" name="more" id="more"  required style="wide:100%;"><br>
              </p>
              <label for="แนบไฟล์">แนบไฟล์</label>
              <input class="input_document" type="file" name="docfile"  id="docfile"  accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps"  required>
            </div>
            
            
            
                <input type="submit" name="add_doc" value="บันทึก" >
        </form>
              </div>
    </center>
</body>

</html>
