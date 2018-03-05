<?php

require_once  'User/Db/DBApi.php';

class Product_DB_Api extends DB_Api
{
	private $table_brand = "t_brand";
	private $table_product = "t_product";

	public function getBrands()
	{
		$sql = "Select $this->table_brand.* from $this->table_brand where true";

		$result = $this->db->fetchAll($sql);
		
		return $result;
	}
	
	public function updateBrand($id, $data)
	{
	 	$where = "id='$id'";
		$bind = $data;

		$result = $this->db->update($this->table_brand, $bind, $where);

		return $result==0?1:0;
 	}

	public function addBrand($data)
	{
		$result = $this->db->insert($this->table_brand, $data);

		return $this->db->lastInsertId($this->table_brand);
 	}

 	public function removeBrand($data)
 	{
		$where = "id='$id'";

		$this->db->delete($this->table_brand, $where);
 	}

	public function getProducts()
	{
		$sql = "Select * from $this->table_product where true";

		$result = $this->db->fetchAll($sql);
		
		return $result;
	}
	
	public function updateProduct($id, $data)
	{
	 	$where = "id='$id'";
		$bind = $data;

		$result = $this->db->update($this->table_product, $bind, $where);

		return $result==0?1:0;
 	}

	public function addProduct($data)
	{
		$result = $this->db->insert($this->table_product, $data);

		return $this->db->lastInsertId($this->table_product);
 	}

 	public function removeProduct($data)
 	{
		$where = "id='$id'";

		$this->db->delete($this->table_product, $where);
 	}
}
?>
