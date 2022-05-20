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

    public function sIO($ss){ 
        return addslashes(htmlspecialchars(trim($ss))); 
    }
    
}

?>