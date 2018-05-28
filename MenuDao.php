<?php
require_once("BaseDao.php");
require_once("Menu.php");

class MenuDao extends BaseDao {
	public function findById($id) {
		$sth = $this->db->prepare("select * from menu where id=:id");
		$sth->bindValue(':id', $id, PDO::PARAM_INT);
		$sth->execute();
		$row = $sth->fetch(PDO::FETCH_ASSOC);
		$menu = new Menu($row['id'],$row['name'],$row['price'],$row['introduce'],$row['typeid'],$row['hot'],$row['img'],$row['pubtime']);
		return $menu;
	}
	
	public function findAll(){
	 	$sth = $this->db->prepare("select * from menu where 1 order by pubtime desc");    
		$sth->execute();
		$array = array();
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$menu = new Menu($row['id'],$row['name'],$row['price'],$row['introduce'],$row['typeid'],$row['hot'],$row['img'],$row['pubtime']);
		$array[] = $menu;
		}
		//print_r($array);
		return $array;
	}
	
	public function findType($typeid){
	 	$sth = $this->db->prepare("select * from menu where typeid=:typeid order by pubtime desc");
		$sth->bindValue(':typeid', $typeid, PDO::PARAM_INT);     
		$sth->execute();
		$array = array();
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$menu = new Menu($row['id'],$row['name'],$row['price'],$row['introduce'],$row['typeid'],$row['hot'],$row['img'],$row['pubtime']);
		$array[] = $menu;
		}
		//print_r($array);
		return $array;
	}
	
	public function findHot($hot){
	 	$sth = $this->db->prepare("select * from menu where hot=:hot order by pubtime desc");
		$sth->bindValue(':hot', $hot, PDO::PARAM_STR);     
		$sth->execute();
		$array = array();
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$menu = new Menu($row['id'],$row['name'],$row['price'],$row['introduce'],$row['typeid'],$row['hot'],$row['img'],$row['pubtime']);
		$array[] = $menu;
		}
		//print_r($array);
		return $array;
	}
	
}

//$dao = new MenuDao();
//$dao->findHot(1);

?>