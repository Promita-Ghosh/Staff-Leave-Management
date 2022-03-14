<?php
session_start();
$emp_type= $_SESSION['emp_type'];
require_once("config.php");
if(isset($_POST['submit']))
{
	$emp_name = $_POST['emp_name'];
    $emp_no = $_POST['emp_no'];
    $emp_phone = $_POST['emp_phone'];
    $emp_email = $_POST['emp_email'];
    $emp_leavetype = $_POST['emp_leavetype'];
    $emp_fromdate = $_POST['emp_fromdate'];
    $emp_todate = $_POST['emp_todate'];
    $emp_noofday = $_POST['emp_noofday'];
    $emp_reason = $_POST['emp_reason'];
    $action= "Pending";
	
	$sqlInsert ="INSERT INTO `leavedetails`(`empno`, `name`, `phnno`, `mail`, `leavetype`, `fromdate`, `todate`, `noofdays`, `reason`,`action`) 
                VALUES ('".$emp_no."','".$emp_name."', '".$emp_phone."', '".$emp_email."', '".$emp_leavetype."', '".$emp_fromdate."', '".$emp_todate."', '".$emp_noofday."', '".$emp_reason."', '".$action."')";
				
	$res = mysqli_query($mysqli, $sqlInsert);
				
	if($res)
		{
			 echo"<script type='text/javascript'> 
                            alert('Leave Application Sent Successfully'); 
                            window.location.href = 'emp_leave_display.php';
                            </script>";
		}
		else
		{
			echo"<script> alert ('Data not saved')</script>";
		}	
}

$columnname="leave_type";
$sql = "SELECT * FROM `leave_master`";
$result = $mysqli->query($sql);

?>


<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Leave Application </title>  
<style>  
html {
            height: 145%;
        } 
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  /* background-color:  #EA99D5;   */
  background: linear-gradient(135deg,#13547a , #80d0c7);
  background-repeat: no-repeat;
}  
input[type=submit] {   
       background-color:#13628e; 
       width: 40%;  
        color: black;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;
        border-radius: 15px;   
        cursor: pointer;   
         }   
 form 
 {   
    width: 60%;
    margin-left: 125px;
    margin-top: 25px;
    margin-right: 100px;
    margin-bottom: 20px;       
}  
 input[type=text], input[type=password],input[type=number],input[type=date],select {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid #8946A6;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
.container .title{
    font-size: 25px;
    font-weight: bold;
    text-align: center;
  
}
    
 .container {   
        width: 50%;
        margin: auto;
        margin-top: 75px;
        display: relative;
        margin-bottom: 75px;
        padding: 25px;   
        /* background-color:skyblue;   */
        border-radius: 6px;
    }    
</style>   
</head>    
<body>    
<div class="container">   
    <div class="title"> Leave Application </div><br>
        <form method="POST">
        <label>Emp. Name : </label>   
        <input type="text" name="emp_name" value="<?php echo $_SESSION['name'];?>" readonly>
        
        <label>Emp. No : </label>   
        <input type="number" name="emp_no"  value="<?php echo $_SESSION['empno'];?>" readonly>
        
        <label>Phone No : </label>  
        <input type="number" name="emp_phone" value="<?php echo $_SESSION['phnno'];?>" readonly> 
        
        <label>Email ID : </label>   
        <input type="text" name="emp_email" value="<?php echo $_SESSION['gmail'];?>" readonly>

        <label>Leave Type : </label>   
             <select name="emp_leavetype" required>
                <option hidden>Choose Leave Type </option>
                <option value="Privilege Leave (PL)">Privilege Leave (PL)</option>
                <option value="Sick Leave (SL)">Sick Leave (SL) </option>
                <option value="Casual Leave (CL)">Casual Leave (CL)</option>
                <option value="Earned Leave (EL)">Earned Leave (EL)</option>
             </select> 

        <label>From Date : </label>   
        <input type="date" name="emp_fromdate" required> 

        <label>To Date : </label>   
        <input type="date" name="emp_todate" required> 

        <label>No of Day : </label>   
        <input type="number" placeholder="Enter No" name="emp_noofday" required> 

        <label>Reason For Leave : </label>   
        <input type="text" placeholder="Enter Reason" name="emp_reason" required>
        
        <div class="button">
            <input type="submit" name="submit" value="Submit"> 
        </div>
        </form>     
      </div>    
</body>     
</html>
