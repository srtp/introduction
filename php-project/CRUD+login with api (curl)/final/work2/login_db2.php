<?php 
session_start();
@$get_data=file_get_contents('http://localhost:3001/account/');
    $list_account =json_decode($get_data);
    foreach($list_account as $user){
    $email2=$user->email;
    $password2=$user->password;




    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = ($_POST['password']);{
            if($email==$email2&&$password==$password2){
                $_SESSION["email"] = $email;
                if ($_SESSION["email"] != '') {

                    Header("Location: home.php");
                }
            }
            else {
                echo "<script>";
                echo "window.location='index.php?&do=fail'";
                echo "</script>";
        }
        }
    }

}




?>