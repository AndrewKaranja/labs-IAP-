<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="btc3205";
define('DB_SERVER', $servername);
define('DB_USER', $username);
define('DB_PASS', $password);
define('DB_NAME', $dbname);

/**
 * 
 */
class DBConnector
{
	public $conn;
	
	function __construct()
	{
		$conn=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die("Connection failed: ".mysqli_error());

		//mysql_select_db(DB_NAME,$this->conn);
	}

public function closeDatabase(){

	mysql_close($this->conn);
}

}

// Create connection
//$conn = new mysqli($servername, $username, $password);

// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//}
echo "Connected successfully";
?>