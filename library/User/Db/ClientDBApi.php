<?php

require_once  'User/Db/DBApi.php';

class Client_DB_Api extends DB_Api
{
	private $table 		= "t_client";

	public function checkClient($userName, $password)
	{
		$sql = "SELECT * FROM $this->table WHERE username='$userName' AND passwd='".md5($password)."'";
		
		$result = $this ->db->fetchRow($sql);
		return $result;
 	}

	public function addClient($data)
	{
		$result = $this->db->insert($this->table, $data);

		return $this->db->lastInsertId($this->table);
 	}

	public function editClient($clientid, $data)
	{
		$where = "id='$clientid'";

		try
		{
			$this->db->update($this->table, $data, $where);
			$message = MSG_EDIT_CLIENT_OK;
		}
		catch(Exception $e)
		{
			$message = MSG_EDIT_CLIENT_FAILED;
		}

		return $message;
 	}

	public function updateClientToFinish($clientid)
	{
		$where = "id='$clientid'";
		$data = array();
		$data["finished"] 	= 1;

		try
		{
			$this->db->update($this->table, $data, $where);
			$message = MSG_EDIT_CLIENT_OK;
		}
		catch(Exception $e)
		{
			$message = MSG_EDIT_CLIENT_FAILED;
		}

		return $message;
 	}

	public function deleteClient($id)
	{
		$where = "id='$id'";
		$data = array();
		$data["deleted"] 	= 1;

		try
		{
			$this->db->update($this->table, $data, $where);
			$message = MSG_EDIT_CLIENT_OK;
		}
		catch(Exception $e)
		{
			$message = MSG_EDIT_CLIENT_FAILED;
		}

		return $message;
		// $this->db->delete($this->table, $where);
 	}

	public function getClientsByUserId($userid)
	{
   		$sql 	= "SELECT * FROM $this->table WHERE deleted<>1 and userid='$userid'";
		$result = $this->db->fetchAll($sql);
		
		return $result;
 	}

	public function getClientsById($clientid)
	{
   		$sql 	= "SELECT * FROM $this->table WHERE id='$clientid'";

		return $this->db->fetchRow($sql);
 	}

	public function updatePoints($clientid, $data)
	{		
		$where = "id='$clientid'";

		try{
			$this->db->update($this->table, $data, $where);
			$message = MSG_UPDATE_POINTS_OK;
		}catch(Exception $e){
			$message = MSG_UPDATE_POINTS_FAILED;
		}
		return $message;
	}

	public function doSign($clientid, $data)
	{		
		$where = "id='$clientid'";

		try{
			$this->db->update($this->table, $data, $where);
			$message = MSG_DO_SIGN_OK;
		}catch(Exception $e){
			$message = MSG_DO_SIGN_FAILED;
		}
		return $message;
	}

	public function getAllClients($orderby)
	{
   		$sql = "SELECT t_client.*, t_client.phonenumber AS c_phone, t_user.phonenumber AS u_phone, t_client.date_last_saved AS c_date, t_user.date_last_saved AS u_date, t_user.fullname as fullname FROM $this->table LEFT JOIN t_user ON userid = t_user.id where deleted<>1 ORDER BY $this->table.$orderby DESC";
		$result = $this -> db ->fetchAll($sql);
		
		return $result;
 	}

 	public function getClientsByCondition($search)
	{
		$sql = "SELECT *, t_client.phonenumber AS c_phone, user.phonenumber AS u_phone, t_client.date_last_saved AS c_date, user.u_date AS u_date, user.username as username, user.avatar as avatar FROM  t_client INNER JOIN  ( select id as user_id, phonenumber, date_last_saved as u_date, fullname as username, avatar from t_user where fullname like '%".$search['user']."%' or company like '%".$search['user']."%') user ON userid = user.user_id where true ";

	  	$sql = $sql." and t_client.clientname like '%".$search["clientname"]."%' ";
	  	$sql = $sql." and t_client.address like '%".$search["location"]."%' ";

	  	if( $search['status'] == -1 )
	  		$sql = $sql . " and (deleted is null or deleted = 0 ) ";
	  	else if( $search["status"] == 1 ) //complete
	  		$sql = $sql . " and (deleted is null or deleted = 0 ) and finished=1 ";
	  	else if( $search["status"] == 0 ) //new 
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) < 2 and finished<>1 and  (deleted is null or deleted = 0 ) ";
	  	else if( $search["status"] == 2 ) //pending
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) >= 2 and finished<>1 and  (deleted is null or deleted = 0 ) ";
	  	else if( $search['status'] == 3 ) //deleted
	  		$sql = $sql . " and (deleted is not null and deleted = 1 )";

   		$sql = $sql ." order by ". $search["orderby"] . " " . $search["ordertype"];
   		$sql = $sql ." limit ". 20*$search["page"] . ", 20";

		$result = $this->db->fetchAll($sql);
		
		return $result;
 	}

	public function getCountClientsByCondition($search)
	{
		$sql = "SELECT count(*) as count_client FROM  t_client INNER JOIN  ( select id as user_id, phonenumber, date_last_saved as u_date from t_user where fullname like '%".$search['user']."%' or company like '%".$search['user']."%') user ON userid = user.user_id where true ";

	  	$sql = $sql." and t_client.clientname like '%".$search["clientname"]."%' ";
	  	$sql = $sql." and t_client.address like '%".$search["location"]."%' ";

	  	if( $search['status'] == -1 )
	  		$sql = $sql . " and (deleted is null or deleted = 0 ) ";
	  	else if( $search["status"] == 1 ) //complete
	  		$sql = $sql . " and (deleted is null or deleted = 0 ) and finished=1 ";
	  	else if( $search["status"] == 0 ) //new 
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) < 2 and finished<>1 and  (deleted is null or deleted = 0 ) ";
	  	else if( $search["status"] == 2 ) //pending
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) >= 2 and finished<>1 and  (deleted is null or deleted = 0 ) ";
	  	else if( $search['status'] == 3 ) //deleted
	  		$sql = $sql . " and (deleted is not null and deleted = 1 )";

		$result = $this->db->fetchAll($sql);

		return $result[0]["count_client"];
 	}
}
?>
