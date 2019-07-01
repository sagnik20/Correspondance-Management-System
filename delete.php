<?php 

 include 'db.php'; 
$id = (int)$_GET['id'];


$sql = "DELETE FROM user WHERE id = '$id'";


$val = $con->query($sql);

if($val){

header('Location: http://localhost/crud/table.php');

};



 ?>