<?php
//error_reporting( E_ALL );
//ini_set('display_errors', 1);
require_once('HelperClass.php');
$help = new Helper;
require_once '../config.php';
$dsn = "mysql:host=".$config['db_hostname'].";port=".$config['db_port'].";unix_socket=/tmp/mariadb55.sock;dbname=".$config['db_name'];
//$dsn = "mysql:host=".$config['db_hostname'].";dbname=".$config['db_name'];
try{  
	$db = new PDO($dsn, $config['db_username'], $config['db_password']);                              
	$db->exec("SET CHARACTER SET utf8");
}catch (Exception $e) {
	echo "Failed: " . $e->getMessage();
  	$db->rollBack();
}
$status = "success";
$begin = new DateTime( date("Y-m-d", strtotime($_POST["prichod"])) );
$end = new DateTime( date("Y-m-d", strtotime($_POST["odchod"])) );
$end->modify('+1 day');

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);

foreach ( $period as $dt ){
	$sql = "SELECT je_obsadene FROM cms_module_obsadene_date where dtum = '".$dt->format( "Y-m-d" )."'";
	$res = $db->prepare($sql);
	$res->execute();
	while ($row = $res->fetch(PDO::FETCH_OBJ)){
		if($row->je_obsadene == 1){
			$status = "error";
		}
	}
}
if($status != "error"){
	foreach ( $period as $dt ){
		$sql = "SELECT je_obsadene FROM cms_module_obsadene_date where dtum = '".$dt->format( "Y-m-d" )."'";
		$res = $db->prepare($sql);
		$res->execute();
		$isUpdated = false;
		while ($row = $res->fetch(PDO::FETCH_OBJ)){
			if($row->je_obsadene == 0){
				$isUpdated = true;
				$queryUpdate = "UPDATE cms_module_obsadene_date 
					SET je_obsadene = 1,        
		        	updated_at = NOW(),
		        	updated_by = 'client',
		        	published = 1
		        	WHERE dtum = '".$dt->format( "Y-m-d" )."'";
		    	$res = $db->prepare($queryUpdate);
		    	$res->execute();
			}
		}
		if(!$isUpdated){
			$queryInsert = "INSERT INTO cms_module_obsadene_date
		      		SET dtum = '".$dt->format( "Y-m-d" )."',
		        	je_obsadene = 1,        
		        	updated_at = NOW(),
		        	updated_by = 'client',
		        	published = 1";
		    	$res = $db->prepare($queryInsert);
		    	$res->execute();
		}
	}
	//$cisloObjednavky = $help->sendMailToClient(date("j.n.Y", strtotime($_POST["prichod"])), date("j.n.Y", strtotime($_POST["odchod"])), $_POST["dospeli"], $_POST["deti"], $_POST["lyoness"], $_POST["email"]);
	$cisloObjednavky = explode(' ',microtime());
	$help->sendMailToAdmin($_POST["meno"], $_POST["adresa"], $_POST["number"], $_POST["email"], date("j.n.Y", strtotime($_POST["prichod"])), 
							date("j.n.Y", strtotime($_POST["odchod"])), $_POST["lyoness"], $_POST["dospeli"], $_POST["deti"], $_POST["poznamka"],$cisloObjednavky);
	$status = "success";
}
$response_array['status'] = $status;
header('Content-type: application/json');
echo json_encode($response_array);
?>