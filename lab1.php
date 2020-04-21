<?php
include_once 'DBConnector.php';
include_once 'user.php';
$con= new DBConnector;/*Database connection was made*/
if (isset($_POST['btn-save'])) {

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$city=$_POST['city_name'];

//Creating a user object
$user= new User($first_name,$last_name,$city);
$res=(new User)-> save();

//$res = user -> save();

//Now we check if the save operation occured succesfully
if ($res) {
	echo "Save operation was succesfully";
	# code...
}else{
	echo "An error occured";
}

}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Lab 1</title>
</head>
<body>
	<form method="post">
		<TABLE align="center">
			<tr>
				<td><input type="text" name="first_name" required placeholder="First Name"></td>
			</tr>
			<tr>
				<td><input type="text" name="last_name" required placeholder="Last Name"></td>
			</tr>
			<tr>
				<td><input type="text" name="city_name" required placeholder="City"></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
			</tr>
			
		</TABLE>
	</form>

</body>
</html>