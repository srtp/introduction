<?php
 include('admin/backend/connect.php'); 
    $query_product ="SELECT * FROM tbl_product  as p
    INNER JOIN tbl_type as t
    ON p.type_id  = t.type_id
    ORDER BY p.p_id ASC";
    $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product" . mysqli_error());
   //echo($query_product);
   //exit()
?>
<div class="row">

    <?php foreach ($result_pro as $row_pro){ ?>
    <div class="card border-light mb-3" style="width: 15rem;">
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