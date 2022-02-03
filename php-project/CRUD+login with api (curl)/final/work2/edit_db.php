<?php 
if(isset($_POST['user']))
{
    $user=$_POST['user'];
    $url = 'http://localhost:3001/account/'.$user;
    $array=array('password'=>$_POST['password']);
    $headers = array(
                        'Accept: application/json',
                        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($array));
    $result = curl_exec($ch);
    curl_close($ch);
    print_r($result);
}  

?>