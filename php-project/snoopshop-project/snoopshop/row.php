<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>itOffside.com Pagination</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>
<body style="margin-top: 10px;">
<?php 
    include 'admin/backend/connect.php';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        } else {
        $page = 1;
        }
        $start = ($page - 1) * $perpage;
        $sql = "select * from tbl_product limit {$start} , {$perpage} ";
        $query = mysqli_query($con, $sql);
        ?>
        <div class="container">
        <div class="row">
        <div class="col-lg-12">
        <table class="table table-bordered table-hover">
        <thead>
        <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        </tr> 
        </thead>
        <tbody>
        <?php while ($result = mysqli_fetch_assoc($query)) { ?>
        <tr>
        <td><?php echo $result['p_id']; ?></td>
        <td><?php echo $result['p_name']; ?></td>
        <td><?php echo $result['p_price']; ?></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
        <?php
        $sql2 = "select * from tbl_product ";
        $query2 = mysqli_query($con, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
        <nav>
        <ul class="pagination">
        <li>
        <a href="row.php?page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <?php for($i=1;$i<=$total_page;$i++){ ?>
        <li><a href="row.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php } ?>
        <li>
        <a href="row.php?page=<?php echo $total_page;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
        </ul>
        </nav>
        </div>
        </div>
        </div> <!-- /container -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        </body>
        </html>