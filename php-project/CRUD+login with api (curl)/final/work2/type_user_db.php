<?php
session_start();
include 'connect.php';
$errors = array();

if (isset($_POST['type'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);


    if (empty($name)) {
        array_push($errors, "กรุณากรอกชื่อ-นามสกุล");
    }
    $type_check_query = "SELECT * FROM tbl_type WHERE type_name = '$name'";
    $query = mysqli_query($conn, $type_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['type_name'] === $name) {
            array_push($errors, "อีเมล์นี้ถูกใช้งานแล้ว");
        }
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO tbl_type (type_name) VALUES ('$name')";
        mysqli_query($conn, $sql);
        $_SESSION['email'] = $name;
        $_SESSION['success'] = "You are now logged in";
        header('location:home.php');
    }
}