<?php
session_start();
require_once("config.php");


$emp_no=$_SESSION['empno'];
$old_pass=$_SESSION['pass'];


if(isset($_POST['submit']))
{
    $con_pass = $_POST['con_pass'];
	$new_pass = $_POST['new_pass'];
   
	$sql = mysqli_query($mysqli,"select pass from registration");
    $pass_fetch = mysqli_fetch_assoc($sql);
    if($pass_fetch['pass'] == $new_pass){
        echo "<script>alert('This password is your current pass')</script>";
    }
    else if($con_pass==$new_pass){

        $sqlInsert ="UPDATE `registration` SET `pass`='$new_pass'";
                    
        $res = mysqli_query($mysqli, $sqlInsert);
                    
        if($res)
            {
                echo"<script> alert ('Password Changed Successfully')</script>";

            }
            else
            {
                echo"<script> alert ('Not changed')</script>";
            }
    }	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>  
    html {
    height:100%;
  }  
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  /* background-color:  #EA99D5;   */
    background: linear-gradient(135deg, #13547a , #80d0c7);
    background-repeat: no-repeat;
}  
input[type=submit] {   
       background-color:#13628e; 
       width: 40%;  
        color: black;  
        font-size: 15px;
        padding: 15px;   
        margin: 10px 0px;   
        border: none;
        border-radius: 15px;   
        cursor: pointer;   
         }   
 form 
 {   
         width: 60%;
         margin: auto;
           
    }  
    
  
 input[type=text], input[type=password] {   
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
        margin-top: 190px;
        display: relative;
        padding: 25px;   
        /* background-color:skyblue;   */
        border-radius: 6px;
    }   
</style>   
</head>
<body>

  <div class="container">   
    <div class="title"> Change Password</div><br>
          <form method="POST">  
            <label>New Password </label>   
            <input type="password" placeholder="Enter new password: " id="new_pass" name="new_pass" required>
            <label>Confirm password </label>   
            <input type="password" placeholder="Confirm Password: " id="con_pass" name="con_pass" required> 
            <div class="button">
              <input type="submit" name="submit" value="Submit">
            </div>
          </form>     
      </div>   

</body> 
</html>

