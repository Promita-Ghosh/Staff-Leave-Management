<?php
require_once("config.php");
$sql = "SELECT * FROM leave_master";
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
.button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
a{
  text-decoration: none;
}
</style>
</head>
<body>
<form method="POST">
<h2>Leave Details</h2>
<p align="right">
<button class="button"><a href="add_leave.php" style="color: white;">Update</a></button>
</p>
<table>
  <tr>
    <th>Year</th>
    <th>Emp. Type</th>
    <th>Leave Type</th>
    <th>No. of Days</th>
   
  </tr>
  <?php
while ($res=mysqli_fetch_assoc($result)){
  echo "<tr>";
  echo "<td>".$res['year']."</td>";
  echo "<td>".$res['emp_type']."</td>";
  echo "<td>".$res['leave_type']."</td>";
  echo "<td>".$res['no_of_leave']."</td>";
  echo "</tr>";
}?>
</table>
</form>
</body>
</html>