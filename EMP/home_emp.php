<?php
require("config.php");
session_start();
$emp_name=$_SESSION['name'];
$sql2 = "SELECT * FROM leavedetails where name='$emp_name'";
$result2 = $mysqli->query($sql2);
$app_count = mysqli_num_rows($result2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
        html {
            height:100%;
        }
        body{
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg,#13547a , #80d0c7);
            background-repeat: no-repeat;
        }
        .rcorners2 {
            float: left;
            border-radius: 25px;
            border: 2px solid black;
            padding: 20px; 
            width: 250px;
            height: 150px;  
            margin-right: 60px;
            margin-top: 70px;
            margin-left: 60px;
            font-size: 20px;
            background-color: #5bbca3;
            box-shadow: 10px 10px 20px #488a54;
        }
    </style>
</head>
<body>
<div class="rcorners2"><?php echo "Total No. of Application: ".$app_count;?></div>
</body>
</html>