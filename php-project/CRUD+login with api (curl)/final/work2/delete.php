<?php
	$delete_id = $_GET['delete_id'];
 // delete localhost/account/{user}
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost:3001/account/".$delete_id);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    Header("Location: home.php");
 
?>