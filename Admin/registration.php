<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // define variables and set to empty values
    $emp_name = $emp_no	= $emp_email = $emp_qualification = $emp_address = "";
    $nameErr = $phnErr = $emailErr = "";

    if(isset($_POST['submit']))
    {
       
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['emp_name'])) 
    {
        $nameErr = "Only letters and white space allowed";
    }
    else
    {
        $emp_name	= test_input($_POST['emp_name']);
    }
	$emp_no		= test_input($_POST['emp_no']);
    $emp_type	= $_POST['emp_type'];

    // check phone no is valid or not
    if (!preg_match("/^[0-9]{10}+$/",$_POST['emp_phone'])) 
    {
        $phnErr = "invalid phone number ";
    }
    else
    {
        $emp_phone	= $_POST['emp_phone'];
    }

    // check if e-mail address is well-formed
    if (!filter_var($_POST['emp_email'], FILTER_VALIDATE_EMAIL)) 
    {
        $emailErr = "Invalid email format";
    }
    else
    {
        $emp_email	= test_input($_POST['emp_email']);
    }
   
	$emp_password	= $_POST['emp_password'];
    $emp_birth_date	= $_POST['emp_birth_date'];
    $emp_joining_date	= $_POST['emp_joining_date'];
	$emp_qualification	= test_input($_POST['emp_qualification']);
    $emp_dept	= $_POST['emp_dept'];
    $emp_address = test_input($_POST['emp_address']);
	
	$sqlInsert ="INSERT INTO `registration`(`empno`, `name`, `emp_type`, `phnno`, `pass`, `gmail`, `address`, `dob`, `qualification`, `dateofjoining`, `dept`) 
                 VALUES (  '".$emp_no."','".$emp_name."', '".$emp_type."', '".$emp_phone."', '".$emp_password."',
                  '".$emp_email."', '".$emp_address."', '".$emp_birth_date."', '".$emp_qualification."', '".$emp_joining_date."', '".$emp_dept."')";
				
	$res = mysqli_query($mysqli, $sqlInsert);
				
	if($res)
		{
			echo"<script> alert ('Registration successfull')</script>";
      echo"<script>location.href='employee_display.php'</script>";
		}
		else
		{
			echo"<script> alert ('Not registered')</script>";
		}	
    }
}

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
?>


<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Registration Page </title>  
<style>   
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 8px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #71b7e6, #9b59b6);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
  
</style>   
</head>    
<body>    
<div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <div class="user-details">
          <div class="input-box">
            <span class="details">Emp. Name</span>
            <input type="text" placeholder="Enter your name" name="emp_name"  required>
          </div>
          <div class="input-box">
            <span class="details">Emp. No</span>
            <input type="text" placeholder="Enter Emp. No." name="emp_no" required>
          </div>
          <div class="input-box">
            <span class="details">Emp. Type </span>
            <select name="emp_type" required>
              <option hidden>Choose Type </option>
              <option value="Staff A">Staff A</option>
              <option value="Staff B">Staff B </option>
              <option value="Staff C">Staff C </option>
              <option value="Manager">Manager</option>
          </select>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input  type="number" placeholder="Enter Phone No." name="emp_phone" required>
          </div>
          <div class="input-box">
            <span class="details">Email ID  </span>
            <input type="email" placeholder="Enter Email ID" name="emp_email" required>
          </div>
          <div class="input-box">
            <span class="details">Password  </span>
            <input type="password" placeholder="Enter Password" name="emp_password" required>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="emp_birth_date" required>
          </div>
          <div class="input-box">
            <span class="details">Date of Joining</span>
            <input type="date" name="emp_joining_date" required>
          </div>
          <div class="input-box">
            <span class="details">Educational Qualification </span>
            <input type="text" placeholder="Enter Qualifiction" name="emp_qualification" required>
          </div>
          <div class="input-box">
            <span class="details">Address </span>
            <input type="text" name="emp_address" required>
          </div>
        <div class="drop-down">
          <span class="details">Department </span>
          <select name="emp_dept" required>
            <option hidden>Choose Type </option>
            <option value="HR">HR</option>
            <option value="IT">IT </option>
            <option value="Marketing">Marketing </option>
            <option value="Engineering">Engineering </option>
            <option value="Finance">Finance </option>
        </select>
        </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
</body>     
</html>