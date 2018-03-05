<?php

require_once  'User/Db/DBApi.php';

class Company_DB_Api extends DB_Api
{
	private $table = "t_company";

	public function addCompany($data)
	{
		$result = $this->db->insert($this->table, $data);

		return $result;
 	}

	public function updateCompany($id, $data)
	{
	 	$where = "id='$id'";
		$bind = $data;

		$result = $this->db->update($this->table, $bind, $where);

		return $result==0?1:0;
 	}

	public function removeCompany($id)
	{
	 	$where = "id='$id'";
		$bind = array( 'removed' => 1 );

		$this->db->update($this->table, $bind, $where);
 	}

	public function getCompany($company_id)
	{
   		$sql = "SELECT t_company.*, a_user.user_count, a_user.points_count, DATEDIFF(now(), date_last_saved) AS days from t_company left join (select company_id, count(*) as user_count, sum(points_count) as points_count from t_user left join  (select userid, sum(points_count) as points_count from t_client group by userid) a_client on a_client.userid=t_user.id group by company_id) as a_user on t_company.id = a_user.company_id where t_company.id=".$company_id;

		$result = $this->db->fetchAll($sql);
		
		return $result[0];
 	}

	public function getClientsOfCompany($company_id, $orderby)
	{
		$sql = "Select * from t_client inner join ( select t_user.id as id from t_user where company_id=".$company_id." ) as a_user on t_client.userid = a_user.id order by $orderby DESC";

		$result = $this->db->fetchAll($sql);
		
		return $result;
	}

	public function getAllCompanies($search)
	{
   		$sql = "SELECT t_company.*, a_user.user_count, a_user.points_count, DATEDIFF(now(), date_last_saved) AS days from t_company left join (select company_id, count(*) as user_count, sum(points_count) as points_count from t_user left join  (select userid, sum(points_count) as points_count from t_client group by userid) a_client on a_client.userid=t_user.id group by company_id) as a_user on t_company.id = a_user.company_id where t_company.removed=0 ";

	  	$sql = $sql." and t_company.fullname like '%".$search["company"]."%' ";

	  	if( $search["status"] == 1 )
	  		$sql = $sql . " and t_company.activated = 1 ";
	  	else if( $search["status"] == 0 )
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) < 3 and activated=0 ";
	  	else if( $search["status"] == 2 )
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) >= 3 and activated=0 ";

   		$sql = $sql ." order by ". $search["orderby"] . " DESC";
   		$sql = $sql ." limit ". 20*$search["page"] . ", 20";

		$result = $this->db->fetchAll($sql);
		
		return $result;
 	}

	public function getCountCompanies($search)
	{
   		$sql = "SELECT count(*) as count_company from t_company left join (select company_id, count(*) as user_count, sum(points_count) as points_count from t_user left join  (select userid, sum(points_count) as points_count from t_client group by userid) a_client on a_client.userid=t_user.id group by company_id) as a_user on t_company.id = a_user.company_id where  t_company.removed=0  ";

	  	$sql = $sql." and t_company.fullname like '%".$search["company"]."%' ";

	  	if( $search["status"] == 1 )
	  		$sql = $sql . " and t_company.activated = 1 ";
	  	else if( $search["status"] == 0 )
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) < 3 and activated=0 ";
	  	else if( $search["status"] == 2 )
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) >= 3 and activated=0 ";

		$result = $this->db->fetchAll($sql);
		
		return $result[0]["count_company"];
 	}

	public function getCompanyInfoById($companyid)
	{
   		$sql = "SELECT * FROM $this->table where id=$companyid";
		$result = $this -> db ->fetchRow($sql);
		
		return $result;
 	}
}
?>
