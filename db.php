<?php
	session_start();
	@$con = mysqli_connect('localhost', 'root', '', 'crud') or die('Couldn\'t connect. Sorry. :(');
?>