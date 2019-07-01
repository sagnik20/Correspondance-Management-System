<!DOCTYPE html>

<?php
include 'db.php';
//session_start();

if(isset($_POST['user'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sql = "SELECT * FROM user WHERE user_name = '$user'AND pass = '$pass'";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION['user_name'] = $user;
	$_SESSION['Name'] = $row["Name"];

	if(mysqli_num_rows($result)>0){

		if($user != "admin"){
		 	echo $_SESSION["user"];
			header("Location: http://localhost/crud/table.php");
		

		}
		else{
			header("Location: http://localhost/crud/adduser.php");
		}
	} 
}
?>

<html>
<head>
	<title> Login</title>
	<link rel="stylesheet" a href="css\style.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<img src="css/login.png"/>
		<form method="POST">
			<div class="form-input">
				<input type="text" name="user" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="pass" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>