<?php
session_start();
require_once("config.php");
$sql = "SELECT * FROM registration";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<style>
  html {
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
h2{
  margin-top: 25px;
    margin-bottom: 24px;
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
<h2>Employee Details</h2>
<table>
  <tr>
    <th>Emp. No</th>
    <th>Emp. Name</th>
    <th>Emp. Details</th>
    <th>Emp. Leave Details</th>
  </tr>
  <?php
while ($res=mysqli_fetch_assoc($result)){
  echo "<tr>";
  echo "<td>".$res['empno']."</td>";
  echo "<td>".$res['name']."</td>"; 
  echo "<td><button><a href=\"emp_profile_display.php?id=$res[id]\">Click here</a></button>";
  echo "<td><button><a href=\"leave_balance_display.php?id=$res[id]\">Click here</a></button>";
  echo "</tr>";
}?>
</table>
</form>
</body>
</html>
