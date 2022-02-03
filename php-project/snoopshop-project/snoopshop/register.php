<?php

session_start();

include('admin/backend/connect.php');

$errors = array();
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$address = mysqli_real_escape_string($con, $_POST['address']);
// echo "$name $username $password $phone $address"
$password = md5($password);
$sql = "INSERT INTO tbl_member(m_user, m_pass, m_name,m_tel, m_address) VALUES('$username', '$password', '$name',  '$phone', '$address')";
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
echo "success";
?>

