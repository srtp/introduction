<?php
session_start();
if (isset($_POST['login'])) {
    include "connect.php";
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $password = md5($password);

    $sql = "SELECT * FROM tbl_user
                  WHERE  email='" . $email . "'
                  AND  password='" . $password . "' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $_SESSION["id"] = $row["id"];
        $_SESSION["level"] = $row["level"];
        $_SESSION["email"] = $row["email"];

        if ($_SESSION["id"] != '') {

            Header("Location: home.php");
        }

    } else {
        echo "<script>";
        echo "window.location='index.php?&do=fail'";
        echo "</script>";

    }
} else {

    Header("Location: index.php"); //user & password incorrect back to login again

}