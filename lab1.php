<?php

    // session_start();
    include_once 'user.php';

    if(isset($_POST['btn-save'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $city = $_POST['city_name'];
        $username =$_POST['username'];
        $password=$_POST['password'];

        $user = new User($first_name,$last_name,$city,$username,$password);
        if(!$user->validateForm()){
            $user->createFormErrorSessions();
            header("Refresh:0");
            die();
        }
        $res = $user->save();
        if($res){
            echo "save was succesful";
        }else{
            echo "An Error occured";
        }
    }
    
?>


<!DOCTYPE html>
<html>
<head>
	<title>Lab 1</title>
	<script type="text/javascript" src="validate.js"></script>
</head>
<body>

	<form method="post" name="user_details" onsubmit="return validateForm()">
		 <div id="form-errors">
            <?php
                session_start();
                if(!empty($_SESSION['form_errors'])){
                    echo " " . $_SESSION['form_errors'];
                    unset($_SESSION['form_errors']); 
                }
            ?>
        </div>
		<TABLE align="center">
			<tr>
				<td><input type="text" name="first_name" required placeholder="First Name"></td>
			</tr>
			<tr>
				<td><input type="text" name="last_name" required placeholder="Last Name"></td>
			</tr>
			<tr>
				<td><input type="text" name="username" placeholder="username" required></td>
			</tr>

			<tr>
				<td><input type="text" name="city_name" required placeholder="City"></td>
			</tr>
			<tr>
				<td><input type="password" name="password" placeholder="password"required></td>
			</tr>
			
			<tr>
				<td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
			</tr>
			
			<tr>
				<td><a href="login.php">Login</a></td>
			</tr>


			
			
		</TABLE>
	</form>
	<h3>Users</h3>
        <?php
            $user = new User('','','','','');
            $result = $user->readAll();
            if($result->num_rows != 0){
                echo("<p> First Name | Last Name | City");
                while($row = $result->fetch_assoc()) {
                    echo "<p>";
                    echo($row["first_name"]);
                    echo(" | ");
                    echo($row["last_name"]);
                    echo(" | ");
                    echo($row["city_name"]);
                    echo "</p>";
                }
            }else{
                echo("No records Found");
            }
        ?>

</body>
</html>