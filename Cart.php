<?php

class Cart
{
    private $id;
    private $userid;
    private $menuid;
    private $name;
    private $price;
    private $number;
    private $img;
    private $pubtime;
    
    public function __construct($id, $userid, $menuid, $name,$price,$number,$img,$pubtime){
		$this->id = $id;
		$this->userid = $userid;
		$this->menuid = $menuid;
		$this->name = $name;
		$this->price = $price;
		$this->number = $number;
		$this->img = $img;
		$this->pubtime = $pubtime;
	}
    
     public function getId()
    {
        return $this->id;
    }

     public function setId($id)
    {
        $this->id = $id;
    }

    public function getUserid()
    {
        return $this->userid;
    }

    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

     public function getMenuid()
    {
        return $this->menuid;
    }

     public function setMenuid($menuid)
    {
        $this->menuid = $menuid;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

     public function getNumber()
    {
        return $this->number;
    }

     public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getPubtime()
    {
        return $this->pubtime;
    }

    public function setPubtime($pubtime)
    {
        $this->pubtime = $pubtime;
    }

    
    
}

?>