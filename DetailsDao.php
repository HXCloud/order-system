<?php
require_once("BaseDao.php");
require_once("Details.php");
require_once("MenuDao.php");

class DetailsDao extends BaseDao {
	private $menudao;
	public function __construct() {
		parent:: __construct();              //调用父类构造器
		$this->menudao = new MenuDao();
	}
	
	public function save($orderid, $menuid, $price, $quantity, $subtotal,$img) {
		$sth = $this->db->prepare("insert into orderdetails(orderid,menuid,price,quantity,subtotal,img) 
        values(:orderid,:menuid,:price,:quantity,:subtotal,:img)");
		
		$sth->bindValue(':orderid', $orderid, PDO::PARAM_INT);
		$sth->bindValue(':menuid', $menuid, PDO::PARAM_INT);
		$sth->bindValue(':price', $price, PDO::PARAM_INT);
		$sth->bindValue(':quantity', $quantity, PDO::PARAM_INT);
		$sth->bindValue(':subtotal', $subtotal, PDO::PARAM_STR);
		$sth->bindValue(':img', $img, PDO::PARAM_STR);
		$sth->execute();
		//print_r($sth->errorInfo());
	}
	
	public function findAll($orderid){
		$sql="select * from orderdetails where orderid=:orderid ";
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':orderid', $orderid, PDO::PARAM_INT);   
		$sth->execute();
		$array = array();
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$menu = $this->menudao->findById($row['menuid']);
		$details = new Details($row['id'],$row['orderid'],$row['menuid'],$row['price'],$row['quantity'],$row['subtotal'],$row['img']);
		$details->setMenu($menu);
		$array[] = $details;
		}
		//print_r($sth->errorInfo());
		//print_r($array);
		return $array;
	}
	
}
//$dao = new DetailsDao();
//$dao->save(1,1,2,60);
//$dao->findAll(1);
?>