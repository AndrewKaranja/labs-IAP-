<?php
include 'C:\xampp\htdocs\webapp\labs(IAP)\Crud.php';
include_once "DBconnector.php";
/**
 * 
 */
class User implements Crud
{
	private $user_id;
	private $first_name;
	private $last_name;
	private $city_name;

	function __construct($first_name,$last_name,$city_name){
		$this->first_name=$first_name;
		$this->last_name=$last_name;
		$this->city_name=$city_name;
	}
	function connect(){
 $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'btc3205';
        
       
        $db =  mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
        if($db->connect_error){
        die("connection failed: ".$db->connect_error);

        }else{
        	// echo "SUCCESS";
        }
        return $db;	
}
	public function setUserId($user_id){
		$this->user_id=$user_id;

	}
	public function getUserId(){
		return $this->user_id;
	}




public function save(){
	 $con = new DBconnector();
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;

        $stmt = "INSERT INTO user (first_name,last_name,city_name)
                 VALUES ('$fn','$ln','$city')";

        $res = mysqli_query($con->conn,$stmt);
        return $res;



}

public function readAll(){

	 $con = new DBconnector();

        $stmt = "SELECT * FROM user";

        $res = mysqli_query($con->conn,$stmt);
        return $res;

//$conn=connect();

$result=mysqli_query($con->conn,$stmt) or die("Error: ".mysql_error());
$rowData=array();
echo '<table border="0" cellspacing="2" cellpadding="3"> 
      <tr> 
          <td> <font face="Arial">index</font> </td> 
          
          <td> <font face="Arial">First name</font> </td> 
          <td> <font face="Arial">Last Name</font> </td> 
          <td> <font face="Arial">City name</font> </td> 
         
      </tr>';
if ($result = $con->query($stmt)) {
    while ($row = $result->fetch_assoc()) {
        $rowData[]=$row;
                }
                for($i=0;$i<count($rowData);$i++){
                                echo '<tr> ';
                                foreach($rowData[$i] as $key=>$value){
                                                echo '<td>'.$value.'</td> ';
                                }
                                echo '</tr>';
                }
                                
    }
/*freeresultset*/
$result->free();

	return null;}
	public function readUnique(){return null;}
	public function search(){return null;}
	public function update(){return null;}
	public function removeOne(){return null;}
	public function removeAll(){return null;}


}
?>