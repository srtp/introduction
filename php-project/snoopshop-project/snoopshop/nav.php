<!--เก็บ session -->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php require_once('admin/backend/connect.php');

	$query_type = "SELECT * FROM tbl_type ORDER BY type_id ASC";
	$result_type =mysqli_query($con, $query_type) or die ("Error in query: $query_type " . mysqli_error());
		// echo($query_type);
		// exit()

?>

<head>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@500&display=swap" rel="stylesheet">

    <!-- Script -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- buttom -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
    $(document).ready(function() {
        $("#btnSubmitLogin").click(function() {
            var usernameText = $("#username").val().trim()
            var passwordText = $("#password").val().trim()
            if (!usernameText) {
                $("#errorMessage").text("Please enter username.")
            } else if (!passwordText) {
                $("#errorMessage").text("Please enter password.")
            } else {
                $.ajax({
                    type: "POST",
                    url: 'login.php',
                    data: {
                        username: usernameText,
                        password: passwordText,
                    },
                    success: function(response) {
                        if (response.indexOf("success") != -1) {
                            $("#exampleModal").modal("hide")
                            $("#username").val("")
                            $("#password").val("")
                            $("#errorMessage").text("")
                            $("#btnLogin").hide()
                            $("#btnSignUp").hide()
                            location.reload();
                        } else {

                            $("#errorMessage").text(response)
                        }
                    }
                });
            }
        })

        $("#btnSubmitRegister").click(function() {
            var regex = new RegExp("^[a-zA-Z0-9]+$");
            var nameText = $("#regname").val().trim()
            var usernameText = $("#regusername").val().trim()
            var passwordText = $("#regpassword").val().trim()
            var conPasswordText = $("#regConPassword").val().trim()
            var phoneText = $("#regphone").val().trim()
            var addressText = $("#regaddress").val().trim()
            if (!nameText) {
                $("#errorMessageReg").text("Please enter your name.")
            } else if (!usernameText) {
                $("#errorMessageReg").text("Please enter your username.")
            } else if (!regex.test(usernameText)) {
                $("#errorMessageReg").text("Please enter your username. (a-z, A-Z, 0-9)")
            } else if (!passwordText) {
                $("#errorMessageReg").text("Please enter your password.")
            } else if (!conPasswordText) {
                $("#errorMessageReg").text("Please confirm your password.")
            } else if (passwordText != conPasswordText) {
                $("#errorMessageReg").text("Please check your password.")
            } else if (!phoneText) {
                $("#errorMessageReg").text("Please enter your phone.")
            } else if (!addressText) {
                $("#errorMessageReg").text("Please enter your address.")
            } else {
                $.ajax({
                    type: "POST",
                    url: 'register.php',
                    data: {
                        name: nameText,
                        username: usernameText,
                        password: passwordText,
                        phone: phoneText,
                        address: addressText,
                    },
                    success: function(response) {
                        if (response.indexOf("success") != -1) {
                            Swal.fire(
                                'Register Success!',
                                "Let's Shopping Now!",
                                'success'
                            )
                            $("#RegisterModal").modal("hide")
                            $("#errorMessage").text("")
                        } else {
                            $("#errorMessage").text("Register Error")
                        }
                    },
                    error: function(jqXHR, text, error) {
                        $("#errorMessage").text("Register Error")
                    }
                })
            }
        })
    })
    </script>

</head>

