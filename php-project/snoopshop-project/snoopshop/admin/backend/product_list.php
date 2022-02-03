<?php
include('h.php');
//1. เชื่อมต่อ database:
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง 
$query = "
SELECT * FROM tbl_product as p 
INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
ORDER BY p.p_id DESC" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>
<table class="table table-hover" id="example1" align="center">
<thead class="thead-dark">
     <tr>
      <th width='5%'>ID</th>
      <th width=25%>ประเภทสินค้า</th>
      <th width=30%>ชื่อสินค้า</th>
      <th width=25%>ราคา</th>
      <th width=25%>รูป</th>
      <th width=5%>แก้ไข</th>
      <th width=5%>ลบ</th>
    </tr>
    </thead>
  <?php while($row = mysqli_fetch_array($result)) { ?>
   <tr>
     <td> <?php echo $row["p_id"]; ?></td>
     <td><?php echo  $row["type_name"];?></td> 
     <td><?php echo $row["p_name"]; ?></td>
     <td><?php echo $row["p_price"]; ?></td> 
     <?php echo "<td align=center>"."<img src='p_img/$row[p_img]' width='50'>"."</td>"; ?>

     <?php echo "<td><a href='product.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>edit</a></td> "; ?>
    
     <?php echo "<td><a href='product_deldb.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>del</a></td> "; ?>
   </tr>
<?php  } ?>
 </table>
