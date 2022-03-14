<?php
session_start();
require_once("config.php");
$emp_type=$_SESSION['emp_type'];
$emp_no=$_SESSION['empno'];
$year=date('Y');

//Privilege Leave (PL)
$sql_pl = "SELECT * FROM leave_master WHERE emp_type='$emp_type' AND year='$year' AND leave_type='Privilege Leave (PL)'";
$result_pl = $mysqli->query($sql_pl);
while($res=mysqli_fetch_assoc($result_pl))
{
  $pl_no_days=$res['no_of_leave'];

}

$sql_pl_taken = "SELECT SUM(noofdays) FROM leavedetails WHERE empno='$emp_no' AND leavetype='Privilege Leave (PL)' AND action='Approved'";
$result_pl_taken = $mysqli->query($sql_pl_taken);
while($res=mysqli_fetch_assoc($result_pl_taken))
{
  $no_days_taken_pl=$res['SUM(noofdays)'];
}


$pl_balance=$pl_no_days-$no_days_taken_pl;

//--------------------------------------------------------------------------------------------------------------------------------------------
//Sick Leave (SL)
$sql_sl = "SELECT * FROM leave_master WHERE emp_type='$emp_type' AND year='$year' AND leave_type='Sick Leave (SL)'";
$result_sl = $mysqli->query($sql_sl);
while($res=mysqli_fetch_assoc($result_sl)){
  $sl_no_days=$res['no_of_leave'];
}

$sql_sl_taken = "SELECT SUM(noofdays) FROM leavedetails WHERE empno='$emp_no' AND leavetype='Sick Leave (SL)' AND action='Approved'";
$result_sl_taken = $mysqli->query($sql_sl_taken);
while($res=mysqli_fetch_assoc($result_sl_taken)){
  $no_days_taken_sl=$res['SUM(noofdays)'];
}

$sl_balance=$sl_no_days-$no_days_taken_sl;

//--------------------------------------------------------------------------------------------------------------------------------------------
//Casual Leave (CL)
$sql_cl = "SELECT * FROM leave_master WHERE emp_type='$emp_type' AND year='$year' AND leave_type='Casual Leave (CL)'";
$result_cl = $mysqli->query($sql_cl);
while($res=mysqli_fetch_assoc($result_cl)){
  $cl_no_days=$res['no_of_leave'];
}

$sql_cl_taken = "SELECT SUM(noofdays) FROM leavedetails WHERE empno='$emp_no' AND leavetype='Casual Leave (CL)' AND action='Approved'";
$result_cl_taken = $mysqli->query($sql_cl_taken);
while($res=mysqli_fetch_assoc($result_cl_taken)){
  $no_days_taken_cl=$res['SUM(noofdays)'];
}

$cl_balance=$cl_no_days-$no_days_taken_cl;

//--------------------------------------------------------------------------------------------------------------------------------------------
//Earned Leave (EL)
$sql_el = "SELECT * FROM leave_master WHERE emp_type='$emp_type' AND year='$year' AND leave_type='Earned Leave (EL)'";
$result_el = $mysqli->query($sql_el);
while($res=mysqli_fetch_assoc($result_el)){
  $el_no_days=$res['no_of_leave'];

}

$sql_el_taken = "SELECT SUM(noofdays) FROM leavedetails WHERE empno='$emp_no' AND leavetype='Earned Leave (EL)' AND action='Approved'";
$result_el_taken = $mysqli->query($sql_el_taken);
while($res=mysqli_fetch_assoc($result_el_taken)){
  $no_days_taken_el=$res['SUM(noofdays)'];
}
  
$el_balance=$el_no_days-$no_days_taken_el;

?>
<!DOCTYPE html>
<html>
<head>
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
</style>
</head>
<body>
<form method="POST">
<h2>Leave Balance</h2>
<table>
  <tr>
    <th>Leave Type</th>
    <th>Eligable Days</th>
    <th>Leave Taken</th>
    <th>Leave Balance</th>
  </tr>
  <?php

  echo "<tr>";
  echo "<td>Privilege Leave (PL)</td>";
  echo "<td>".$pl_no_days."</td>";
  echo "<td>".$no_days_taken_pl."</td>";
  echo "<td>".$pl_balance."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Sick Leave (SL)</td>";
  echo "<td>".$sl_no_days."</td>";
  echo "<td>".$no_days_taken_sl."</td>";
  echo "<td>".$sl_balance."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Casual Leave (CL)</td>";
  echo "<td>".$cl_no_days."</td>";
  echo "<td>".$no_days_taken_cl."</td>";
  echo "<td>".$cl_balance."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Earned Leave (EL)</td>";
  echo "<td>".$el_no_days."</td>";
  echo "<td>".$no_days_taken_el."</td>";
  echo "<td>".$el_balance."</td>";
  echo "</tr>";
?>
</table>
</form>
</body>
</html>