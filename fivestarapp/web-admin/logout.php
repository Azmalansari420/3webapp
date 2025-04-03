<?php
	session_start();
	unset($_SESSION['session_admin']);
	header('Location: index.php');
	echo "<script>location.href='index.php';</script>";

?>