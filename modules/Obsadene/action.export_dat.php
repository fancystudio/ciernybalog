<?php
if (!cmsms()) exit;

if (!$this->CheckAccess('Admin Obsadene')) {
	return $this->DisplayErrorPage($id, $params, $returnid, $this->Lang('accessdenied'));
}

$datas = array();

// Main entries
$datas['Obsadene'] = Obsadene::ExportDatas();

header('Content-type: text/plain');
header('Content-Disposition: attachment; filename="Obsadene.dat"');
echo serialize($datas);
exit;