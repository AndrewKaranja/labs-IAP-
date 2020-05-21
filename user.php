<?php
include 'C:\xampp\htdocs\webapp\labs(IAP)\Crud.php';
include_once "DBconnector.php";
    require './Authenticator.php';
   

/**
 * 
 */
class User implements Crud,Authenticator
{
	private $user_id;
	private $first_name;
	private $last_name;
	private $city_name;
     private $username;
        private $password;
         private $conn;

	function __construct($first_name,$last_name,$city_name,$username,$password){
		$this->first_name=$first_name;
		$this->last_name=$last_name;
		$this->city_name=$city_name;
         $this->conn = new DBConnector;
            $this->username = $username;
            $this->password = $password;
	}





 public static function create(){
            // $instance = new self();
            // return $instance;

            $instance = new ReflectionClass(__CLASS__);
            return $instance->newInstanceWithoutConstructor();
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setPassword($password){
            $this->password =$password;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setUserId(){
            $this->user_id = $user_id;
        }

        public function getUserId(){
            return $this->user_id;
        }

        public function hashPassword(){
            $this->password = hash("sha256",$this->password);
        }

        public function isPasswordCorrect(){

            $pdb = new DBConnector();
		$found = false;
		$result2 = mysqli_query($pdb->conn,"SELECT * FROM user") or die("Error".mysqli_error());
			while($row = mysqli_fetch_assoc($result2)) {
					if (password_verify($this->password, $row['password'])&& $this->getUsername()==$row['username']) {
						$found=true;
						return $found;
					}
					$pdb->closeDatabase();
					return $found; 
            // $found = false;
            // $res = $this->conn->conn->query("SELECT * FROM user");
            // while($row = $res->fetch_assoc()){
            //     $found = (password_verify($this->getPassword(),$row['password'])&& $this->getUsername() == $row['username']);
            // }
            // $this->conn->closeDatabase();
            // return $found;
        }
    }

        public function login(){
            if($this->isPasswordCorrect()){
                header("Location:private.php");
            }
        }

        public function createUserSession(){
            session_start();
            $_SESSION['username'] = $this->getUsername();
        }

        public function logout(){
            session_start();
            unset($_SESSION['username']);
            session_destroy();
            header("Location:./lab1.php");
        }



public function save(){
	 $con = new DBconnector();
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        $uname = $this->username;
            $this->hashPassword();
            $pass = $this->password;

        $stmt = "INSERT INTO user (first_name,last_name,city_name,username,password)
                 VALUES ('$fn','$ln','$city','$uname','$pass')";

        $res = mysqli_query($con->conn,$stmt);
        return $res;



}

public function readAll(){

 $sql1 = "SELECT * FROM user";
            $result = $this->conn->conn->query($sql1);
            return $result;}
	public function readUnique(){return null;}
	public function search(){return null;}
	public function update(){return null;}
	public function removeOne(){return null;}
	public function removeAll(){return null;}

     public function validateForm(){
            $fn = $this->first_name;
            $ln = $this->last_name;
            $city = $this->city_name;
            
            return !($fn == "" || $ln == "" || $city =="");
        }

        public function createFormErrorSessions(){
            session_start();
            $_SESSION['form_errors'] = "All Fields are required";
        }


}
?>