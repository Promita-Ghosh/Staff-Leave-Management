<?php
 
include "config.php";
session_start();

$empno=$_SESSION['empno'];


if(isset($_POST['Update']))
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
   
	
	$sqlInsert ="UPDATE `registration` SET `empno`='$emp_no',
                `name`='$emp_name',`emp_type`='$emp_type',`phnno`='$emp_phone',`pass`='$emp_password',
                `gmail`='$emp_email',`address`='$emp_address',`dob`='$emp_birth_date',`qualification`='$emp_qualification',
                `dateofjoining`='$emp_joining_date',`dept`='$emp_dept' WHERE empno=$empno";
				
	$res = mysqli_query($mysqli, $sqlInsert);
				
	if($res)
		{
			echo"<script> alert ('Update this profile Successfully')</script>";

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
<title> Profile Details </title>  
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
  background: linear-gradient(135deg, #13547a , #80d0c7);
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
  background: linear-gradient(135deg, #13547a , #80d0c7);
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
   background: linear-gradient(135deg, #13547a , #80d0c7);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #13547a , #80d0c7);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .drop-down span.details{
    font-weight: 500;
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
    <div class="title">Profile Details</div>
    <div class="content">
      <form method="POST"> 
        <div class="user-details">
          <div class="input-box">
            <span class="details">Emp. Name</span>
            <input type="text" placeholder="Enter your name" name="emp_name" value="<?php echo $_SESSION['name'];?>" >
          </div>
          <div class="input-box">
            <span class="details">Emp. No</span>
            <input type="text" placeholder="Enter Emp. No." name="emp_no" value="<?php echo $_SESSION['empno'];?>" readonly >
          </div>
          <div class="input-box">
            <span class="details">Emp. Type </span>
            <input type="text"  name="emp_type" value="<?php echo $_SESSION['emp_type'];?>" readonly> 
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input  type="number" placeholder="Enter Phone No." name="emp_phone" value="<?php echo $_SESSION['phnno'];?>">
          </div>
          <div class="input-box">
            <span class="details">Email ID  </span>
            <input type="email" placeholder="Enter Email ID" name="emp_email" value="<?php echo $_SESSION['gmail'];?>">
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="emp_birth_date" value="<?php echo $_SESSION['dob'];?>">
          </div>
          <div class="input-box">
            <span class="details">Date of Joining</span>
            <input type="date" name="emp_joining_date" value="<?php echo $_SESSION['dateofjoining'];?>">
          </div>
          <div class="input-box">
            <span class="details">Educational Qualification </span>
            <input type="text" placeholder="Enter Qualifiction" name="emp_qualification" value="<?php echo $_SESSION['qualification'];?>">
          </div>
          <div class="input-box">
            <span class="details">Address </span>
            <input type="text" name="emp_address" value="<?php echo $_SESSION['address'];?>">
          </div>
        <div class="input-box">
          <span class="details">Department </span>
          <input type="text"  name="emp_dept" value="<?php echo $_SESSION['dept'];?>" > 
        </div>
        </div>
        <div class="button">
          <input type="submit" name="Update" value="Update">
        </div>
      </form>
    </div>
  </div>
</body>     
</html>