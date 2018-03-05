<?php
require_once  'User/Controller/Action.php';
require_once  'User/Db/DBApi.php';
require_once  'User/Db/UserDBApi.php';
require_once  'User/Db/ClientDBApi.php';

class User_IndexController extends User_Controller_Action
{
	public function indexAction()
    {    	
		if( $this->isLogined() )
		{
			if( $this->isManager() )
			{
				$this->_forward('index','index','admin',array());
			}
			else
			{
				$clientdbapi 	= new Client_DB_Api;
				$clients		= $clientdbapi->getClientsByUserId($this->getUserId());

				if (count($clients) > 0)
				{
					$this->_forward('panelproject','index','user',array());
				}
				else
				{
					$this->_forward('panel','index','user',array());
				}
			}

			return;
		}

		$req 		= $this->getRequest();
		$loginname 	= $req->getParam('username');
		$loginpwd 	= $req->getParam('password');
		
		$msg 		= '';
		$dbapi 		= new User_DB_Api;

		if( $loginname != "" )
		{
			$user_info = $dbapi->checkUser($loginname, $loginpwd);
			if($user_info)
			{
				$this->setLogined();
				$this->writeToSession("user_info", $user_info);

				if( $this->isManager() )
				{
					$this->_forward('index','index','admin',array());
				}
				else
				{
					$clientdbapi 	= new Client_DB_Api;
					$clients		= $clientdbapi->getClientsByUserId($this->getUserId());

					if (count($clients) > 0)
					{
						$this->_forward('panelproject','index','user',array());
					}
					else
					{
						$this->_forward('panel','index','user',array());
					}
				}
			}
			else
			{
				$msg = 'Login Failed';
			}
		}
		
		$this->view->msg = $msg;
    }

	public function logoutAction()
    {
		$this -> logout();
    }

