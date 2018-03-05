<?php
require_once 'User/Controller/Action.php';
require_once  'User/Db/DBApi.php';
require_once  'User/Db/UserDBApi.php';
require_once '../conf/messages.php';

class Admin_UserController extends User_Controller_Action
{
	public function listAction()
	{
		if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}

		$dbapi 			= new User_DB_Api;

		$req 			= $this->getRequest();

		$search = array();
		$search["username"] 	= $req->getParam("search_user");
		$search["location"] 	= $req->getParam("search_location");
		$search["status"] 		= $req->getParam("search_status");
		$search["orderby"] 		= $req->getParam("search_orderby");
		$search["ordertype"] 	= $req->getParam("search_ordertype");
		$search["page"] 		= $req->getParam("search_page");

		if($search["status"]==null || $search["status"]=="")
		{
			$search["status"] = -1;
		}
		if($search["page"]==null || $search["page"]=="")
		{
			$search["page"] = 0;
		}
		if($search["orderby"]==null || $search["orderby"]=="")
		{
			$search["orderby"] = "date_last_saved";
		}
		if($search["ordertype"]==null || $search["ordertype"]=="")
		{
			$search["ordertype"] = "DESC";
		}

		$users			= $dbapi->getUsersByCondition($search);
		$search["total_count"] = $dbapi->getCountUsersByCondition($search);

		$this->view->search 		= $search;
		$this->view->users 		= $users;
		$this->view->user_info	= $this->getUserInfo();	
    		
