<?php
class Menu
{
    private $id;
    private $name;
    private $price;
    private $introduce;
	private $typeid;
	private $hot;
	private $img;
	private $pubtime;
	
	 public function __construct($id, $name, $price, $introduce,$typeid,$hot,$img,$pubtime){
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
		$this->introduce = $introduce;
		$this->typeid = $typeid;
		$this->hot = $hot;
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

    public function getIntroduce()
    {
        return $this->introduce;
    }

    public function setIntroduce($introduce)
    {
        $this->introduce = $introduce;
    }

    public function getTypeid()
    {
        return $this->typeid;
    }

    public function setTypeid($typeid)
    {
        $this->typeid = $typeid;
    }
	
	 public function getHot()
    {
        return $this->hot;
    }

    public function setHot($hot)
    {
        $this->hot = $hot;
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