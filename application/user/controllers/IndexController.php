<?php
require_once  'User/Controller/Action.php';
require_once  'User/Db/DBApi.php';
require_once  'User/Db/UserDBApi.php';
require_once  'User/Db/ClientDBApi.php';
require_once 'User/Mail/sender.php';
require_once  'Zend/Json.php';

class User_IndexController extends User_Controller_Action
{
	public function indexAction()
    { 
    	$req 		= $this->getRequest();
		$page_action 	= $req->getParam('page_action');
		$userid 		= $req->getParam('userid');
		$client_id 		= $req->getParam('client_id');

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
					if($page_action=="beautyConfiguration")
						$this->_forward('beautyConfiguration','customer','admin', array("userid"=>$userid, "client_id"=>$client_id));
					else
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
		$this->view->page_action = $page_action;
		$this->view->userid = $userid;
		$this->view->client_id = $client_id;
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
		$points 		= $req->getParam('points');
		$finished		= 0;
		$draft 			= 0;

		$data = array(	'clientname'		=>$clientname,
						'phonenumber'		=>$phone_number,
						'email'				=>$email,
						'address'			=>$address,
						'age'				=>$age,
						'gender'			=>$gender,
						'image'				=>$image,
						'points'			=>$points,
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
		// echo $name;
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

// for rest api

	private $returnval 	= array();	

	public function loginAction()
    { 
    	$dbapi 		= new User_DB_Api;
		if(!isset($_REQUEST['username']))
		{
			echo 'username required';
			exit;
		}

		if(!isset($_REQUEST['password']))
		{
			echo 'password required';
			exit;
		}

		foreach($_REQUEST as $key =>$val)
		{
			$$key 	= $val;
		}
		$user_info 	= $dbapi->checkUser($username, $password);		

		if($user_info)
		{
			echo json_encode($user_info);
		}	
		else
		{
			$msg = 'Login Failed';
			$this->exitWith($msg);
		}
    }

	public function updateUserAction()
    { 
    	$dbapi 		= new User_DB_Api;

		if(!isset($_REQUEST['id']))
		{
			echo 'userid required';
			exit;
		}    	
		if(!isset($_REQUEST['username']))
		{
			echo 'username required';
			exit;
		}

		if(!isset($_REQUEST['password']))
		{
			echo 'password required';
			exit;
		}

		foreach($_REQUEST as $key =>$val)
		{
			$$key 	= $val;
		}

		$data = array( 	'username'		=>$username,
						'passwd'		=>md5($password));
		
		if (isset($_REQUEST['usertype']))
		{
			$data['usertype'] 		= $usertype;
		}
		if (isset($_REQUEST['fullname']))
		{
			$data['fullname'] 		= $fullname;
		}
		if (isset($_REQUEST['street']))
		{
			$data['street'] 		= $street;
		}
		if (isset($_REQUEST['postal']))
		{
			$data['postal'] 		= $postal;
		}
		if (isset($_REQUEST['city']))
		{
			$data['city'] 			= $city;
		}

		if(empty($_FILES['photo']))
		{
			$data['avatar']			= $avatar;
		}
		else
		{
			//get upload directory
			require_once 'Zend/Config/Ini.php';
			$config 	= new Zend_Config_Ini('../conf/setting.ini', 'main');
			$path 		= $config->uploadMember;

			$name 		= $_FILES['photo']['name'];

			if(strlen($name))
			{
				//update member's photo file
				list($txt, $ext) 	= explode(".", $name);
				$actual_image_name 	= "member_".$this->random_string(20).".".$ext;

// echo json_encode($path.$actual_image_name);
// exit;
				if($this->saveImage($_FILES['photo'], $path.$actual_image_name) != "")
				{									
					// echo $actual_image_name;
					// "/upload/client/".$actual_image_name;
					$data['avatar'] = "/upload/user/".$actual_image_name;
				}			
			}
		}

		$result 		= $dbapi->updateAccount($id, $data);

		if ($result == MSG_EDIT_ACCOUNT_OK)
		{
			$user_info 	= $dbapi->checkUser($username, $password);		

			if($user_info)
			{
				echo json_encode($user_info);
			}
			else
			{
				$msg = 'Login Failed';
				$this->exitWith($msg);
			}			
		}
		else
		{
			$msg = 'Update User Failed';
			$this->exitWith($msg);
		}
    }

	public function createClientAction()
    {    	
    	$clientdbapi 		= new Client_DB_Api;

		if(!isset($_REQUEST['userid']))
		{
			echo 'userid required';
			exit;
		}

		if(!isset($_REQUEST['clientname']))
		{
			echo 'clientname required';
			exit;
		}

		foreach($_REQUEST as $key =>$val)
		{
			$$key 	= $val;
		}

		$data = array( 	'userid'			=>$userid,
						'clientname'		=>$clientname);
		if (isset($_REQUEST['phonenumber']))
		{
			$data['phonenumber'] 	= $phonenumber;
		}
		if (isset($_REQUEST['email']))
		{
			$data['email'] 			= $email;
		}
		if (isset($_REQUEST['address']))
		{
			$data['address'] 		= $address;
		}
		if (isset($_REQUEST['postal']))
		{
			$data['postal'] 		= $postal;
		}
		if (isset($_REQUEST['city']))
		{
			$data['city']	 		= $city;
		}
		if (isset($_REQUEST['country']))
		{
			$data['country'] 		= $country;
		}
		if (isset($_REQUEST['birthdate']))
		{
			$data['birthdate']		= $birthdate;
		}
		if (isset($_REQUEST['gender']))
		{
			$data['gender'] 		= $gender;
		}

		if(empty($_FILES['photo']))
		{
			$data['image'] 			= $image;
		}
		else
		{
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
					// "/upload/client/".$actual_image_name;
					$data['image'] 	= "/upload/client/".$actual_image_name;
				}			
			}
		}

		$result 		= $clientdbapi->addClient($data);
		// echo $result;
		if($result > 0)
		{
			$data['id'] 	= $result;
			echo json_encode($data);
		}	
		else
		{
			$msg = 'Create Client Failed';
			$this->exitWith($msg);
		}

    }

