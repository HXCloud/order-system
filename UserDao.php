<?php
require_once("BaseDao.php");
require_once("User.php");

class UserDao extends BaseDao {
	
	public function findById($id) {
		$sth = $this->db->prepare("select * from user where id=:id");
		$sth->bindValue(':id', $id, PDO::PARAM_INT);
		$sth->execute();
		$row = $sth->fetch(PDO::FETCH_ASSOC);
		$user = new User($row['id'], $row['account'], $row['passwd'], $row['phone']);
		return $user;
	}
	
	public function findByAccount($account) {
		$sth = $this->db->prepare("select * from user where account=:account");
		$sth->bindValue(':account', $account, PDO::PARAM_STR);
		$sth->execute();
		$row = $sth->fetch(PDO::FETCH_ASSOC);
		$user = new User($row['id'], $row['account'], $row['passwd'], $row['phone']);
		return $user;
	}
	
	
	public function save($account,$passwd,$phone) {
		$sth = $this->db->prepare("insert into user (account,passwd,phone) values (:account,:passwd,:phone)");
		$sth->bindValue(':account', $account, PDO::PARAM_STR);
		$sth->bindValue(':passwd', $passwd, PDO::PARAM_STR);
		$sth->bindValue(':phone', $phone, PDO::PARAM_STR);
		$sth->execute();
	}
	
	
}
//$dao = new UserDao();
//$dao->save('rrrr','1244','2432432');
//print_r($dao->findFriends(1, 10, 1));
?>