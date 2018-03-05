<?php
require_once  'User/Controller/Action.php';
require_once  'User/Db/DBApi.php';
require_once  'User/Db/UserDBApi.php';
require_once  'User/Db/CompanyDBApi.php';
require_once  'User/Db/ClientDBApi.php';
require_once  '../conf/messages.php';

class Admin_IndexController extends User_Controller_Action
{
	public function indexAction()
    {
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}

		$dbapi 			= new User_DB_Api;
		$clientdbapi 	= new Client_DB_Api;


		$users			= $dbapi->getAllUsers('date_last_saved');

		$clients		= $clientdbapi->getAllClients('date_last_saved');

		$count   		= count($clients);
 		$today 			= date('Y-m-d');
 		$date2 			= date_create($today);
 		
 		for ($i = 0; $i < $count; $i++)
 		{
 			$exp = date('Y-m-d', strtotime($clients[$i]['c_date']));
 			$date1 = date_create($exp);			
		    $datediff[$i]  = date_diff($date1,$date2)->format("%a");
		    if($clients[$i]['signature'] == "")
			{
				if($datediff[$i] < 2)
			    {
			    	$new_date[] = $clients[$i]['c_date'];
			    	$clients[$i]['draft'] = 0;

			    }
			    else
			    {
			    	$pending_date[] = $clients[$i]['c_date'];
			    	$clients[$i]['draft'] = 1;

			    }
			}
		    
 		}

 		$free_user = 0;
 		$basic_user = 0;

 		$count  = count($users);
 		for($i=0; $i<$count; $i++)
 		{
 			$user = $users[$i];
 			if($user["account_type"]==0)
 			{
 				$basic_user += 1;
 			}
 			else
 			{
 				$free_user += 1;
 			}
 		}

 		$this->view->free_user = $free_user;
 		$this->view->basic_user = $basic_user;

		$search = array();
		$search["status"] 		= 0;
		$this->view->new = $clientdbapi->getCountClientsByCondition($search); 

		$search["status"] 		= 2;
		$this->view->pending = $clientdbapi->getCountClientsByCondition($search); 

		$search["status"] 		= 0;
		$this->view->new_user = $dbapi->getCountUsersByCondition($search); 

	    $this->view->datediff     = $datediff;
	    $this->view->new_date 	  = $new_date;
	    // $this->view->new 		  = count($new_date);
	    $this->view->pending_date = $pending_date;
	    // $this->view->pending      = count($pending_date);
		$this->view->users 		  = $users;
		$this->view->clients 	  = $clients;
		$this->view->user_info	  = $this->getUserInfo();

		$this->view->page_title 	= "Admin Dashboard";
		$this->view->selected_menu = "dashboard_menu";
    }
	
	public function logoutAction()
	{
		$this->logout();
		$this->_forward('index','index','user',array());
	}

	public function memberphotoAction()
    {
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}

		//get upload directory
		require_once 'Zend/Config/Ini.php';
		$config 	= new Zend_Config_Ini('../conf/setting.ini', 'main');
		$path 		= $config->uploadMember;

		$name 		= $_FILES['photo']['name'];
		if(strlen($name))
		{
			$dbapi 				= new User_DB_Api;

			//update member's photo file
			list($txt, $ext) 	= explode(".", $name);
			$actual_image_name 	= "member_".$this->random_string(20).".".$ext;

			if($this->resizeImage($_FILES['photo'], $path.$actual_image_name, 81, 81, true) != "")
			{
				// echo $actual_image_name;
				$this->view->image_path 		= "/upload/user/".$actual_image_name;
			}
		}		
    }

	public function configurationImageAction()
    {
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}

		//get upload directory
		require_once 'Zend/Config/Ini.php';
		$config 	= new Zend_Config_Ini('../conf/setting.ini', 'main');
		$path 		= $config->uploadConfiguration;

		$name 		= $_FILES['photo']['name'];
		if(strlen($name))
		{
			$dbapi 				= new User_DB_Api;

			//update member's photo file
			list($txt, $ext) 	= explode(".", $name);
			$actual_image_name 	= "member_".$this->random_string(20).".".$ext;

			if($this->resizeImage($_FILES['photo'], $path.$actual_image_name, 81, 81, true) != "")
			{
				// echo $actual_image_name;
				$this->view->image_path 		= "/upload/configuration/".$actual_image_name;
			}
		}		
    }
}
?>