<?php
//1. เชื่อมต่อ database:
include('../admin/backend/connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$m_user = $_SESSION['username'];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_member WHERE m_user='$m_user' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('check.php');?>
<form  name="register" action="member_form_rwd_db.php" method="POST" class="form-horizontal">
<input type="hidden" name="m_user" value="<?php echo $m_user;?>">
       <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_user" type="text" required class="form-control" id="m_user" value="<?=$m_user;?>" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" disabled  />
          </div>
      </div> 
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_pass" type="password" required class="form-control" id="m_pass"value="<?=$m_pass;?>"  placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
      <div class="form-group">
          <div class="col-sm-5" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> บันทึก </button>
          </div>     
      </div>
      </form>