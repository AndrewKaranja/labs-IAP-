<?php

    // session_start();
    include_once 'DBConnector.php';
    include_once 'user.php';
    include_once 'fileUploader.php';
 
    $cdb = new DBConnector();


    if(isset($_POST['btn-save'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $city = $_POST['city_name'];
        $username =$_POST['username'];
        $password=$_POST['password'];
        $fileName=$_FILES['fileToUpload']['name'];
        $fileSize=$_FILES['fileToUpload']['size'];
        $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $finalName=$_FILES['fileToUpload']['tmp_name'];

        $utc_timestamp = $_POST['utc_timestamp'];
      $offset = $_POST['time_zone_offset'];


        $user = new User($first_name,$last_name,$city,$username,$password);


         //Pass timezone information to database
      $user->setUtcTimestamp($utc_timestamp);
      $user->setTimezoneOffset($offset);

        $fileUploader = new fileUploader();

    $fileUploader->setOriginalName($fileName);
    $fileUploader->setType($fileType);
    $fileUploader->setSize($fileSize);
    $fileUploader->setFinalName($finalName);
    $fileUploader->setUsername($username);
if (!$user->validateForm()) {
        $user->createFormErrorSessions();
        header("Refresh:0");
        die();
    }else{
        if ($fileUploader->fileWasSelected()) {
            if ($fileUploader->fileTypeisCorrect()) {
                if ($fileUploader->fileSizeIsCorrect()) {
                    if (!($fileUploader->fileAlreadyExists())) {
                        
                    $user->save();
                    $fileUploader->uploadFile() ;



                    }else{
                        echo "FILE EXISTS"."<br>";

                    }

                }else{
                    echo "PICK A SMALLER SIZE"."<br>";
                }

            }else{
                echo "INCORRECT TYPE"."<br>";
            }


        }else{echo "NO FILE DETECTED"."<br>";}
    }
 

    $cdb->closeDatabase();
	

    
}
    
?>


<!DOCTYPE html>
<html>
<head>
	<title>Lab 1</title>
	<script type="text/javascript" src="validate.js"></script>
    <link rel="stylesheet" type="text/css" href="validate.css">
</head>
<body>

	<form method="post" name="user_details" enctype= "multipart/form-data" onsubmit="return validateForm()">
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
                <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
            </tr>
			
			<tr>
				<td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
			</tr>
			
			<tr>
				<td><a href="login.php">Login</a></td>
			</tr>

            <tr>
                 <td> <input type="hidden" name="utc_timestamp" id="utc_timestamp" value=""> </td> 
             </tr>

             <tr>
                     <td> <input type="hidden" name="time_zone_offset" id="time_zone_offset" value=""> </td>
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