<?php
require_once("BaseDao.php");
require_once("Cart.php");

class CartDao extends BaseDao {
	
	public function saveCart($sessuid, $menuid,$name,$price,$number,$img) {
		$cart = $this->findByUser($sessuid,$menuid);
			if($cart->getId() != "" && $cart->getId() > 0 ) {
					$this->update($cart->getId(),$number);
			}else{   //不存在就保存
				$this->save($sessuid, $menuid,$name,$price,$number,$img);
			}
	}
	
	public function findByUser($userid,$menuid){      //根据用户查询
		$sql="select * from cart where userid=:userid and menuid=:menuid ";
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':userid', $userid, PDO::PARAM_INT);
		$sth->bindValue(':menuid', $menuid, PDO::PARAM_INT);
		$sth->execute();
		$row = $sth->fetch(PDO::FETCH_ASSOC);
		$cart = new Cart($row['id'],$row['userid'],$row['menuid'],$row['name'],$row['price'],$row['number'],$row['img'],$row['pubtime']);
		return $cart;
	}
	
	public function findAll($userid){
		$sql="select * from cart where userid=:userid order by pubtime desc";
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':userid', $userid, PDO::PARAM_INT);   
		$sth->execute();
		$array = array();
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){
			$cart = new Cart($row['id'],$row['userid'],$row['menuid'],$row['name'],$row['price'],$row['number'],$row['img'],$row['pubtime']);
			$array[] = $cart;
		}
		//print_r($array);
		return $array;
	}
	
	public function save($userid, $menuid, $name,$price,$number,$img) {
		$sth = $this->db->prepare("insert into cart(userid,menuid,name,price,number,img,pubtime) values(:userid,:menuid,:name,:price,:number,:img,NOW())");
		$sth->bindValue(':userid', $userid, PDO::PARAM_INT);
		$sth->bindValue(':menuid', $menuid, PDO::PARAM_INT);
		$sth->bindValue(':name', $name, PDO::PARAM_STR);
		$sth->bindValue(':price', $price, PDO::PARAM_INT);
		$sth->bindValue(':number', $number, PDO::PARAM_INT);
		$sth->bindValue(':img', $img, PDO::PARAM_STR);
		$sth->execute();
		return $this->db->lastInsertId();          //返回最后插入行的ID
	}
	
	public function findMoney($userid){
		$sql="select sum(price*number) as total from cart where userid=:userid";
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':userid', $userid, PDO::PARAM_INT);   
		$sth->execute();
		$row = $sth->fetch(PDO::FETCH_ASSOC);
		return $row['total'];
	}
	public function update($id,$number) {
		$sth = $this->db->prepare("update cart set number=number+:number where id=:id");
		$sth->bindValue(':number', $number, PDO::PARAM_INT);
		$sth->bindValue(':id', $id, PDO::PARAM_INT);
		$sth->execute();
	}
	
	public function jian($id) {
		$sth = $this->db->prepare("update cart set number=number-1 where id=:id and number>1");
		$sth->bindValue(':id', $id, PDO::PARAM_INT);
		$sth->execute();
	}
	
	public function jia($id) {
		$sth = $this->db->prepare("update cart set number=number+1 where id=:id");
		$sth->bindValue(':id', $id, PDO::PARAM_INT);
		$sth->execute();
	}
	
	public function delete($id) {
		$sth = $this->db->prepare("delete from cart where id=:id");
		$sth->bindValue(':id', $id, PDO::PARAM_INT);
		$sth->execute();
		//print_r($sth->errorInfo());       //输出错误
	}
	
	public function delCart($userid) {
		$sth = $this->db->prepare("delete from cart where userid=:userid");
		$sth->bindValue(':userid', $userid, PDO::PARAM_INT);
		$sth->execute();
		//print_r($sth->errorInfo());       //输出错误
	}

}
//$dao = new CartDao();
//$dao->findMoney(1);
//$dao->saveCart(1,1,'芒果星冰乐',30,1,'img/mango.jpg');
//$dao->findAll(2);
?>