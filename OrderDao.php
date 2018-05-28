<?php
require_once("BaseDao.php");
require_once("Order.php");

class OrderDao extends BaseDao {

	public function save($userid, $total) {
		$sth = $this->db->prepare("insert into orders(userid,total,pubtime) values(:userid,:total,NOW())");
		$sth->bindValue(':userid', $userid, PDO::PARAM_INT);
		$sth->bindValue(':total', $total, PDO::PARAM_STR);
		$sth->execute();
		return $this->db->lastInsertId();          //返回最后插入行的ID
	}
	
	public function findByDate($userid,$starttime,$endtime) {
		$sth = $this->db->prepare("select * from orders where userid=:userid and pubtime between :starttime and :endtime'23:59:59' order by pubtime desc");
		$sth->bindValue(':userid', $userid, PDO::PARAM_INT);   
		$sth->bindValue(':starttime', $starttime, PDO::PARAM_STR);
		$sth->bindValue(':endtime', $endtime, PDO::PARAM_STR);
		$sth->execute();
		$array = array();
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$order = new Order($row['id'],$row['userid'],$row['total'],$row['pubtime']);
		$array[] = $order;
		}
		return $array;
	}

	public function findAll($userid){     
		$sth = $this->db->prepare("select * from orders where userid=:userid order by pubtime desc"); 
		$sth->bindValue(':userid', $userid, PDO::PARAM_INT);   
		$sth->execute();
		$array = array();
		while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$order = new Order($row['id'],$row['userid'],$row['total'],$row['pubtime']);
		$array[] = $order;
		}
		//print_r($array);
		return $array;
	}
	
	
}
//$dao = new OrderDao();
//$dao->save(1,200);
//$dao->findAll(1);
//$dao->findByDate('2017-06-08','2017-06-11');
?>