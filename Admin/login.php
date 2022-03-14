<?php 

session_start();

require('config.php');

if(isset($_POST['login']))
{

  if(!empty($_POST['mail']) && !empty($_POST['password']))
  {
    
    $mail = trim($_POST['mail']);
    $password   = trim($_POST['password']);
    
    //$Password = ($password);
    
    $sql1 = "select * from admin where gmail = '".$mail."' and pass = '".$password."'";
    $res1 = mysqli_query($mysqli,$sql1);
    $getNumRows1 = mysqli_num_rows($res1);
    
    if($getNumRows1 == 1)
    {
      
      $getUserRow1 = mysqli_fetch_assoc($res1);
      
      $_SESSION = $getUserRow1;  
      
      header("location:admin_dashboard.php");
      
      
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
<title>ADMIN Login Page </title> 
<style>   
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  margin: 0;
  padding: 0;
  background: linear-gradient(120deg,#43cea2,#185a9d);
  height: 100vh;
  overflow: hidden;
}
.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  height: 400px;
  background: white;
  border-radius: 10px;
  box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
}
.center h1{
  text-align: center;
  padding: 20px 0;
  border-bottom: 1px solid silver;
}
.center form{
  padding: 0 40px;
  box-sizing: border-box;
}
form .txt_field{
  position: relative;
  border-bottom: 2px solid #adadad;
  margin: 30px 0;
}
.txt_field input{
  width: 100%;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}
.txt_field label{
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
  transition: .5s;
}
.txt_field span::before{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
  background: #2691d9;
  transition: .5s;
}
.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
  top: -5px;
  color: #2691d9;
}
.txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before{
  width: 100%;
}
.pass{
  margin: -5px 0 20px 5px;
  color: #a6a6a6;
  cursor: pointer;
}

input[type="submit"]{
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: linear-gradient(120deg,#43cea2,#185a9d);;
  border-radius: 25px;
  font-size: 18px;
  color: #e9f4fb;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}
input[type="submit"]:hover{
  border-color: #2691d9;
  transition: .5s;
} 
a{
  text-decoration: none;
}
</style>   
</head>    
<body>    
    <div class="center">
      <h1>Admin Login</h1> 
      <form method="POST">  
        <div class="txt_field"> 
          <input type="text" name="mail" required>
          <span></span>
          <label>Username</label>
        </div>  
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"><a href="forget_password.php">Forgot Password?</a></div>
        <input type="submit" name="login" value="Log In">        
    </form>     
    </div>
</body>     
</html>