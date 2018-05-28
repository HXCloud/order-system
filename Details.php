<?php

class Details
{
    private $id;
    private $orderid;
    private $menuid;
	private $price;
    private $quantity;
    private $subtotal;
	private $img;
	private $menu;
    
    public function __construct($id, $orderid, $menuid, $price, $quantity,$subtotal,$img){
		$this->id = $id;
		$this->orderid = $orderid;
		$this->menuid = $menuid;
		$this->price = $price;
		$this->quantity = $quantity;
		$this->subtotal = $subtotal;
		$this->img = $img;
	}
    
	public function getMenu()
    {
        return $this->menu;
    }

    public function setMenu($menu)
    {
        $this->menu = $menu;
    }
	
     public function getId()
    {
        return $this->id;
    }

     public function setId($id)
    {
        $this->id = $id;
    }

    public function getOrderid()
    {
        return $this->orderid;
    }

    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;
    }

     public function getMenuid()
    {
        return $this->menuid;
    }

     public function setMenuid($menuid)
    {
        $this->menuid = $menuid;
    }

	public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
	
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getSubtotal()
    {
        return $this->subtotal;
    }

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }
	
	 public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }
  
}

?>