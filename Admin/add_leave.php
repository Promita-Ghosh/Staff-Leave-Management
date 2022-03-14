<?php
$year=date('Y');
require_once("config.php");
if(isset($_POST['submit']))
{
	
	$year = $_POST['year'];
	$emp_type = $_POST['emp_type'];
    $leave_type	= $_POST['leave_type'];
	$no	= $_POST['no'];
    
	
	$sqlInsert ="UPDATE leave_master set no_of_leave = '$no' where emp_type='$emp_type' and leave_type='$leave_type'";
				
	$res = mysqli_query($mysqli, $sqlInsert);
				
	if($res)
		{
			echo"<script> alert ('Leave updated successfully')</script>";
		}
		else
		{
			echo"<script> alert ('Can't Update')</script>";
		}	

}
?>


<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> New Leave Details </title>  
<style>  
html {
            height:100%;
}
body{
    font-family: 'Open Sans', sans-serif;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    background-repeat: no-repeat;
    } 

/* Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color:  #EA99D5;  
}   */
input[type=submit] {   
       background-color: #4442c0; 
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
 input[type=text],input[type=number] , select {   
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
    font-family: unset;
  
}
 .container {   
        width: 50%;
        margin: auto;
        margin-top: 150px;
        display: relative;
        padding: 25px;   
        /* background-color:skyblue;   */
        border-radius: 6px;
    } 
</style>   
</head>    
<body>    
    <div class="container">   
        <div class="title"> Update Leave </div><br>
          <form method="POST" >
            <label>Year </label>   
            <input type="text" placeholder="Enter Emp. Name" name="year" value="<?php echo $year;?>" readonly><br>
            <label>Emp. Type </label>   
            <select name="emp_type" required>
                <option hidden>Choose Type </option>
                <option value="Staff A">Staff A</option>
                <option value="Staff B">Staff B </option>
                <option value="Staff C">Staff C </option>
                <option value="Manager">Manager</option>
            </select> <br>
            <label>Leave Type : </label>  
            <select name="leave_type" required>
                <option hidden>Choose Type </option>
                <option value="Privilege Leave (PL)">Privilege Leave (PL)</option>
                <option value="Sick Leave (SL)">Sick Leave (SL) </option>
                <option value="Casual Leave (CL)">Casual Leave (CL)</option>
                <option value="Earned Leave (EL)">Earned Leave (EL)</option>
            </select> <br>
            <label>No of Leave : </label>  
            <input type="number" placeholder="Enter No." name="no" required>
            <div class="button">
            <input type="submit" name="submit" value="Submit"> 
            </div>
          </form>     
      </div>   
</body>     
</html>
