<?php
	include 'dp.php';
	session_unset();
	header("Location: http://localhost/crud/index.php");
	kill();
?>