	public function panelAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$this->view->user_info	= $this->getUserInfo();		
    }

	public function addClientAction()
	{
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$req 			= $this->getRequest();
		$dbapi 			= new Client_DB_Api;

		$userid 		= $this->getUserId();

		$clientname		= $req->getParam('clientname');
		$phone_number 	= $req->getParam('phone_number');
		$email			= $req->getParam('email');
		$address 		= $req->getParam('address');
		$age			= $req->getParam('age');

		$gender 		= $req->getParam('gender');
		$image			= $req->getParam('image_src');
		$points 		= "";
		$finished		= 0;
		$draft 			= 0;
		
		$data = array( 	'userid'			=>$userid,  
						'clientname'		=>$clientname,
						'phonenumber'		=>$phone_number,
						'email'				=>$email,
						'address'			=>$address,
						'age'				=>$age,
						'gender'			=>$gender,
						'image'				=>$image,
						'points'			=>$points,
						'finished'			=>$finished,
						'draft'				=>$draft );

		$result 		= $dbapi->addClient($data);

		if ($result > 0)
		{
			if( $this->isManager() )
				$this->_forward('index','index','admin',array());
			else
				// $this->_forward('panelproject','index','user',array('result'=>$result));
				$this->_forward('workspace','index','user',array('clientid'=>$result, 'created'=>true, 'mode'=>0, 'sub_mode'=>0));
		}
	}

	public function editClientAction()
	{
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$req 			= $this->getRequest();
		$dbapi 			= new Client_DB_Api;

		$clientid 		= $req->getParam('clientid');

		$clientname		= $req->getParam('clientname');
		$phone_number 	= $req->getParam('phone_number');
		$email			= $req->getParam('email');
		$address 		= $req->getParam('address');
		$age			= $req->getParam('age');

		$gender 		= $req->getParam('gender');
		$image			= $req->getParam('image_src');
		$points 		= "";
		$finished		= 0;
		$draft 			= 0;

		$data = array(	'clientname'		=>$clientname,
						'phonenumber'		=>$phone_number,
						'email'				=>$email,
						'address'			=>$address,
						'age'				=>$age,
						'gender'			=>$gender,
						'image'				=>$image,
						'finished'			=>$finished,
						'draft'				=>$draft );		

		$result 		= $dbapi->editClient($clientid, $data);

		if ($result == MSG_EDIT_CLIENT_OK)
		{
			$this->_forward('workspace','index','user',array('clientid'=>$clientid, 'created'=>false, 'mode'=>0, 'sub_mode'=>0));
		}		
	}	

	public function deleteClientAction()
	{
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$req 			= $this->getRequest();
		$dbapi 			= new Client_DB_Api;

		$clientid 		= $req->getParam('clientid');

		$dbapi->deleteClient($clientid, $data);

		$clients		= $dbapi->getClientsByUserId($this->getUserId());

		if (count($clients) > 0)
		{
			$this->_forward('panelproject','index','user',array());
		}
		else
		{
			$this->_forward('panel','index','user',array());
		}
	}

	public function panelprojectAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$clientdbapi 			= new Client_DB_Api;
		$clients				= $clientdbapi->getClientsByUserId($this->getUserId());
		
		if (count($clients) == 0)
		{
			$this->_forward('panel','index','user',array());
		}		

		$this->view->clients 	= $clients;
		$this->view->user_info	= $this->getUserInfo();
    }

	public function workspaceAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$req 					= $this->getRequest();
		$clientid 				= $req->getParam('clientid');
		$created 				= $req->getParam('created');
		$mode 					= $req->getParam('mode');
		$sub_mode				= $req->getParam('sub_mode');

		$clientdbapi 			= new Client_DB_Api;
		$client 				= $clientdbapi->getClientsById($clientid);

		$this->view->client 	= $client;
		$this->view->created 	= $created;
		$this->view->mode 		= $mode;
		$this->view->sub_mode	= $sub_mode;
		$this->view->user_info	= $this->getUserInfo();
		$this->view->points 	= $client['points'];

		date_default_timezone_set('Europe/Berlin');
		$newLocale 				= setlocale(LC_TIME, 'de_DE', 'de_DE.UTF-8');
		$date 					= (string)date('Y-m-d');

		$date 					= strftime('%d. %B %Y',strtotime($date));
		$this->view->date 		= $date;
		$this->view->signed 	= $req->getParam('signed');
    }

	public function summaryAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$req 					= $this->getRequest();
		$clientid 				= $req->getParam('clientid');

		$clientdbapi 			= new Client_DB_Api;
		$client 				= $clientdbapi->getClientsById($clientid);

		$this->view->client 	= $client;
		$this->view->user_info	= $this->getUserInfo();
		$this->view->points 	= $client['points'];
    }

	public function updatepointsAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$req 					= $this->getRequest();
		$clientid 				= $req->getParam('clientid');
		$mode	 				= $req->getParam('mode');
		$sub_mode 				= $req->getParam('sub_mode');

		$data = array( 	'points'			=>$req->getParam('points'),
						'points_count'		=>$req->getParam('points_count'),
						'points_image'		=>$req->getParam('photourl'),
						'emotions_shown'	=>$req->getParam('emotions_shown'));

		$clientdbapi 			= new Client_DB_Api;
		$result					= $clientdbapi->updatePoints($clientid, $data);

		if ($result == MSG_UPDATE_POINTS_OK)
		{
			$this->_forward('workspace','index','user',array('clientid'=>$clientid, 'created'=>false, 'mode'=>$mode, 'sub_mode'=>$sub_mode));
			// $this->_forward('workspace','index','user',array());
		}	
    }

	public function dosignAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$req 					= $this->getRequest();
		$clientid 				= $req->getParam('clientid');
		$created 				= $req->getParam('justcreated');

		$data = array( 	'signature'			=>$req->getParam('signature'));

		$clientdbapi 			= new Client_DB_Api;
		$result					= $clientdbapi->doSign($clientid, $data);

		if ($result == MSG_DO_SIGN_OK)
		{
			if ($created)
			{
				$this->_forward('workspace','index','user',array('clientid'=>$clientid, 'created'=>false, 'mode'=>0, 'sub_mode'=>0));
			}
			else 
			{
				$this->_forward('panelproject','index','user',array());
			}
		}
    }

	public function updateaccountAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		$req 			= $this->getRequest();
		$dbapi 			= new User_DB_Api;

		$userid 		= $this->getUserId();

		$fullname		= $req->getParam('fullname_input');
		$postal 	 	= $req->getParam('postal_input');
		$username		= $req->getParam('email_input');
		$street 		= $req->getParam('address_input');
		$city			= $req->getParam('city_input');

		$passwd			= $req->getParam('password_input');
		$usertype 		= 1;

		$result 		= $dbapi->editAccount($userid, $username, $passwd, $usertype, $fullname, $street, $postal, $city);

		if ($result == MSG_EDIT_ACCOUNT_OK)
		{
			$this->_forward('editaccount','index','user',array());
		}
    }

	public function editaccountAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}
		$dbapi 			= new User_DB_Api;
		$this->view->user_info	= $dbapi->getUserInfoById($this->getUserId());
    }

	public function homeAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}	
		
		$this->view->message = "USER HOME PAGE";
    }

    public function memberphotoAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}

		//get upload directory
		require_once 'Zend/Config/Ini.php';
		$config 	= new Zend_Config_Ini('../conf/setting.ini', 'main');
		$path 		= $config->uploadClient;

		$name 		= $_FILES['photo']['name'];

		if(strlen($name))
		{
			//update member's photo file
			list($txt, $ext) 	= explode(".", $name);
			$actual_image_name 	= "customer_".$this->random_string(20).".".$ext;

			if($this->saveImage($_FILES['photo'], $path.$actual_image_name) != "")
			{
				// echo $actual_image_name;
				$this->view->image_path 		= "/upload/client/".$actual_image_name;
			}			
		}
    }

    public function configurationphotoAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}
		require_once 'Zend/Config/Ini.php';
		$config 	= new Zend_Config_Ini('../conf/setting.ini', 'main');
		$path 		= $config->uploadClient;

		$img 				= $_POST['imgBase64'];
		$img 				= str_replace('data:image/png;base64,', '', $img);
		$img 				= str_replace(' ', '+', $img);

		$data 				= base64_decode($img);
		$actual_image_name 	= "configuration_".$this->random_string(20).".".'png';
		$file 				= $path.$actual_image_name;
		$success 			= file_put_contents($file, $data);

		print $success ? "/upload/client/".$actual_image_name : 'Unable to save the file.';
    }

    public function signatureimageAction()
    {
		if( !$this->isLogined() )
		{
			$this ->_forward('','','error',array());
			return;
		}
		require_once 'Zend/Config/Ini.php';
		$config 	= new Zend_Config_Ini('../conf/setting.ini', 'main');
		$path 		= $config->uploadClient;

		$img 				= $_POST['imgBase64'];
		$img 				= str_replace('data:image/png;base64,', '', $img);
		$img 				= str_replace(' ', '+', $img);

		$data 				= base64_decode($img);
		$actual_image_name 	= "signature_".$this->random_string(20).".".'png';
		$file 				= $path.$actual_image_name;
		$success 			= file_put_contents($file, $data);

		print $success ? "/upload/client/".$actual_image_name : 'Unable to save the file.';
    }
}
?>
