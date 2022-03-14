<?php
session_start();
if($_SESSION['name']==""){
  echo "<script>location.href='../index.php'</script>";
}
$emp_name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee-Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
  
  body{
     background-color: #f3f5f9;
  }
  
  .wrapper{
    display: flex;
    position: relative;
  }
  
  .wrapper .sidebar{
    width: 200px;
    height: 100%;
    background: #0a6880;
    padding: 30px 0px;
    position: fixed;
  }
  
  .wrapper .sidebar h2{
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 30px;
  }
  
  .wrapper .sidebar ul li{
    padding: 15px;
    border-bottom: 1px solid #bdb8d7;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    border-top: 1px solid rgba(255,255,255,0.05);
  }    
  
  .wrapper .sidebar ul li a{
    color: #dedaf0;
    display: block;
  }
  
  .wrapper .sidebar ul li:hover a{
    color: #fff;
  }

  .wrapper .main_content{
    width: 100%;
    margin-left: 200px;
  }
  
  .wrapper .main_content .header{
    padding: 20px;
    background: #fff;
    color: #034128;
    border-bottom: 1px solid #e0e4e8;
    text-align: center;
    font-size: x-large;
    font-weight: bolder;
  }
  a{
    text-decoration: none;
  }
  .dropdown-btn {
  text-decoration: none;
  font-size: 15px;
  padding-left: 0px;
  color: #dedaf0;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
  font-family: inherit;
}
.dropdown-btn:hover {
  color: #f1f1f1;
}
.active {
  /* background-color: green; */
  color: white;
}
.dropdown-container {
  display: none;
  background-color:#0a6880;
  padding-left: 8px;
}

.icon{
  margin-left: 8px;
  margin-top: 7px;
  width: 50px;
        
    }

.a{
  padding-top: 22px;
  padding-bottom: 10px;
  font-size: 16px;
}
.b{
  padding-top: 12px;
  padding-bottom: 10px;
  font-size: 16px;
}
.fa-caret-down {
  float: right;
  padding-right: 8px;
  padding-top: 2px;
}

.image{
    width: 65px;
    height: 65px;
    background-color: white;
    border-radius: 32px;
    margin: auto;
}
.name{
  text-align: center;
  font-size:25px;
  color:#dedaf0;
}

        
</style>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <!-- <h2>Employee Dashboard</h2> -->
        <div class="image"><img class="icon" src="../img/admin.png" alt="icon"></div>
        <div class="name"><br><span>&nbsp;<?php echo "Welcome <br>".$emp_name;?></span>
        </div>  
        <ul style="list-style-type:none; padding: 13px;">
            <li><a href="home_emp.php" target="1"><i class="fa fa-home"></i>&nbsp;Home</a></li>
            <li><a href="emp_profile.php" target="1"><i class="fa fa-user"></i>&nbsp;Profile Details</a></li>
            <li>
            <button class="dropdown-btn"><i class="fa fa-envelope"></i>&nbsp; Leave
                  <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
              <div class="a"><a href="application.php" target="1"style="color:#dedaf0;">Leave Application</a></div>
              <div class="b"><a href="emp_leave_display.php" target="1"style="color:#dedaf0;">Leave Status</a></div>
              <div class="b"><a href="leave_balance.php" target="1"style="color:#dedaf0;">Leave Balance</a></div>
            </div>
            </li>
            <li><a href="change_password.php" target="1"><i class="fa fa-cog"></i>&nbsp;Change Password</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Log out</a></li>
        </ul> 
    </div>

    <div class="main_content">
    <div class="header">Welcome to Employee Dashboard</div>  
        <iframe src="home_emp.php" name="1"  style="width: 100%; height: 750px;"></iframe>
    </div>
</div>
</body>
</html>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>