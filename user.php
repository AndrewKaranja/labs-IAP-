<?php
include 'C:\xampp\htdocs\webapp\labs(IAP)\Crud.php';
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
	public function setUserId($user_id){
		$this->user_id=$user_id;

	}
	public function getUserId(){
		return $this->user_id;
	}



public function save(){
$fn=$this->first_name;
$ln=$this->last_name;
$city=$this->city_name;
$res=mysqli_query("INSERT INTO user (first_name,last_name,city_name) VALUES('$fn','$ln','$city')") or die("Error: ".mysql_error());
return $res;

}

public function readAll(){
//$conn=connect();

$result=mysqli_query("SELECT * FROM user") or die("Error: ".mysql_error());
$rowData=array();
echo '<table border="0" cellspacing="2" cellpadding="3"> 
      <tr> 
          <td> <font face="Arial">index</font> </td> 
          
          <td> <font face="Arial">First name</font> </td> 
          <td> <font face="Arial">Last Name</font> </td> 
          <td> <font face="Arial">City name</font> </td> 
         
      </tr>';
if ($result = query($sql)) {
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