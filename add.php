<?php 
include 'db.php';

if(isset($_POST['send'])){

$date = $_POST['date'];
$letterno = $_POST['letterno'];
$subject = $_POST['subject'];
$rdate = $_POST['rdate'];

$sql = "INSERT INTO records (date,letterno,subject,recievedate) VALUES ('$date','$letterno','$subject','$rdate')";
$val = mysqli_query($con, $sql);

if($val == true){
	echo "<h1>Successfully Inserted</h1>";
}
header("Location: http://localhost/crud/index.php");
    exit();

}



?>