	public function updateClientAction()
    {    	
    	$clientdbapi 		= new Client_DB_Api;

		if(!isset($_REQUEST['id']))
		{
			echo 'clientid required';
			exit;
		}

		if(!isset($_REQUEST['clientname']))
		{
			echo 'clientname required';
			exit;
		}

		foreach($_REQUEST as $key =>$val)
		{
			$$key 	= $val;
		}

		$data = array( 	'clientname'		=>$clientname);

		if (isset($_REQUEST['phonenumber']))
		{
			$data['phonenumber'] 	= $phonenumber;
		}
		if (isset($_REQUEST['email']))
		{
			$data['email'] 			= $email;
		}
		if (isset($_REQUEST['address']))
		{
			$data['address'] 		= $address;
		}
		if (isset($_REQUEST['postal']))
		{
			$data['postal'] 		= $postal;
		}
		if (isset($_REQUEST['city']))
		{
			$data['city']	 		= $city;
		}
		if (isset($_REQUEST['country']))
		{
			$data['country'] 		= $country;
		}
		if (isset($_REQUEST['birthdate']))
		{
			$data['birthdate']		= $birthdate;
		}
		if (isset($_REQUEST['gender']))
		{
			$data['gender'] 		= $gender;
		}

		if(empty($_FILES['photo']))
		{
			$data['image'] 			= $image;
		}
		else
		{
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
					// "/upload/client/".$actual_image_name;
					$data['image'] 	= "/upload/client/".$actual_image_name;
				}			
			}
		}

		$result 		= $clientdbapi->editClient($id, $data);		
		// echo $result;
		if ($result == MSG_EDIT_CLIENT_OK)
		{		
			$data['id'] 	= $id;
			echo json_encode($data);
		}	
		else
		{
			$msg = 'Update Client Failed';
			$this->exitWith($msg);
		}
    }

    public function clientsAction()
    {
    	$clientdbapi 		= new Client_DB_Api;
		if(!isset($_REQUEST['userid']))
		{
			echo 'userid required';
			exit;
		}

		foreach($_REQUEST as $key =>$val)
		{
			$$key 	= $val;
		}
		
		$clients 	= $clientdbapi->getClientsByUserId($userid);		
		
		if($clients)
		{
			echo json_encode($clients, JSON_PRETTY_PRINT);
		}	
		else
		{
			$msg 	= 'Empty Clients';
			$this->exitWith($msg);
		}
    }
	
	public function removeClientAction()
	{
		if(!isset($_REQUEST['userid']))
		{
			echo 'userid required';
			exit;
		}
		
		if(!isset($_REQUEST['clientid']))
		{
			echo 'clientid required';
			exit;
		}

		foreach($_REQUEST as $key =>$val)
		{
			$$key 	= $val;
		}

		$dbapi 			= new Client_DB_Api;
		$dbapi->deleteClient($clientid);

		$clients		= $dbapi->getClientsByUserId($userid);
		echo json_encode($clients);
	}

	public function updateClientPointsAction()
    {
		if(!isset($_REQUEST['clientid']))
		{
			echo 'clientid required';
			exit;
		}

		foreach($_REQUEST as $key =>$val)
		{
			$$key 	= $val;
		}

		$data = array( 	'points'	=>$points);

		if (isset($_REQUEST['points_count']))
		{
			$data['points_count'] 	= $points_count;
		}
		
		if(empty($_FILES['photo']))
		{			
		}
		else
		{
			//get upload directory
			require_once 'Zend/Config/Ini.php';
			$config 	= new Zend_Config_Ini('../conf/setting.ini', 'main');
			$path 		= $config->uploadClient;

			$name 		= $_FILES['photo']['name'];

			if(strlen($name))
			{
				//update member's photo file
				list($txt, $ext) 	= explode(".", $name);
				$actual_image_name 	= "configuration_".$this->random_string(20).".".$ext;

				if($this->saveImage($_FILES['photo'], $path.$actual_image_name) != "")
				{
					$data['points_image'] 	= "/upload/client/".$actual_image_name;
				}
			}
		}

		if (isset($_REQUEST['emotions_shown']))
		{
			$data['emotions_shown'] = $emotions_shown;
		}

		if (isset($_REQUEST['hairQuestions']))
		{			
			$data['hairQuestions'] 	= $hairQuestions;
		}

		$clientdbapi 				= new Client_DB_Api;
		$result						= $clientdbapi->updatePoints($clientid, $data);

		if ($result == MSG_UPDATE_POINTS_OK)
		{
			echo json_encode($result);
		}
		else
		{
			$msg 	= 'Update Client Failed';
			$this->exitWith($msg);
		}		
    }

    public function uploadClientSignatureAction()
    {
		if(!isset($_REQUEST['clientid']))
		{
			echo 'clientid required';
			exit;
		}

		foreach($_REQUEST as $key =>$val)
		{
			$$key 	= $val;
		}

		$data = array();

		if(empty($_FILES['photo']))
		{			
		}
		else
		{
			//get upload directory
			require_once 'Zend/Config/Ini.php';
			$config 	= new Zend_Config_Ini('../conf/setting.ini', 'main');
			$path 		= $config->uploadClient;

			$name 		= $_FILES['photo']['name'];

			if(strlen($name))
			{
				//update member's photo file
				list($txt, $ext) 	= explode(".", $name);
				$actual_image_name 	= "signature_".$this->random_string(20).".".$ext;

				if($this->saveImage($_FILES['photo'], $path.$actual_image_name) != "")
				{
					$data['signature'] 	= "/upload/client/".$actual_image_name;
				}
			}
		}


		$clientdbapi 			= new Client_DB_Api;
		$result					= $clientdbapi->doSign($clientid, $data);

		$this->sendConfigMail($clientid);
		if ($result == MSG_DO_SIGN_OK)
		{
			echo json_encode($result);
		}		
    }

    public function uploadClientImageAction()
    {

    }

    private function exitWith($reason)
	{
		$this->returnval['status'] = 'fail';

		$error = array();
		$error['info'] = $reason;
		$this->returnval['data'] = $error;
		echo json_encode($this->returnval);		
		// exit;
	}

	public function sendMail($recv_address, $receiver, $user_info, $client_info)
	{
		$mail = new MainSender;
		$mail->sendMail($recv_address, $receiver, $user_info, $client_info);
	}

	public function sendConfigMail($client_id) //new:0 appointment:1 finish:2
	{
		$clientdbapi 	= new Client_DB_Api;
		$userdbapi 		= new User_DB_Api;


		$client_info = $clientdbapi->getClientsById($client_id);
		$user_info = $userdbapi->getUser($client_info["userid"]);

		$admins = $userdbapi->getAllAdmins("id");
		$admin_info = $admins[0]; //$this->getUserInfo();

		$this->sendMail($client_info["email"], "client", $user_info, $client_info);
		$this->sendMail($user_info["username"], "user", $user_info, $client_info);
		$this->sendMail("configurations@aestheticpartner.de", "admin", $user_info, $client_info); 
		//$admin_info["username"]
	}
}
?>
