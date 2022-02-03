<?php
session_start();
include 'connect.php';

if(array_key_exists('docfile', $_FILES) && array_key_exists('error', $_FILES['docfile']));

    $no_doc = mysqli_real_escape_string($conn, $_POST['No_doc']);
    $run_no = mysqli_real_escape_string($conn, $_POST['run_no']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $from_doc = mysqli_real_escape_string($conn, $_POST['from_doc']);
    $to_doc = mysqli_real_escape_string($conn, $_POST['to_doc']);
    $sendrub_doc = mysqli_real_escape_string($conn, $_POST['sendrub_doc']);
    $topic = mysqli_real_escape_string($conn, $_POST['topic']);
    $in_out_doc = mysqli_real_escape_string($conn, $_POST['in_out_doc']);
    $act = mysqli_real_escape_string($conn, $_POST['act']);
    $more = mysqli_real_escape_string($conn, $_POST['more']);
    $email =  $_SESSION['email'];
    
    $date1=date("Ymd_his");
$numrand=(mt_rand());

$docfile = (isset($_POST['docfile']) ?$_POST['docfile'] : '');
$file = $_FILES['docfile'];
$upload= $file;

if($upload !=''){
    $path= "/img/docfile000/";
    $type = strrchr($_FILES['docfile']['name'],".");
    $newname='doc'.$numrand.$date1.$type;
    $path_copy=$path.$newname;
    $path_link="/img/docfile000/".$newname;
    move_uploaded_file($_FILES['docfile']['tmp_name'],$path_copy);

} else{
    $newname='';
}




    
        $sql = "INSERT INTO tbl_doc (no_doc,run_no,date,from_doc,to_doc,sendrub_doc,topic,in_out_doc,act,more,fileupload,email,status) 
        VALUES ('$no_doc','$run_no','$date','$from_doc','$to_doc','$sendrub_doc','$topic','$in_out_doc','$act','$more','$newname','$email','2')";
        mysqli_query($conn, $sql);
    
