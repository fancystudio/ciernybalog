<?php
if (!cmsms()) exit;

if (!$this->CheckAccess('Admin Obsadene')) {
	return $this->DisplayErrorPage($id, $params, $returnid, $this->Lang('accessdenied'));
}

$datas = array();

// Main entries
$c = new MCFCriteria();
$entries = ObsadeneObject::doSelect($c);

header('Content-type: text/plain');
header('Content-Disposition: attachment; filename="Obsadene_entries.dat"');
echo base64_encode(serialize($entries));
exit;