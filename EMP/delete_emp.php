<?php
    include('config.php');

	$info=$_GET['id'];

	mysqli_query($mysqli,"delete from leavedetails where id='$info'");
	echo "<script>location.href='emp_leave_display.php'</script>";
?>