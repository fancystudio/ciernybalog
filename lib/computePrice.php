<?php
require_once('HelperClass.php');
$help = new Helper;
$price = $help->getPrice($_POST["prichod"], $_POST["odchod"], $_POST["dospeli"], $_POST["deti"], $_POST["lyoness"]);
$response_array['price'] = $price; 
header('Content-type: application/json');
echo json_encode($response_array);
?>
