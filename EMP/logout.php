<?php
    include('config.php');
	session_start();

	unset($_SESSION);
	session_destroy();
	echo "<script>location.href='../index.php'</script>";
?>