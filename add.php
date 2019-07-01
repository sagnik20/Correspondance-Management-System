<?php 
include 'db.php';

if(isset($_POST['send'])){

$date = $_POST['date'];
$letterno = $_POST['letterno'];
$subject = $_POST['subject'];
$rdate = $_POST['rdate'];

echo(isset($_FILES['image']));
if (isset($_FILES['image'])){

$erros= array();
$file_name = $_FILES['image']['name'];
$file_size =$_FILES['image']['size'];
$file_tmp =$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

       if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
       if(empty($errors)==true){

       	$file_name = $subject;
       	$folder = "css/uploads/".$file_name.".".$file_ext;
       	echo $folder;
         move_uploaded_file($file_tmp,$folder);
         echo "Success";
      }else{
         print_r($errors);
      }
   
}
$sql = "INSERT INTO records (date,letterno,subject,recievedate) VALUES ('$date','$letterno','$subject','$rdate')";
$val = mysqli_query($con, $sql);

if($val == true){
	echo "<h1>Successfully Inserted</h1>";
}
header("Location: http://localhost/crud/table.php");
    

}
else {
	echo "there is a error";
}


?>