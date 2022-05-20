<?php
include('../php/db.php');
?>
<?php

class controller{
	protected $host = 'localhost';
	protected $user = 'medo';
	protected $password = '123';
	protected $db = 'cv_project';

	public $con = null;

	public function __construct()
	{
		return $this->sqli();
		// $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->db);
		// if($this->con->connect_error){
		// 	echo "Fail". $this->con->connect_error;	
		// }
	}
	public function sqli(){
        $this->sqli = new db(
            $this->host, 
			$this->user, 
            $this->password, 
            $this->db
        );
        if(mysqli_connect_error()){ 
            return mysqli_connect_error(); 
        }else{
            return $this->sqli;
        }
    }
}

?>