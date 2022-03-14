<?php
session_start();
require("config.php");
$sql = "SELECT * FROM leavedetails WHERE empno=".$_SESSION['empno']." ";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
   html {
            height:100%;
        }
        body{
            /* font-family: 'Open Sans', sans-serif; */
            background: linear-gradient(135deg,#13547a , #80d0c7);
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
  background-color: #771fb4;
  color: white;
}

a{
  text-decoration:none;
}
</style>
</head>

<body>
<form method="POST">
<h2>Leave Status</h2>
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
  echo "<td><a href='#' onclick='deletes($res[id])'>Delete</a><br><a href='#' onclick='updates($res[id])'>Update</a></td>";
  // echo "<td></td>";
  echo "</tr>";
}?>

</table>
</form>
<script>
      function deletes(id)
      {
        a=confirm('Are You Sure To Remove This Record ?')
        if(a)
          {
              window.location.href='delete_emp.php?id='+id;
          }
      }

      function updates(id)
      {
        a=confirm('want to update ?')
        if(a)
          {
            window.location.href='update_application.php?id='+id;
          }
      }
  </script>
</body>
</html>

