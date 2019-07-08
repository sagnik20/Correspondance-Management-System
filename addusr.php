<?php 
	include 'db.php';

	if(isset($_POST['submit'])){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$username = $_POST["username"];
		$pass = $_POST["pass"];
		$gender = $_POST["gender"];


		$sql = "INSERT INTO `user` (Name,user_name,pass,email,gender) VALUES ('$name','$username','$pass','$email','$gender')";
		$val = mysqli_query($con, $sql);

		if($val == true){
			echo "<h1>Successfully Inserted</h1>";
		}

	}

	//header("Location: http://localhost/crud/adduser.php");
?>