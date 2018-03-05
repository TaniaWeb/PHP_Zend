<?php

require_once  'User/Db/DBApi.php';

class User_DB_Api extends DB_Api
{
	private $table = "t_user";
	private $tb_payment = "t_payment";

	public function addUser($data)
	{
		$result = $this->db->insert($this->table, $data);

		return $result;
 	}

	public function updateUser($id, $data)
	{
	 	$where = "id='$id'";
		$bind = $data;
		$result = $this->db->update($this->table, $bind, $where);

		return $result==0?1:0;
 	}

 	public function getUser($user_id)
	{
   		$sql = "SELECT t_user.*, points_count FROM t_user left join (select userid, sum(points_count) as points_count from t_client group by userid) as a_client on t_user.id=a_client.userid where t_user.id=$user_id ";

		$result = $this->db->fetchAll($sql);
		
		return $result[0];
 	}


	public function removeUser($id)
	{
		$where = "id='$id'";
		$this->db->delete($this->table, $where);
 	}

	public function checkUser($userName, $password)
	{
		$sql = "SELECT * FROM $this->table WHERE activated=1 and username='$userName' AND passwd='".md5($password)."'";
		
		$result = $this -> db ->fetchRow($sql);
		return $result;
 	}

	public function getAllAdmins($orderby)
	{
   		$sql = "SELECT * FROM $this->table WHERE usertype=0 ORDER BY $orderby DESC";
		$result = $this -> db ->fetchAll($sql);
		
		return $result;
 	}
	
	public function getAllUsers($orderby)
	{
   		$sql = "SELECT * FROM $this->table WHERE usertype!=0 ORDER BY $orderby DESC";
		$result = $this -> db ->fetchAll($sql);
		
		return $result;
 	}

 	public function getUsersByCondition($search)
	{
   		$sql = "SELECT t_user.*, points_count, DATEDIFF(now(), date_last_saved) as days FROM t_user left join (select userid, sum(points_count) as points_count from t_client group by userid) as a_client on t_user.id=a_client.userid where true ";

	  	$sql = $sql." and t_user.fullname like '%".$search["username"]."%' ";
	  	$sql = $sql." and t_user.street like '%".$search["location"]."%' ";

	  	if( $search["status"] == 1 )
	  		$sql = $sql . " and t_user.activated = 1 ";
	  	else if( $search["status"] == 0 )
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) < 2 and activated=0 ";
	  	else if( $search["status"] == 2 )
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) >= 2 and activated=0 ";

   		$sql = $sql ." order by ". $search["orderby"] . " " . $search["ordertype"];
   		$sql = $sql ." limit ". 20*$search["page"] . ", 20";

		$result = $this->db->fetchAll($sql);
		
		return $result;
 	}

	public function getCountUsersByCondition($search)
	{
   		$sql = "SELECT count(*) as count_user FROM t_user left join (select userid, sum(points_count) as points_count from t_client group by userid) as a_client on t_user.id=a_client.userid where true ";

	  	$sql = $sql." and t_user.username like '%".$search["username"]."%' ";

	  	if( $search["status"] == 1 )
	  		$sql = $sql . " and t_user.activated = 1 ";
	  	else if( $search["status"] == 0 )
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) < 2 and activated=0 ";
	  	else if( $search["status"] == 2 )
	  		$sql = $sql . " and DATEDIFF(now(), date_last_saved) >= 2 and activated=0 ";

		$result = $this->db->fetchAll($sql);
		
		return $result[0]["count_user"];
 	}

	public function getUsersByCompany($company_id, $orderby)
	{
   		$sql = "SELECT * FROM $this->table WHERE company_id=$company_id and usertype!=0 ORDER BY $orderby DESC";

		$result = $this -> db ->fetchAll($sql);
		
		return $result;
 	}

	public function editAccount($userid, $username, $passwd, $usertype, $fullname, $street, $postal, $city)
	{
		$where = "id='$userid'";
		$bind = array(	'username'		=>$username,
						'passwd'		=>md5($passwd),
						'usertype'		=>$usertype,
						'fullname'		=>$fullname,
						'street'		=>$street,
						'postal'		=>$postal,
						'city'			=>$city);

		try
		{
			$this->db->update($this->table, $bind, $where);
			$message = MSG_EDIT_ACCOUNT_OK;
		}
		catch(Exception $e)
		{
			$message = MSG_EDIT_ACCOUNT_FAILED;
		}

		return $message;
 	}

	public function changePassword($no, $new)
	{
		$where = "user_no='$no'";
		$bind = array( 'user_password'=>md5($new) );
		try{
			$this->db->update($this->table, $bind, $where);
			$message = MSG_CHPASS_OK;
		}catch(Exception $e){
			$message = MSG_CHPASS_FAILED;
		}
		return $message;
	}

	public function getUserInfoById($userid)
	{
   		$sql = "SELECT * FROM $this->table where id=$userid";
		$result = $this -> db ->fetchRow($sql);
		
		return $result;
 	}

	public function updateAccount($id, $data)
	{
		$where = "id='$id'";

		try
		{
			$this->db->update($this->table, $data, $where);
			$message = MSG_EDIT_ACCOUNT_OK;
		}
		catch(Exception $e)
		{
			$message = MSG_EDIT_ACCOUNT_FAILED;
		}

		return $message;
	}

 	public function resetUsers()
 	{
 		try
		{
			$this->db->delete($this->table, "");

			for($i = 1; $i <= 50; $i++)
			{
				$data = array( 	'user_name'=>"user".$i,  
								'user_password'=>md5("asd"),
								'user_type'=>"USER",
								'user_permitted'=>"Y" );
				$this->db->insert("t_user", $data);

				$data = array( 	'user_name'=>"admin".$i,  
								'user_password'=>md5("asd"),
								'user_type'=>"ADMIN",
								'user_permitted'=>"Y" );
				$this->db->insert("t_user", $data);
			}
		}
		catch(Exception $e) { }
 	}

 	public function getClientsOfUser($user_id, $orderby)
	{
		$sql = "Select * from t_client where userid=$user_id order by $orderby DESC";

		$result = $this->db->fetchAll($sql);
		
		return $result;
	}

	public function addPayment($data)
	{
		$result = $this->db->insert($this->tb_payment, $data);

		return $result;
 	}

 	public function getMaxPaymentId()
 	{
   		$sql = "SELECT max(t_payment.id) as max_id FROM t_payment";

		$result = $this->db->fetchAll($sql);
		
		return $result[0]["max_id"];
 	}

	public function updatePayment($id, $data)
	{
	 	$where = "id='$id'";
		$bind = $data;
		$result = $this->db->update($this->tb_payment, $bind, $where);

		return $result==0?1:0;
 	}

 	public function getPayment($payment_id)
	{
   		$sql = "SELECT t_payment.* FROM t_payment where t_payment.id=$payment_id ";

		$result = $this->db->fetchAll($sql);
		
		return $result[0];
 	}

	public function removePayment($id)
	{
		$where = "id='$id'";
		$this->db->delete($this->table, $where);
 	}	
}
?>
