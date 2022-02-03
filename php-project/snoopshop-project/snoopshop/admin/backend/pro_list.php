<?php
      include('h.php');
       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_admin ORDER BY a_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);
                ?>

<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>

  <table  class="table table-hover" id="example1" align="center"  >
  <thead class="thead-dark">
    <tr class="info">    
    <th>ID</th>
    <th>Username</th>
    <th>Name</th>
    <th>Edit</th>
    <th>Delete</th>
    <th>Password</th>
    
  </tr>
</thead>
  <?php do { ?>
  
    <tr>
      <td><?php echo $row_am['a_id']; ?></td>
      <td><?php echo $row_am['a_user']; ?></td>
      <td ><?php echo $row_am['a_name']; ?></td>
      <td><a href="adminlog.php?act=edit&ID=<?php echo $row_am['a_id']; ?>" class="btn btn-success btn-xs"> แก้ไข </a> </td>
      <td><a href="adminform_deletedb.php?ID=<?php echo $row_am['a_id']; ?>" class='btn btn-danger btn-xs'  onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
      <td><a href="adminlog.php?act=rwd&ID=<?php echo $row_am['a_id']; ?>" class="btn btn-outline-dark btn-xs"> แก้ไขรหัสผ่าน </a> </td>
    </tr>

    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
  
    </table> 