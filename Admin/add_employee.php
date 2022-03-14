<?php
require_once("config.php");
if(isset($_POST['submit']))
{
	
	$emp_name	= $_POST['emp_name'];
	$emp_no		= $_POST['emp_no'];
    $emp_type	= $_POST['emp_type'];
	$emp_phone	= $_POST['emp_phone'];
    $emp_email	= $_POST['emp_email'];
	$emp_password	= $_POST['emp_password'];
    $emp_birth_date	= $_POST['emp_birth_date'];
    $emp_joining_date	= $_POST['emp_joining_date'];
	$emp_qualification	= $_POST['emp_qualification'];
    $emp_dept	= $_POST['emp_dept'];
    $emp_address = $_POST['emp_address'];
	
	$sqlInsert ="INSERT INTO `registration`(`empno`, `name`, `emp_type`, `phnno`, `pass`, `gmail`, `address`, `dob`, `qualification`, `dateofjoining`, `dept`) 
                 VALUES (  '".$emp_no."','".$emp_name."', '".$emp_type."', '".$emp_phone."', '".$emp_password."', '".$emp_email."', '".$emp_address."', 
                 '".$emp_birth_date."', '".$emp_qualification."', '".$emp_joining_date."', '".$emp_dept."')";
				
	$res = mysqli_query($mysqli, $sqlInsert);
				
	if($res)
		{
			echo"<script> alert ('Data saved successfully')</script>";
		}
		else
		{
			echo"<script> alert ('Data not saved')</script>";
		}	

}
?>


<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> New Employee Details </title>  
<style>   
Body {  
  font-family: Arial Rounded MT Bold, Helvetica, sans-serif;  
  background-color:  #15B2B4;  
}  
input[type=submit] {   
       background-color: #4CAF50;   
       width: 100%;  
        color: Blue;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #44F4F7;   
    }   
 input[type=text], input[type=password], input[type=email] ,input[type=number],input[type=date],input[type=file]{   
        width: 40%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
    select  {   
        width: 40%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
    option  {   
        width: 20%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body>    
    <center> <h1><u> Add New Employee Details </u></h1> </center>   
    <form method="POST">  
        <div class="container">  

        <center><label>Emp. Name : </label>   
             <input type="text" placeholder="Enter Emp. Name" name="emp_name" required> </center>

             <center> <label>Emp. No : </label>   
            <input type="number" placeholder="Enter Emp. No." name="emp_no" required> </center>
            <center><label>Emp. Type : </label>  
            <input type="text" placeholder="Enter Phone No." name="emp_type" value="Employee" required readonly> 
            </center>

            <center><label>Phone No : </label>  
            <input type="number" placeholder="Enter Phone No." name="emp_phone" required>  <br>
            <font color="Red">(Phone No is Your User Name)</font></center>
        
            <center><label>Email ID : </label>   
            <input type="email" placeholder="Enter Email ID" name="emp_email" required> </center>

            <center><label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="emp_password" required> </center>
            
            <center><label>Date of Birth : </label>   
            <input type="date" name="emp_birth_date" required></center>

            <center><label>Date of Joining : </label>   
            <input type="date" name="emp_joining_date" required></center>

            <center><label>Educational Qualification : </label>   
            <input type="text" placeholder="Enter Qualifiction" name="emp_qualification" required> </center>

            <center><label>Address : </label>   
            <input type="text" name="emp_address" required><br> </center>

            <center><label>Department : </label>   
             
            <select name="emp_dept" required>
                <option hidden>Choose Type </option>
                <option value="HR">HR</option>
                <option value="IT">IT </option>
                <option value="Marketing">Marketing </option>
                <option value="Engineering">Engineering </option>
                <option value="Finance">Finance </option>
            </select> </center>

            <center><input type="submit" name="submit" value="Submit">   </center>

                 
        </div>   
    </form>     
</body>     
</html>