<body style="background-color: #F6F6F6;">

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light navigation-button" style="padding: 13px;">
        <a class="navbar-brand">
            <img src="assets/img/Logo.png" width="45" height="45" style="margin-left: 200px;"></a>
        <a class="navbar-brand" href="index.php">SNOOPSHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- nav -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-right: 60px;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/snoopshop/">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/snoopshop/#carouselFooter" style="scroll-behavior: smooth;">ติดต่อเรา</a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สินค้า</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="#">อาหารสุนัข</a> -->
                        <?php foreach ($result_type as $row )  { ?>
                        <a href="http://localhost/snoopshop/index.php?act=showbytype&type_id=<?php echo $row['type_id'];?>" class="dropdown-item">
                            <?php echo $row["type_name"]; ?></a>

                        <?php } ?>

                    </div>
                </li>
            </ul>
            <!-- ประกาศค่า session ที่เก็บมา -->
            <p style="height: 10px;margin-right: 5px;"><?php /*
            
            if(isset($_SESSION['username'])){
                echo"คุณ ";
                echo $_SESSION['username'];
            }
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
            }
            */
                                                        ?></p>
            <?php if (isset($_SESSION['username'])) { ?>
            <div class="btn-group">
                <button disabled type="button" class="btn btn-light btn-sm ">
                    <?php
                        if (isset($_SESSION['username'])) {
                            echo "คุณ ";
                            echo $_SESSION['username'];
                        }
                        if (isset($_SESSION['success'])) {
                            echo $_SESSION['success'];
                        }
                        ?>
                </button>
                <button type="button" class="btn btn-light btn-sm dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://localhost/snoopshop/member/index.php">ประวัติการสั่งซื้อ</a>
                    <a class="dropdown-item"
                        href="http://localhost/snoopshop/member/index.php?act=edit&do=member_token=71924e69065269ba453232bb7d49989b">จัดการโปรไฟล์</a>
                    <a class="dropdown-item"
                        href="http://localhost/snoopshop/member/index.php?act=pwd&do=member_token=84307c4df1cb2cf0eb5000a8e497aa38">แก้ไขรหัสผ่าน</a>
                    <!--<a class="dropdown-item" href="#"></a>-->

                </div>
                <?php } ?>
                <span class="navbar-text actions">
                    <?php if (!isset($_SESSION['username'])) { ?>
                    <a id="btnLogin" href="#" class="btn btn-light action-button login" role="button"
                        data-toggle="modal" data-target="#exampleModal">Log In</a>
                    <a id="btnSignUp" href="#" class="btn btn-light action-button reg" role="button" data-toggle="modal"
                        data-target="#RegisterModal">Sign Up</a>
                    <?php } ?>
                    <?php if (isset($_SESSION['username'])) { ?>
                    <a id="btnlogout" href="logout.php" class="btn btn-light btn-sm" role="button">Log out</a><?php } ?>
                    <a href="cart2.php?act" class="countcart">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-basket" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                        </svg>
                        <span href="cart2.php" class="badge">
                            <?php
                            if (!empty($_SESSION['cart'])) {
                                echo array_reduce(
                                    $_SESSION['cart'],
                                    function ($v1, $v2) {
                                        return $v1 + $v2;
                                    }
                                );
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                    </a>
                </span>
            </div>
    </nav>

    <!-- Modal-Login -->
    <div name="modaltest" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="m_user" id="username"
                            aria-describedby="usernameHelp" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="m_pass" id="password"
                            placeholder="Enter Password">
                    </div>
                    <small class="text-danger" id="errorMessage"></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button id="btnSubmitLogin" name="login_user" type="button" class="btn btn-success">Login</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-Register -->
    <div class="modal fade" id="RegisterModal" tabindex="-1" aria-labelledby="RegisterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="RegisterModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <form> -->
                    <div class="form-group">
                        <label for="regname">First name - Last name</label>
                        <input type="text" class="form-control" id="regname" aria-describedby="usernameHelp"
                            placeholder="Your name">
                    </div>
                    <div class="form-group">
                        <label for="regusername">Username</label>
                        <input type="text" class="form-control" id="regusername" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="regpassword">Password</label>
                        <input type="password" class="form-control" id="regpassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="regConPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="regConPassword" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="regphone">Phone</label>
                        <input type="tel" class="form-control" id="regphone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="regaddress">Address</label>
                        <textarea type="text" class="form-control" id="regaddress" placeholder="Address"></textarea>
                    </div>
                    <small class="text-danger" id="errorMessageReg"></small>
                    <!-- </form> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnSubmitRegister" class="btn btn-primary">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>