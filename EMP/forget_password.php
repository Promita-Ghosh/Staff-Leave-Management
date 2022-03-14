<?php
require_once("config.php");


if(isset($_POST['submit']))
{
    $username   = $_POST['username'];
    $n_pass     = $_POST['n_pass'];
    $c_pass   = $_POST['c_pass'];
    
   
    
    $sqlUpdate ="UPDATE `registration` SET `pass`='$n_pass' WHERE phnno=$username";
                
    $res = mysqli_query($mysqli, $sqlUpdate);
                
    if($res)
        {
            echo"<script type='text/javascript'> 
                            alert('Password Changed Successfully'); 
                            window.location.href = 'login.php';
                            </script>";

        }
        else
        {
            echo"<script> alert ('Not updated')</script>";
        }   
}
  
?>


<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Forget Password </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color:  #EA99D5;  
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
        margin-top: 150px;
        display: relative;
        padding: 25px;   
        background-color:skyblue;  
        border-radius: 6px;
    } 
</style> 

</head>    
<body>    
<div class="container">   
    <div class="title"> Forget Password</div><br>
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Username </label>   
            <input type="text" placeholder="Enter Username"  name="username" required>  
            <label>New Password </label>   
            <input type="password" placeholder="Enter New Password" id="n_pass" name="n_pass" required>
            <label>Confirm password </label>   
            <input type="password" placeholder="Enter New Password Again" id="c_pass" name="c_pass" required> 
            <div class="button">
            <input type="submit" name="submit" value="Submit">
            </div>
          </form>     
      </div>   
</body>   
</html>



