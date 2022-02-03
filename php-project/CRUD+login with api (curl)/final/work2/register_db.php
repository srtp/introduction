<?php

//set empty variable placeholders
$user = $password = $email = "";

//Get data from Form
$user = secure_data($_POST['user']);
$password = secure_data($_POST['password']);
$email = secure_data($_POST['email']);



//Strip html and slashes etc
function secure_data($data){
    $Sdata = trim($data);
    $Sdata = stripslashes($data);
    $Sdata = htmlspecialchars($data);
    //var_dump($Sdata);
    return $Sdata;
}

//Set up POST array
$array = array (
    "user" => $user,
    "password" => $password,
    "email" => $email
);

$data_string = json_encode($array);

var_dump ($data_string);

$url = 'http://localhost:3001/account';

//Create cURL connection
$curl = curl_init($url);

//set cURL options
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);

//Execute cURL
$curl_response = curl_exec($curl);

//Output server response
print_r($curl_response);