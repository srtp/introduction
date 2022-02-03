<?php

session_start();

include('admin/backend/connect.php');

$errors = array();
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM tbl_member WHERE m_user ='$username' AND m_pass='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        echo $_SESSION['username'] = $username;
        echo "success";
        header('Location: index.php');
    } else {
        echo "Wrong username and password combination";
    }
}
?>
