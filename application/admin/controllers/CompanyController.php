<?php
require_once 'User/Controller/Action.php';
require_once  'User/Db/DBApi.php';
require_once  'User/Db/UserDBApi.php';
require_once  'User/Db/CompanyDBApi.php';
require_once '../conf/messages.php';

class Admin_CompanyController extends User_Controller_Action
{
	public function listAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
			$this->forward('','','error');

		$req 					= $this->getRequest();

		$dbapi 			    	= new Company_DB_Api;

		$search = array();
		$search["company"] 		= $req->getParam("search_company");
		$search["worker"] 		= $req->getParam("search_worker");
		$search["status"] 		= $req->getParam("search_status");
		$search["orderby"] 		= $req->getParam("search_orderby");
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
		$companies			= $dbapi->getAllCompanies($search);
		$search["total_count"] = $dbapi->getCountCompanies($search);

		$this->view->search 		= $search;
		$this->view->companies 		= $companies;

		$this->view->user_info	= $this->getUserInfo();		
    		
		$this->set_menu_info();

	}

	public function addAction()
	{
		$this->set_menu_info();
	}

	public function saveAction()
	{
  	 	if( !$this->isLogined() || !$this->isManager())
			 $this->forward('','','error');

		$req 			= $this->getRequest();
		$dbapi 			= new Company_DB_Api;

		$id 			= $req->getParam("company_id");

		$data = array( 	'activated'			=>$req->getParam('activated'),
						'email'				=>$req->getParam('email'),
						'password'			=>md5($req->getParam('password')),
						'fullname'			=>$req->getParam('fullname'),
						'type'				=>$req->getParam('type'),
						'phone'				=>$req->getParam('phone')!=null?$req->getParam('phone'):"",
						'website'			=>$req->getParam('website')!=null?$req->getParam('website'):"",
						'avatar'			=>$req->getParam('avatar')!=null?$req->getParam('avatar'):"",
						'infoemail'			=>$req->getParam('infoemail')!=null?$req->getParam('infoemail'):"",
						'street'			=>$req->getParam('street')!=null?$req->getParam('street'):"",
						'postal'			=>$req->getParam('postal')!=null?$req->getParam('postal'):"",
						'city'				=>$req->getParam('city')!=null?$req->getParam('city'):"",
						'country'			=>$req->getParam('country')!=null?$req->getParam('country'):"",
						'bc_check'			=>$req->getParam('bc_check'),
						'sv_check'			=>$req->getParam('sv_check'),
						'cc_check'			=>$req->getParam('cc_check'),
						'ds_check'			=>$req->getParam('ds_check'),
						'wlc_check'			=>$req->getParam('wlc_check'),
						'frontend_language'	=>$req->getParam('frontend_language')!=null?$req->getParam('frontend_language'):"",
						'paymenttype'		=>$req->getParam('paymenttype')!=null?$req->getParam('paymenttype'):"",
						'payment_name'		=>$req->getParam('payment_name')!=null?$req->getParam('payment_name'):"",
						'payment_nachname'	=>$req->getParam('payment_nachname')!=null?$req->getParam('payment_nachname'):"",
						'payment_iban'		=>$req->getParam('payment_iban')!=null?$req->getParam('payment_iban'):"",
						'payment_geburtsdatum'	=>$req->getParam('payment_geburtsdatum')!=null?$req->getParam('payment_geburtsdatum'):"",
						'payment_phonenumber'	=>$req->getParam('payment_phonenumber')!=null?$req->getParam('payment_phonenumber'):""
						);

		if($id==null || $id==0)
			$result 		= $dbapi->addCompany($data);
		else
			$result 		= $dbapi->updateCompany($id, $data);
			
		$this->set_menu_info();

		$this->_forward('list','company','admin',array());
	}

	public function profileAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
			$this->forward('','','error');

		$req 			= $this->getRequest();
		$user_dbapi 			= new User_DB_Api;
		$company_dbapi 			= new Company_DB_Api;

		$company_id 			= $req->getParam("company_id");
		$company_info			= $company_dbapi->getCompany($company_id);
		$users					= $user_dbapi->getUsersByCompany($company_id, 'date_last_saved');
		$clients				= $company_dbapi->getClientsOfCompany($company_id, 'date_last_saved');

		$count   		= count($clients);
 		$today 			= date('Y-m-d');
 		$date2 			= date_create($today);

 		$config_info 	= array();
 		$config_info["completed"] = 0;
 		$config_info["new"] = 0;
 		$config_info["pending"] = 0;

 		for ($i = 0; $i < $count; $i++)
 		{
 			$exp = date('Y-m-d', strtotime($clients[$i]['c_date']));
 			$date1 = date_create($exp);			
		    $datediff[$i]  = date_diff($date1,$date2)->format("%a");
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
		$this->view->company_info 		= $company_info;
		$this->view->users 				= $users;
		$this->view->clients 			= $clients;
		$this->view->user_info	= $this->getUserInfo();
	
		$this->set_menu_info();
	}

	public function removeAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
			$this->forward('','','error');

		$req 			= $this->getRequest();
		$dbapi 			= new Company_DB_Api;

		// $image			= $req->getParam('image_src');
		$dbapi->removeCompany($req->getParam('id'));

		$this->set_menu_info();

		$this->_forward('list','company','admin',array());
	}

	public function editAction()
	{
    	if( !$this->isLogined() || !$this->isManager())
			$this->forward('','','error');

		$req 			= $this->getRequest();
		$dbapi 			= new Company_DB_Api;

		$company_info 	= $dbapi->getCompany($req->getParam('id'));

		$this->view->company_info = $company_info;
		$this->set_menu_info();

		$this->_forward('add','company','admin',array());
	}

	private function set_menu_info()
	{
		$this->view->page_title 	= "User / Company";
		$this->view->open_menu 		= "user_company_menu";
		$this->view->selected_menu 	= "user_companies";
	}
}
?>