		$this->setPageTitle("user_users");
	}

	public function addAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}

		$this->view->page_title = "User / Company";
		$this->view->user_info	= $this->getUserInfo();		

		$this->setPageTitle("user_add");
	}

	public function saveAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}

		$req 			= $this->getRequest();
		$dbapi 			= new User_DB_Api;

		$activated = $req->getParam('activated');

		$payment_id 	= $req->getParam('payment_id');
		$payment_data = array(
				'type'	=> $req->getParam('payment_type')!=null?$req->getParam('payment_type'):"",
				'name' =>$req->getParam('payment_username')!=null?$req->getParam('payment_username'):"",
				'nachname' =>$req->getParam('payment_nachname')!=null?$req->getParam('payment_nachname'):"",
				'iban' =>$req->getParam('payment_iban')!=null?$req->getParam('payment_iban'):"",
				'geburtsdatum' =>$req->getParam('payment_geburtsdatum')!=null?$req->getParam('payment_geburtsdatum'):"",
				'phone_country' =>$req->getParam('pay_phone_country')!=null?$req->getParam('pay_phone_country'):"",
				'phone' =>$req->getParam('payment_phone')!=null?$req->getParam('payment_phone'):""
			);

		if($payment_id==0 || $payment_id==null)
		{
			$result 		= $dbapi->addPayment($payment_data);
			$payment_id 	= $dbapi->getMaxPaymentId();
		}
		else
			$result 		= $dbapi->updatePayment($payment_id, $payment_data);


		$user_id 		= $req->getParam('user_id');

		$data = array( 	'username'			=>$req->getParam('email'),
						'fullname'			=>$req->getParam('fullname'),
						'phone_country'		=>$req->getParam('phone_country')!=null?$req->getParam('phone_country'):"",
						'phonenumber'		=>$req->getParam('phone')!=null?$req->getParam('phone'):"",
						'street'			=>$req->getParam('street')!=null?$req->getParam('street'):"",
						'company'			=> $req->getParam('company')!=null?$req->getParam('company'):"",
						'website'			=>$req->getParam('website')!=null?$req->getParam('website'):"",
						'postal'			=>$req->getParam('postal')!=null?$req->getParam('postal'):"",
						'city'				=>$req->getParam('city')!=null?$req->getParam('city'):"",
						'avatar'			=>$req->getParam('avatar')!=null?$req->getParam('avatar'):"",
						'activated'			=>$req->getParam('activated')=="on"?"1":"0",
						'country'			=>$req->getParam('country')!=null?$req->getParam('country'):"",
						'account_type'		=>$req->getParam('account_type')!=null?$req->getParam('account_type'):"0",
						'bc_check'		=>$req->getParam('bc_check')!=null?"1":"0",
						'free_count'				=>$req->getParam('free_count')!=null?$req->getParam('free_count'):"",
						'language'		=>$req->getParam('language')!=null?$req->getParam('language'):"AK",
						'payment_period'		=>$req->getParam('payment_period')!=null?$req->getParam('payment_period'):"0",
						'payment_price'		=>$req->getParam('payment_price')!=null?$req->getParam('payment_price'):"0",
						'payment_id'		=> $payment_id
						);

		// $image			= $req->getParam('image_src');
		if($user_id==0 || $user_id==null)
		{
			$data['passwd'] = md5($req->getParam('password'));
			$result 		= $dbapi->addUser($data);
		}
		else
		{
			if($req->getParam('password')!=null && $req->getParam('password')!="")
				$data['passwd'] = md5($req->getParam('password'));

			$result 		= $dbapi->updateUser($user_id, $data);
		}

		$this->setPageTitle("user_users");

		$this->_forward('list','user','admin',array());
	}

	public function editAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}

		$req 			= $this->getRequest();
		$dbapi 			= new User_DB_Api;

		$user_id = $req->getParam('id');
		$user_info 	= $dbapi->getUser($user_id);
		if($user_info["payment_id"] != null && $user_info["payment_id"]!="0")
		{
			$payment = $dbapi->getPayment($user_info["payment_id"]);
			$user_info["payment"] = $payment;
		}

		$this->view->user = $user_info;
		
		$this->view->user_info	= $this->getUserInfo();
		$this->setPageTitle("user_add");

		$this->_forward('add','user','admin',array());
	}

	public function removeAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}

		$req 			= $this->getRequest();
		$dbapi 			= new User_DB_Api;

		// $image			= $req->getParam('image_src');
		$dbapi->removeUser($req->getParam('id'));

		$this->setPageTitle("user_users");
		$this->view->user_info	= $this->getUserInfo();

		$this->_forward('list','user','admin',array());
	}

	public function profileAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}

		$req 			= $this->getRequest();
		$dbapi 			= new User_DB_Api;

		$user_id = $req->getParam('user_id');
		$user 	= $dbapi->getUser($user_id);
		$clients = $dbapi->getClientsOfUser($user_id, 'date_last_saved');

		$count   		= count($clients);
 		$today 			= date('Y-m-d');
 		$date2 			= date_create($today);

 		$config_info 	= array();
 		$config_info["completed"] = 0;
 		$config_info["new"] = 0;
 		$config_info["pending"] = 0;

 		for ($i = 0; $i < $count; $i++)
 		{
 			$exp = date('Y-m-d', strtotime($clients[$i]['date_last_saved']));
 			$date1 = date_create($exp);			
		    $datediff[$i]  = date_diff($date1, $date2)->format("%a");
		    if($clients[$i]['signature'] == "")
			{
				if($datediff[$i] < 3)
			    {
			    	$clients[$i]['draft'] = 0;

			    	$config_info["new"] += $clients[$i]["points_count"];
			    }
			    else
			    {
			    	$clients[$i]['draft'] = 1;
			    	
					$config_info["pending"] += $clients[$i]["points_count"];
			    }
			}
			else if($clients[$i]['signature'] != "")
			{
				$config_info["completed"] += $clients[$i]['points_count'];
			}
 		}

		$this->view->config_info 		= $config_info;
		$this->view->clients 			= $clients;
		$this->view->user 				= $user;

		$this->setPageTitle("user_users");
		$this->view->user_info	= $this->getUserInfo();
	}

	private function setPageTitle($selected_menu)
	{
		$this->view->page_title = "User / Company";
		$this->view->open_menu 		= "user_company_menu";
		$this->view->selected_menu 	= $selected_menu;
	}
}
?>