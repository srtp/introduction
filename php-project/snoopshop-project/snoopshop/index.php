<!DOCTYPE html>
<html>

<head>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/contact.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@500&display=swap" rel="stylesheet">

    <!-- Script -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>

    <!-- buttom -->
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body style="background-color: #F6F6F6;" style="overflow-y: vertical">

    <?php include("nav.php") ?>

    <!-- carousel -->
    <div style="margin-top: 81px;" class="simple-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators center">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/banner1.png">
                    <div class="carousel-caption">
                        <a href="#allProduct" style="scroll-behavior: smooth;">
                            <button class="buttons1">
                                BUY NOW!
                            </button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/banner2.png">
                    <div class="carousel-caption">
                        <a href="#allProduct" style="scroll-behavior: smooth;">
                            <button class="buttons2">
                                BUY NOW!
                            </button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/banner3.png">
                    <div class="carousel-caption">
                        <a href="#allProduct" style="scroll-behavior: smooth;">
                            <button class="buttons3">
                                BUY NOW!
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="dot"><span class="carousel-control-prev-icon" aria-hidden="true"></span></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="dot"><span class="carousel-control-next-icon" aria-hidden="true"></span></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- card-carousel -->
    <div class="container-fluid">
        <br>
        <h1 class="text-center">สินค้าแนะนำ</h1>
        <br><br>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style="height: 350px;">
                <div class="carousel-item active">
                    <div class="d-flex">
                        <a href="product_detail.php?id=1" class="w-25 ml-1"> <img src="assets/img/row.png" class="w-100 ml-1" alt="..."></a>
                        <a href="product_detail.php?id=2" class="w-25 ml-1"> <img src="assets/img/row2.png" class="w-100 ml-1" alt="..."></a>
                        <a href="product_detail.php?id=37" class="w-25 ml-1"> <img src="assets/img/row3.png" class="w-100 ml-1" alt="..."></a>
                        <a href="product_detail.php?id=39" class="w-25 ml-1"> <img src="assets/img/row4.png" class="w-100 ml-1" alt="..."></a>
                        <!-- <img src="assets/img/row3.png" class="w-25 ml-1" alt="...">
                        <img src="assets/img/row4.png" class="w-25 ml-1" alt="..."> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex">
                        <a href="product_detail.php?id=46" class="w-25 ml-1"> <img src="assets/img/r.png" class="w-100 ml-1" alt="..."></a>
                        <a href="product_detail.php?id=44" class="w-25 ml-1"> <img src="assets/img/r2.png" class="w-100 ml-1" alt="..."></a>
                        <a href="product_detail.php?id=43" class="w-25 ml-1"> <img src="assets/img/r3.png" class="w-100 ml-1" alt="..."></a>
                        <a href="product_detail.php?id=7" class="w-25 ml-1"> <img src="assets/img/r4.png" class="w-100 ml-1" alt="..."></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex">
                        <a href="product_detail.php?id=43" class="w-25 ml-1"> <img src="assets/img/r3.png" class="w-100 ml-1" alt="..."></a>
                        <a href="product_detail.php?id=46" class="w-25 ml-1"> <img src="assets/img/r.png" class="w-100 ml-1" alt="..."></a>
                        <a href="product_detail.php?id=7" class="w-25 ml-1"> <img src="assets/img/r4.png" class="w-100 ml-1" alt="..."></a>
                        <a href="product_detail.php?id=2" class="w-25 ml-1"> <img src="assets/img/row2.png" class="w-100 ml-1" alt="..."></a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>



        <!--Product-->
        <!-- <div class="col-md-1"> -->
        <?php  //include('submenu.php') 
        ?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <h1 id="allProduct" class="text-center ">สินค้าทั้งหมด</h1>
    <div class="product" style="
    margin-right: 0px;
    margin-left: 200px;
">
        <?php

        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        if ($act == 'showbytype') {
            include('rowproduct_type.php');
        } else {
            include('rowproduct.php');
        }


        ?>
    </div>

    <footer>

        <div id="carouselFooter" class="carousel slide" data-ride="carousel">
            <ol id="dot" class="carousel-indicators" style="left:200px;">
                <li data-target="#carouselFooter" data-slide-to="0" class="active"></li>
                <li data-target="#carouselFooter" data-slide-to="1"></li>
                <li data-target="#carouselFooter" data-slide-to="2"></li>
                <li data-target="#carouselFooter" data-slide-to="3"></li>
                <li data-target="#carouselFooter" data-slide-to="4"></li>
                <li data-target="#carouselFooter" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner" style="height: 200px;">
                <div class="carousel-item active">
                    <div class="infoMember">
                        <div class="imageMember">
                            <img src="assets/img/petch.png" class="rounded" />
                        </div>
                        <p class="textMember">
                            นาย เศรษฐภาคย์ ทองอยู่ รหัสนิสิต : 6130203608 <br> Chief Executive Officer SNOOPSHOP <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                            </svg> Email : Settapak.t@snoopshop.com <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                            </svg> Tel : 090-623-9552
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="infoMember">
                        <div class="imageMember">
                            <img src="assets/img/atom.png" class="rounded" />
                        </div>
                        <p class="textMember">
                            นาย ภูมิภัทร หลี่ รหัสนิสิต : 6130203489 <br> Investment Specialists <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                            </svg> Email : Phumiphat.li@snoopshop.com <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                            </svg> Tel : 092-250-6083
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="infoMember">
                        <div class="imageMember">
                            <img src="assets/img/jim.png" class="rounded" />
                        </div>
                        <p class="textMember">
                            นาย ปวิชญา สมทรง รหัสนิสิต : 6130203365 <br> Business Analyst <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                            </svg> Email : Pavichaya.so@snoopshop.com <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                            </svg> Tel : 091-035-4843
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="infoMember">
                        <div class="imageMember">
                            <img src="assets/img/sorn.png" class="rounded" />
                        </div>
                        <p class="textMember">
                            นาย สรณ์สิริ คนึงคิด รหัสนิสิต : 6130203624 <br> Investment Specialists <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                            </svg> Email : Sornsiri.kan@snoopshop.com <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                            </svg> Tel : 086-358-3082
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="infoMember">
                        <div class="imageMember">
                            <img src="assets/img/first.png" class="rounded" />
                        </div>
                        <p class="textMember">
                            นาย อนุภัทร บุญต่อ รหัสนิสิต : 6130203691 <br> Medical Social Worker <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                            </svg> Email : Anupat.b@snoopshop.com <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                            </svg> Tel : 097-225-3636
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="infoMember">
                        <div class="imageMember">
                            <img src="assets/img/kim.png" class="rounded" />
                        </div>
                        <p class="textMember">
                            นาย ธีรพันธุ์ สุวรรณพัฒน์ รหัสนิสิต : 6130203268 <br> Quantity Surveyor <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                            </svg> Email : Teeraphan.s@snoopshop.com <br>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                            </svg> Tel : 092-609-3286
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>

</body>

</html>