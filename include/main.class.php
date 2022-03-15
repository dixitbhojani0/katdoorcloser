	<?php
  class Database
  {
  	protected $db_host = DB_HOST;
  	protected $db_user = DB_USER;
  	protected $db_pass = DB_PASS;
  	protected $db_name = DB_NAME;
  	protected $con 	= false; 
  	
    public function connect()   
    {  
      
      if(!$this->con)
      {
        $this->myconn =@mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        if($this->myconn)
        {
          // echo "Aadas";exit;
          $this->con = true;
          return true;               
        } 
        else
        {
          die('Connect Error: ' . mysqli_connect_error());
          return false;
        }
      } 
      else
      {
        return true;
      }
    }
  	
  	public function disconnect()    
  	{   
  		if($this->con)
  		{
  			if(@mysqli_close())
  			{
  				$this->con = false;
  				return true;
  			}
  			else
  			{
  				return false;
  			}
  		}
  	}
  	
  	public function getDBName()   
  	{   
  		$dbData = $this->db_host.",".$this->db_user.",".$this->db_pass.",".$this->db_name;
  		return $dbData;
  	}
  	//--------------------------- DB -------------------------------//
  }
  ?>