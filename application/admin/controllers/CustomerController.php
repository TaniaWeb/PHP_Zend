<?php
require_once 'User/Controller/Action.php';
require_once  'User/Db/DBApi.php';
require_once  'User/Db/ClientDBApi.php';
require_once  'User/Db/UserDBApi.php';
require_once '../conf/messages.php';
require_once 'User/Mail/sender.php';
require_once  'Zend/Json.php';

class Admin_CustomerController extends User_Controller_Action
{
	public function configurationsAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}
		
		$clientdbapi 	= new Client_DB_Api;

		$req 			= $this->getRequest();
		$search = array();
		$search["clientname"] 	= $req->getParam("search_clientname");
		$search["location"] 	= $req->getParam("search_location");
		$search["user"] 		= $req->getParam("search_user");
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

		$clients				= $clientdbapi->getClientsByCondition($search);
		$search["total_count"] 	= $clientdbapi->getCountClientsByCondition($search);

		// $clients				= $clientdbapi->getAllClients('date_last_saved');

		$count   		= count($clients);
 		$today 			= date('Y-m-d');
 		$date2 			= date_create($today);

 		for ($i = 0; $i < $count; $i++)
 		{
 			$exp = date('Y-m-d', strtotime($clients[$i]['c_date']));
 			$date1 = date_create($exp);			
		    $datediff[$i]  = date_diff($date1,$date2)->format("%a");
		    if($clients[$i]['finished'] == 0)
			{
				if($datediff[$i] < 2)
			    {
			    	$clients[$i]['draft'] = 0;
			    	$new_date[] = $clients[$i]['c_date'];
			    }
			    else
			    {
			    	$clients[$i]['draft'] = 1;
			    	$pending_date[] = $clients[$i]['c_date'];

			    }
			}
			if($clients[$i]['finished'] != "")
			{
				$complete_date[] = $clients[$i]['c_date'];
			}
		    
 		}

		$this->view->search 		= $search;
		$this->view->clients 		= $clients;
		$this->view->user_info		= $this->getUserInfo();		

		$this->view->page_title 	= "Customers / Configurations";
		$this->view->open_menu 		= "customers_menu";
		$this->view->selected_menu 	= "configurations";
	}

	public function bycustomerAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}
		
		$clientdbapi 	= new Client_DB_Api;

		$req 			= $this->getRequest();
		$search = array();
		$search["clientname"] 	= $req->getParam("search_clientname");
		$search["location"] 	= $req->getParam("search_location");
		$search["user"] 		= $req->getParam("search_user");
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

		$clients			= $clientdbapi->getClientsByCondition($search);
		$search["total_count"] = $clientdbapi->getCountClientsByCondition($search);

		// $clients				= $clientdbapi->getAllClients('date_last_saved');

		$count   		= count($clients);
 		$today 			= date('Y-m-d');
 		$date2 			= date_create($today);

 		for ($i = 0; $i < $count; $i++)
 		{
 			$exp = date('Y-m-d', strtotime($clients[$i]['c_date']));
 			$date1 = date_create($exp);			
		    $datediff[$i]  = date_diff($date1,$date2)->format("%a");
		    if($clients[$i]['finished'] != 1)
			{
				if($datediff[$i] < 2)
			    {
			    	
			    	$clients[$i]['draft'] = 0;
			    	$new_date[] = $clients[$i]['c_date'];

			    }
			    else
			    {
			    	$clients[$i]['draft'] = 1;
			    	$pending_date[] = $clients[$i]['c_date'];

			    }
			}
			if($clients[$i]['finished'] == 1)
			{
				$complete_date[] = $clients[$i]['c_date'];
			}
		    
 		}

		$this->view->search 		= $search;
		$this->view->clients 		= $clients;
		$this->view->user_info		= $this->getUserInfo();		

		$this->view->page_title = "Customers / by Customer";
		$this->view->open_menu 		= "customers_menu";
		$this->view->selected_menu 	= "by_customer";
	}

	public function customerProfileAction()
	{
     	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}
		
		 $clientdbapi 	= new Client_DB_Api;
		 $userdbapi 	= new User_DB_Api;

		 $clients				= $clientdbapi->getAllClients('date_last_saved');

		 $cname = $_GET["customer"];
		 $uid = $_GET["userid"];
		 
		 $user = $userdbapi->getUser($uid);

		 $this->view->customer 	= $cname;
		 $this->view->user      = $uid;
		 $this->view->info_user = $user;
		 $this->view->clients 	= $clients;
		 $this->view->user_info	= $this->getUserInfo();		 

		$this->view->page_title = "Customers / by Customer";
		$this->view->open_menu 		= "customers_menu";
		$this->view->selected_menu 	= "by_customer";
	}

	public function beautyConfigurationAction()
	{
     	if( !$this->isLogined() || !$this->isManager())
    	{
    		$page = "beautyConfiguration";
			$uid = $_GET["userid"];
			$client_id = $_GET["client_id"];

			$this->_forward('index','index','user', array("page_action"=>$page, "userid"=>$uid, "client_id"=>$client_id));

			return;
    	}
		// http://83.169.4.108/admin/customer/beautyConfiguration?client_id=196&userid=13
		$clientdbapi 	= new Client_DB_Api;
		$userdbapi 		= new User_DB_Api;
		$clients		= $clientdbapi->getAllClients('date_last_saved');

		$cname = $_GET["customer"];
		// $uid = $_GET["userid"];
		// $client_id = $_GET["client_id"];
		$req 		= $this->getRequest();
		$uid 		= $req->getParam('userid');
		$client_id 	= $req->getParam('client_id');

		 
		$user = $userdbapi->getUserInfoById($uid);
		$client_info = $clientdbapi->getClientsById($client_id);

 		$today 			= date('Y-m-d');
 		$date2 			= date_create($today);

		$exp = date('Y-m-d', strtotime($client_info['date_last_saved']));
		$date1 = date_create($exp);			
	    $datediff  = date_diff($date1,$date2)->format("%a");
		if($datediff[$i] < 2)
	    {
	    	$client_info['pending'] = 0;
	    }
	    else
	    {
	    	$client_info['pending'] = 1;
	    }

	    if($client_info['appointment_date']!=null && $client_info['appointment_date']!="")
	    	$client_info['pending'] = 2;

		$this->view->customer 	= $cname;
		$this->view->user      	= $uid;
		$this->view->user_info1  = $user;
		$this->view->clients 	= $clients;
		$this->view->client_info= $client_info;
		$this->view->user_info	= $this->getUserInfo();		 

		$this->view->page_title = "Bueaty Configurator";
		$this->view->open_menu 		= "customers_menu";
		$this->view->selected_menu 	= "configurations";
	}

	public function tofinishAction()
	{
     	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}
	
		$clientdbapi 	= new Client_DB_Api;
		$userdbapi 		= new User_DB_Api;

		$req 			= $this->getRequest();
		$client_id   	= $req->getParam("client_id");

		$clientdbapi->updateClientToFinish($client_id);

		// $this->sendConfigMail($client_id, 2);

		$this->_forward('configurations','customer','admin',array());
	}

	public function setappointAction()
	{
     	if( !$this->isLogined() || !$this->isManager())
    	{
			$this->_forward('index','index','user');

			return;
    	}
	
		$clientdbapi 	= new Client_DB_Api;
		$userdbapi 		= new User_DB_Api;

		$req 			= $this->getRequest();
		$client_id   	= $req->getParam("client_id");
		$appointment   	= $req->getParam("appointment");

		$data = array(
				'appointment_date'	=> $appointment!=null?$appointment:""
			);

		// $clientdbapi->editClient($client_id, $data);
		$this->sendConfigMail($client_id, 1);
		
		// $this->_forward('configurations','customer','admin',array());
	}

	public function sendMail($recv_address, $receiver, $user_info, $client_info)
	{
		$mail = new MainSender;
		$mail->sendMail($recv_address, $receiver, $user_info, $client_info);
	}

	public function sendConfigMail($client_id, $status) //new:0 appointment:1 finish:2
	{
		$clientdbapi 	= new Client_DB_Api;
		$userdbapi 		= new User_DB_Api;

		$client_info = $clientdbapi->getClientsById($client_id);
		$user_info = $userdbapi->getUser($client_info["userid"]);
		$admin_info = $this->getUserInfo();

		if($status==2)
		{
			$this->sendMail($client_info["email"], "client", $user_info, $client_info);
			$this->sendMail($user_info["username"], "user", $user_info, $client_info);
			$this->sendMail("configurations@aestheticpartner.de", "admin", $user_info, $client_info);
		}
		else if($status==1)
		{
			$this->sendMail($client_info["email"], "client", $user_info, $client_info);
			$this->sendMail("configurations@aestheticpartner.de", "admin", $user_info, $client_info);
		}
	}
}
?>