<?php 
    include 'admin/backend/connect.php';
    $limit = 48;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1)*$limit;
    $queryProduct = '';
    $resultNumProduct='';
    if(isset($_GET['productCategory'])){
        $pageProducts = $_GET['productCategory'];  
        $queryProduct = "SELECT * from tbl_products where p_id= '$pageProducts' limit $start,$limit";
        $resultNumProduct = $mysqli->query("SELECT count(p_id) as ID FROM tbl_products where p_id= '$pageProducts'");
    }
    else if(!isset($_GET['productCategory'])){
        $queryProduct = "SELECT * from tbl_products limit $start,$limit";
        $resultNumProduct = $mysqli->query("SELECT count(p_id) as ID FROM tbl_products");
    }

    $productCount = $resultNumProduct->fetch_all(MYSQLI_ASSOC);
    $total = $productCount[0]['ID'];
    $pages = ceil($total / $limit);

    $Previous = $page - 1;
 $Next = $page + 1;

    if($page > $pages){
        header('location: show_product.php?page='.$pages);
    }
    elseif ($page < 1){
        header('location: show_product.php?page=1');
    }

?>