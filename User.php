<?php

class User
{

    private $id;

    private $account;

    private $passwd;

    private $phone;

    public function __construct($id, $account, $passwd, $phone){
		$this->id = $id;
		$this->account = $account;
		$this->passwd = $passwd;
		$this->phone = $phone;
	}
	
	private $permission;
	
	private $friend;
	
	public function getPermission() {
        return $this->permission;
    }
	
	public function setPermission($permission) {
        $this->permission = $permission;
    }
	
	public function getFriend() {
        return $this->friend;
    }
	
	public function setFriend($friend) {
        $this->friend = $friend;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function setAccount($account)
    {
        $this->account = $account;
    }

    public function getPasswd()
    {
        return $this->passwd;
    }

    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}

?>