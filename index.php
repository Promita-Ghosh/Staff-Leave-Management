<?php 

session_start();

require('EMP/config.php');

if(isset($_POST['login']))
{

  if(!empty($_POST['mail']) && !empty($_POST['password']))
  {
    
    $mail    = trim($_POST['mail']);
    $password   = trim($_POST['password']);
    
    //$Password = ($password);
    
    $sql = "select * from registration where gmail = '".$mail."' and pass = '".$password."'";
    $res = mysqli_query($mysqli,$sql);
    $getNumRows = mysqli_num_rows($res);
    
    if($getNumRows == 1)
    {
      
      $getUserRow = mysqli_fetch_assoc($res);
      
      $_SESSION = $getUserRow;  
      
      header("location:EMP/employee_dashboard.php");
      
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@1,500&display=swap');
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
  background: linear-gradient(120deg,#2980b9, #8e44ad);
  height: 100vh;
  overflow: hidden;
}
.pass a{
    text-decoration: none;
    color: white;
}
/* .center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  height: 400px;
  background: white;
  border-radius: 10px;
  box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
} */
.center{
    margin-top: 90px;
    /* background-color: rgba(221, 228, 236, 0.301); */
}
.center h1{
  text-align: center;
  padding: 20px 0;
  border-bottom: 1px solid silver;
  color:white;
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
  background: #2691d9;
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
    .navbar{
        background-color: #04313594;
        height: 45px;
        border-radius: 25px;
        margin-top: 15px;
    }

    .navbar a{
        color:white;
        text-decoration: none;
        padding: 5px 6px;
    }

    .navbar li{
        list-style: none;
        float: right;
        margin: 11px 15px;
        margin-left: 0px;
    }
    header h1 i{
        float: left;
    }
    .icon{
        width: 45px;
        margin-right: 8px;
        margin-top: 4px;
    }
    header{
        text-align: center;
        margin-top: 16px;
    }
    header h1{
        display: inline-block;
        font-size: 3em;
        font-family: 'Red Hat Display', sans-serif;
        margin: auto;
    }

    .home-img{
        width: 100%;
    }

    .main-container{
        /* overflow: auto; */
    }
    .container1{
        margin-top: 50px;
        float: left;
        display: inline-block;
        width: 56%;
    }
    .container2{
        display: inline-block;
        width: 40%;
    }
    form{
        width: 50%;
        margin: auto;
    }
    label,input{
        display: block;
        margin: 10px 0;
    }
</style>


<body>
    <header>
            <h1 style="color: white;"><i><img class="icon" src="img\team.png" alt="icon"></i>Staff Leave Management</h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="Admin\login.php">Admin </a></li>
            <!-- <li><a href="phpbasics.php">PHP Assignment </a></li> -->
        </ul>
    </nav>
    <div class="main-container">
        <div class="container1">
            <img class="home-img" src="img/4584-scaled-removebg-preview.png" alt="home image">
        </div>
        <div class="container2">
            <div class="center">
                <h1>Employee Login</h1> 
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
        <div class="pass"><a href="EMP/forget_password.php">Forgot Password?</a></div>
        <input type="submit" name="login" value="Log In">        
    </form>     
    </div>
        </div>
    </div>
</body>
</html>

