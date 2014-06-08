<?php

if (!cmsms()) exit;

if (!$this->CheckAccess()) {
	return $this->DisplayErrorPage($id, $params, $returnid, $this->Lang('accessdenied'));
}

$view = new MCFListView('Obsadene', $params);

$item = ObsadeneObject::getById($params['item_id']);
$item->setPublished($item->getPublished() ? 0 : 1);
$item->save();

$this->Redirect($id, 'defaultadmin', $returnid, array('view' => $view->getView()));

?>
