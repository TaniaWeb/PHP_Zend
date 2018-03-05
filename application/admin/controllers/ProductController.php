<?php
require_once 'User/Controller/Action.php';
require_once  'User/Db/DBApi.php';
require_once  'User/Db/ConfiguratorDBApi.php';
require_once '../conf/messages.php';

class Admin_ProductController extends User_Controller_Action
{
	private function selectMenu()
	{
		$this->view->page_title = "Product Configurator";
		$this->view->open_menu 		= "product_menu";
		$this->view->selected_menu 	= "product_brandlist";
	}

 	public function brandlistAction()
	{		
		$this->selectMenu();
	}

	public function addBrandAction()
	{
		$this->selectMenu();
	}

	public function editBrandAction()
	{
		$this->selectMenu();

		$this->_forward('addBrand','product','admin',array());
	}

 	public function productlistAction()
	{		
		$this->selectMenu();
	}

	public function configureSelektierenAction()
	{	
		$dbapi 			= new Configurator_DB_Api;

		$regions			= $dbapi->getRegions();
		$count   		= count($regions);

 		for ($i = 0; $i < $count; $i++)
 		{
 			$region = $regions[$i];
 			$region_wishes = $dbapi->getRegionWishes($region["id"]);
 			$regions["$i"]["wishes"] = $region_wishes;
 		}

		$this->view->regions 		= $regions;

		$this->view->page_title = "Bueaty Configurator";
		$this->view->open_menu 		= "modules_menu";
		$this->view->selected_menu 	= "beautyconfigurator";
	}

	public function saveRegionAction()
	{
		$req 			= $this->getRequest();

		$dbapi 			= new Configurator_DB_Api;

		$region_id 		= $req->getParam('region_id');
		$region_name 	= $req->getParam('region_name');
		$region_img 	= $req->getParam('region_img_path');


		$wish_ids 		= $req->getParam('wish_ids');
		$wish_names 	= $req->getParam('wish_names');
		$wish_img_paths = $req->getParam('wish_img_paths');
		$detail_img_paths = $req->getParam('detail_img_paths');
		$wish_info1 	= $req->getParam('wish_info1');
		$wish_info2 	= $req->getParam('wish_info2');
		$wish_info3 	= $req->getParam('wish_info3');

		$data = array(
			'region_name'		=>$region_name,
			'region_img'		=>$region_img,
			);
		$result 		= $dbapi->updateRegion($region_id, $data);

		$dbapi->removeAllRegionWish($region_id);

		$count = count($wish_ids);
		for($i=0; $i<$count; $i++)
		{
			$wish_name = $wish_names[$i];
			$img = $wish_img_paths[$i];
			$detail_img = $detail_img_paths[$i];
			$data = array(
				'region_id'		=>$region_id,
				'wish_name'		=>$wish_name,
				'img'			=>$img,
				'text1'			=>$wish_info1[$i],
				'text2'			=>$wish_info2[$i],
				'text3'			=>$wish_info3[$i],
				'detail_img'	=>$detail_img,
				'deleted'		=>0
				);
			$wish_id = $wish_ids[$i];

			if($wish_id==0 || $wish_id==null)
				$result 		= $dbapi->addRegionWish($data);
			else
				$result 		= $dbapi->updateRegionWish($wish_id, $data);
		}

		$this->_forward('configureSelektieren','module','admin',array());
	}
}
?>