<?php
require("config.php");
$sql = "SELECT * FROM registration";
$result = $mysqli->query($sql);
$tot_count = mysqli_num_rows($result);

$sql1 = "SELECT * FROM leave_master where emp_type='Staff A'";
$result1 = $mysqli->query($sql1);
$lev_count = mysqli_num_rows($result1);

$sql2 = "SELECT * FROM leavedetails";
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
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            background-repeat: no-repeat;
        }
        .rcorners2 {
            float: left;
            border-radius: 25px;
            border: 2px solid black;
            padding: 20px; 
            width: 245px;
            height: 150px;  
            margin-right: 60px;
            margin-top: 50px;
            font-size: 20px;
            background-color: #64c2aa;
            box-shadow: 10px 10px 20px #488a54;
        }
    </style>
</head>

<body>
    <div class="main" style="padding-left: 165px;padding-top: 50px;">
    <div class="rcorners2"><?php echo "Total No. of Employee: ".$tot_count;?></div>
    <div class="rcorners2"><?php echo "Total Leave-Type-: ".$lev_count;?></div>
    <div class="rcorners2"><?php echo "Total No. of Application: ".$app_count;?></div>  
    </div>
</body>
</html>