<?php
$conn= mysqli_connect("localhost","root","","logadmin") 
or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");

//query
$query=mysqli_query($conn,"SELECT COUNT(p_id) FROM tbl_product  as p
INNER JOIN tbl_type as t
ON p.type_id  = t.type_id
ORDER BY p.p_id ASC");
	$row = mysqli_fetch_row($query);

	$rows = $row[0];

	$page_rows = 10;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

	$last = ceil($rows/$page_rows);

	if($last < 1){
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

	$nquery=mysqli_query($conn,"SELECT * FROM tbl_product  as p
INNER JOIN tbl_type as t
ON p.type_id  = t.type_id
ORDER BY p.p_id ASC $limit");

	$paginationCtrls = '';

	if($last != 1){

	if ($pagenum > 1) {
$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';

		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
			}
	}
}

	$paginationCtrls .= ''.$pagenum.' &nbsp; ';

	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}

if ($pagenum != $last) {
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">Next</a> ';
}
	}
?>
<!DOCTYPE html>
<html>

<head>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div style="height: 20px;"></div>
<div class="row">

    <?php foreach ( $nquery as $row_pro){ ?>
    <div class="card border-light mb-3" style="width: 15rem; background-color: #F6F6F6;">
        <img class="card-img-top" src="admin/backend/p_img/<?php echo $row_pro['p_img']?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row_pro['p_name'] ?></h5>
            <p class="card-text"><?php echo $row_pro['type_name']; ?></p>
            <h6 class="card-title">ราคา <?php echo $row_pro['p_price'] ?> บาท</h3>
                <a href="cart2.php?p_id=<?php echo $row_pro['p_id'] ?>&act=add"
                    class="btn btn-success btn-sm">สั่งซื้อ</a>
                &nbsp
                <a href="product_detail.php?id=<?php echo $row_pro['p_id'] ?>"
                    class="btn btn-light btn-sm">รายละเอียด</a>
        </div>
    </div>
    &nbsp&nbsp&nbsp
    <?php } ?>
</div>
<div class="row"> <br><br><br></div>
<div id="pagination_controls" style="
    padding-left: 500px;
"><?php echo $paginationCtrls; ?></div>


</html>

<!-- Ref : 

	https://www.sourcecodester.com/tutorials/php/11606/simple-pagination-using-phpmysqli.html

	-->