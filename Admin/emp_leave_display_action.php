<?php
session_start();
require_once("config.php");
$sql = "SELECT * FROM leavedetails ORDER BY id DESC ";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<style>
  html 
  {
      height:100%;
  }
  body{
     font-family: 'Open Sans', sans-serif;
     background: linear-gradient(135deg, #71b7e6, #9b59b6);
     background-repeat: no-repeat;
  }
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

/* tr:nth-child(even){background-color: #f2f2f2} */

th {
  background-color: #7d49ec;
  color: white;
}
a{
  text-decoration: none;
  color:white;
}
button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 9px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>
<form method="POST">
<h2>Leave Application Display</h2>
<table>
  <tr>
    <th>Application ID</th>
    <th>Emp. No</th>
    <th>Emp. Name</th>
    <th>Emp. Phone No</th>
    <th>Emp. Mail ID</th>
    <th>Leave Type</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Number of Days</th>
    <th>Reason</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <?php
while ($res=mysqli_fetch_assoc($result)){
  echo "<tr>";
  echo "<td>".$res['id']."</td>";
  echo "<td>".$res['empno']."</td>";
  echo "<td>".$res['name']."</td>";
  echo "<td>".$res['phnno']."</td>";
  echo "<td>".$res['mail']."</td>";
  echo "<td>".$res['leavetype']."</td>";
  echo "<td>".$res['fromdate']."</td>";
  echo "<td>".$res['todate']."</td>";
  echo "<td>".$res['noofdays']."</td>";
  echo "<td>".$res['reason']."</td>";
  echo "<td>".$res['action']."</td>";
  echo "<td><button><a href=\"leave_application_action.php?id=$res[id]\">Take Action</a></button> </td>";
  echo "</tr>";
}?>
</table>
</form>
</body>
</html>