<?php
require_once('HelperClass.php');
$help = new Helper;
$help->sendMailFromKontakt($_POST["meno"], $_POST["email"], $_POST["message"]);
$response_array['status'] = "success";
header('Content-type: application/json');
echo json_encode($response_array);
?>
