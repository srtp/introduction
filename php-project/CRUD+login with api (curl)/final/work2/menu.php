<?php error_reporting( error_reporting() & ~E_NOTICE );?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>E-DOCUMENT</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="header__img">
            <img src="assets/img/icon2.png" alt="" align="center">
        </div>
         
        <input type="button" name="login" value="เอกสารค้างรับ" class="button_info" onclick="location.href='menu.php?act=newdoc'">
        <input type="button" name="login" value="เอกสารของฉัน" class ="button_info2" onclick="location.href='menu.php?act=mydoc'">
        
        
        
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class='bx bxs-folder' style='color:#ffffff'></i>
                    <span class="nav__logo-name">E-DOCUMENT</span>
                </a>

                <div class="nav__list">
                    <a href="#" class="nav__link active">
                        <i class='bx bxs-home' style='color:#ffffff'></i>
                        <span class="nav__name">หน้าแรก</span>
                    </a>

                    <a href="member.php" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">จัดการผู้ใช้งาน</span>
                    </a>

                    <a href="add_document.php" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">เพิ่มเอกสาร</span>
                    </a>

                    <a href="manage_level.php" class="nav__link">
                        <i class='bx bx-bookmark nav__icon'></i>
                        <span class="nav__name">จัดการแผนก</span>
                    </a>

                    <a href="#" class="nav__link">
                        <i class='bx bx-folder nav__icon'></i>
                        <span class="nav__name">Data</span>
                    </a>

                    <a href="#" class="nav__link">
                        <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                        <span class="nav__name">Analytics</span>
                    </a>
                </div>
            </div>

            <a href="logout.php" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>
    <?php
            $act = @$_GET['act'];
            if($act == 'mydoc'){
            include('mydoc.php');
            }elseif ($act == 'newdoc') {
            include('new_doc.php');
            }
            elseif ($act == 'notread') {
                include('notread.php');
                }
            elseif ($act == 'mailbox') {
                include('mailbox.php');
                }
            ?>

    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js"></script>
</body>

</html>