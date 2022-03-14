<?php 

session_start();

require_once('config.php');

if(isset($_POST['login']))
{

  if(!empty($_POST['phone']) && !empty($_POST['password']))
  {
    
    $phone    = trim($_POST['phone']);
    $password   = trim($_POST['password']);
    
    //$Password = ($password);
    
    $sql = "select * from registration where  phnno = '".$phone."' and pass = '".$password."'";
    $res = mysqli_query($mysqli,$sql);
    $getNumRows = mysqli_num_rows($res);
    
    if($getNumRows == 1)
    {
      
      $getUserRow = mysqli_fetch_assoc($res);
      
      $_SESSION = $getUserRow;  
      
      header("location:employee_dashboard.php");
      
      exit;
    }
    else
    {
      echo"<script> alert ('inavalid username or password')</script>";
    }
    
  }
}
?>


<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: pink;  
}  
input[type=submit] {   
       background-color: #92a8d1;   
       width: 100%;  
        color: Blue;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body>    
    <center> <h1> Leave Management System</h1> </center>   
    <form method="POST">  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="phone" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <input type="submit" name="login" value="Log In">  
               
             <a href="forget_password.php"><h2><center>  Forget Password</center></h2></a>     
        </div>   
    </form>     
</body>     
</html>