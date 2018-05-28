<?php
class Order
{
    private $id;
    private $userid;
	private $total;
	private $pubtime;
	
	 public function __construct($id, $userid, $total, $pubtime){
		$this->id = $id;
		$this->userid = $userid;
		$this->total = $total;
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
	
	 public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
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