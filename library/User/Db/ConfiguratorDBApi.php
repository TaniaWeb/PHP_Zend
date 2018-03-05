<?php

require_once  'User/Db/DBApi.php';

class Configurator_DB_Api extends DB_Api
{
	private $table = "t_configurator_region";
	private $table_wish = "t_region_wish";

	public function getRegions()
	{
		$sql = "Select * from t_configurator_region where deleted<>1 order by sort";

		$result = $this->db->fetchAll($sql);
		
		return $result;
	}
	
	public function updateRegion($id, $data)
	{
	 	$where = "id='$id'";
		$bind = $data;

		$result = $this->db->update($this->table, $bind, $where);

		return $result==0?1:0;
 	}


	public function addRegionWish($data)
	{
		$result = $this->db->insert($this->table_wish, $data);

		return $result;
 	}

	public function updateRegionWish($id, $data)
	{
	 	$where = "id='$id'";
		$bind = $data;

		$result = $this->db->update($this->table_wish, $bind, $where);

		return $result==0?1:0;
 	}

 	public function getRegionWishes($region_id)
	{
   		$sql = "SELECT t_region_wish.* FROM t_region_wish where deleted<>1 and t_region_wish.region_id=$region_id ";

		$result = $this->db->fetchAll($sql);
		
		return $result;
 	}

 	public function getRegionWish($wish_id)
	{
   		$sql = "SELECT t_region_wish.* FROM t_region_wish where deleted<>1 and t_region_wish.id=$wish_id ";

		$result = $this->db->fetchAll($sql);
		
		return $result[0];
 	}

	public function removeRegionWish($id)
	{
		$where = "id='$id'";
		$this->db->delete($this->table_wish, $where);
 	}

	public function removeAllRegionWish($region_id)
	{
		$sql = "update t_region_wish set deleted=1 where region_id=".$region_id;
		$result = $this->db->query($sql);
 	}
}
?>
