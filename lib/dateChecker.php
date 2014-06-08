<?php
if($_POST["dateChecker"] == "true"){
	require_once('../config.php');
	$dsn = "mysql:host=".$config['db_hostname'].";port=".$config['db_port'].";unix_socket=/tmp/mariadb55.sock;dbname=".$config['db_name'];
	//$dsn = "mysql:host=".$config['db_hostname'].";dbname=".$config['db_name'];
	try{
	  $db = new PDO($dsn, $config['db_username'], $config['db_password']);
	  $db->exec("SET CHARACTER SET utf8");
	  $response_array['status'] = 'success';
	} catch (Exception $e) {
		$response_array['status'] = 'error';
	    $db->rollBack();
	}
	$response_array['osadene'] = 0;
	$sqlQueryObsadene = "SELECT je_obsadene FROM cms_module_obsadene_date WHERE dtum = '".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."'";
	$obsadene = $db->prepare($sqlQueryObsadene);
	$obsadene->execute();
	while ($row = $obsadene->fetch(PDO::FETCH_OBJ)){
		$response_array['osadene'] = (($row->je_obsadene == 1) ? 1 : 0);
	}
}else{
	$response_array['status'] = 'error';
}
header('Content-type: application/json');
echo json_encode($response_array);
?>
