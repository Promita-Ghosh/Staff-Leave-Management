<?php
session_start();
require_once("config.php");
$id = $_GET['id'];
if(isset($_POST['submit']))
{
	$action = $_POST['action'];
    $remarks = $_POST['remarks'];
    
	
	$sqlUpdate ="UPDATE `leavedetails` SET `action`='$action',`remarks`='$remarks' WHERE id=$id";
				
	$res = mysqli_query($mysqli, $sqlUpdate);
				
	if($res)
		{
			echo"<script> alert ('Application proccessed successfully')</script>";
            echo"<script>location.href='employee_display.php'</script>";
		}
		else
		{
			echo"<script> alert ('Not proccessed')</script>";
		}	
}

//selecting data associated with this particular id
$result_get_data = mysqli_query($mysqli, "SELECT * FROM `leavedetails` WHERE id=$id");

while($res = mysqli_fetch_array($result_get_data))
{
	
	$Text1 = $res['empno'];
	$Text2 = $res['name'];
    $Text3 = $res['phnno'];
	$Text4 = $res['mail'];
    $Text5 = $res['leavetype'];
    $Text6 = $res['fromdate'];
    $Text7 = $res['todate'];
	$Text8 = $res['noofdays'];
    $Text9 = $res['reason'];	
	}
?>


<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Leave Application </title>  
<style>   
 html {
            height: 155%;
        }
        body{
            font-family: Calibri, Helvetica, sans-serif; 
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            background-repeat: no-repeat;
        }
input[type=submit] {   
       background-color: #6867AC; 
       width: 40%;  
        color: #FFBCD1;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;
        border-radius: 15px;   
        cursor: pointer;   
         }   
 form 
 {   
         width: 60%;
         margin-left: 155px;
        margin-top: 25px;
        margin-right: 100px;
        margin-bottom: 20px;
           
    }  
 input[type=text], input[type=password],select {   
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
    <div class="title"> Leave Application Action</div><br>
        <form method="POST">
        <label>Emp. Name : </label>   
        <input type="text" name="emp_name" value="<?php echo $Text1;?>" readonly>
        
        <label>Emp. No : </label>   
        <input type="text" name="emp_no"  value="<?php echo $Text2;?>" readonly> 
        
        <label>Phone No : </label>  
        <input type="text" name="emp_phone" value="<?php echo $Text3;?>" readonly>  
        
        <label>Email ID : </label>   
        <input type="text" name="emp_email" value="<?php echo $Text4;?>" readonly> 

        <label>Leave Type : </label>   
        <input type="text" name="emp_leavetype" value="<?php echo $Text5;?>" readonly> 

        <label>From Date : </label>   
        <input type="text" name="emp_fromdate" value="<?php echo $Text6;?>" readonly> 

        <label>To Date : </label>   
        <input type="text" name="emp_todate" value="<?php echo $Text7;?>" readonly> 

        <label>No of Day : </label>   
        <input type="text" name="emp_noofday" value="<?php echo $Text8;?>" readonly>

        <label>Reason For Leave : </label>   
        <input type="text" placeholder="Enter Reason" name="emp_reason" value="<?php echo $Text9;?>" readonly> 

        <label>Action : </label>   
        <select name="action">
            <option value="None">Choose Option</option>
            <option value="Approved">Approve</option>
            <option value="Rejected">Reject</option>
        </select>
           
        <label>Remarks : </label>   
        <input type="text" placeholder="Enter Remarks" name="remarks"  > 

        <div class="button">
            <input type="submit" name="submit" value="Submit">
        </div>
        </form>     
      </div>   
</body>     
</html>