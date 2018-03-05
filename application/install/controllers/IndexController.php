<?php
phpinfo();
exit;
require_once 'User/Controller/Action.php';
class Install_IndexController extends User_Controller_Action
{
	public function indexAction()
    {
		$this -> view -> message = "자료기지를 설치하시려면 \"자료기지 설치\"단추를 눌러주십시오.";

    }
}

?>