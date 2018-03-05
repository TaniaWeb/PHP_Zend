<?php
/** Zend_Controller_Action */
require_once 'User/Controller/Action.php';
require_once 'User/Db/DBApi.php';
class IndexController extends User_Controller_Action
{
  	public function indexAction()
    {
		$this->_forward('index', 'index', 'user', array());
    }
}
?>