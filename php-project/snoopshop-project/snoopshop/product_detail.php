<?php
include('admin/backend/connect.php');
$p_id = $_GET["id"];
?>
<!DOCTYPE html>
<head>
  <title>ระบบร้านค้าออนไลน์</title>

  <!-- Bootstrap CSS -->
</head>
<body>
  
  <div class="container">
    <?php include('nav.php'); ?>
    <div class="row">
      <?php
      $sql = "SELECT * FROM tbl_product as p 
              INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
               WHERE p_id = $p_id ";
      $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
      $row = mysqli_fetch_array($result);

      ?>
      <div class="col-md-10">
        <div class="container" style="margin-top: 150px">
          <div class="row">
            <div class="col-md-6">
              <div class="polaroid">
                <?php echo"<img src='admin/backend/p_img/".$row['p_img']."'width='100%'>";?>
                  <div>
                    <p><?php echo $row["p_name"];?></p>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <h3><b><?php echo $row["p_name"];?></b></h3>
              <p>
                ประเภท <?php echo $row["type_name"];?>
              </p>
              <?php echo $row["p_detail"];?>
                 <p>
                 <br>
                 <h6 class="card-title">ราคา <?php echo $row['p_price'] ?> บาท</h3>
                 <br>
                 <a href="cart2.php?p_id=<?php echo $row['p_id'] ?>&act=add"
                    class="btn btn-success " >หยิบใส่ตระกร้า</a> 
            </div>
    
                  </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
 