<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>admin login</title>
  <?= link_tag('assets/css/bootstrap.min.css')?>
  <style>
     body .w3-padding {
    padding: 0;
}
      body{
        background-color: #ffffff;
        color:black;
      }
      .nav-link{
        background-color:  #ff6600;
      }
.navbar{
  background: black;
  color: #ff6600;
}
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ff6600;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg ">
<a class="nav-link" href="#"><img src="https://designoweb.com/wp-content/themes/designowebchild/img/white_logo.svg" width=40 height=40></a> &nbsp;&nbsp;&nbsp;
<div class="dropdown" style="float:left;">
<div class="w3-xxlarge"><i class="fa fa-bars"></i></div>
  <div class="dropdown-content" style="left:0;">
  <a href="<?php echo base_url('user/home');?>" ><i class="fa fa-home"></i>HOME</a>
  <a href="<?php echo base_url('user/task');?>" ><i class="fa fa-car"></i>TASK</a>
  <a href="<?php echo base_url('user/my_task');?>" ><i class="fa fa-address-book"></i>MY TASK</a>
  <a href="<?php echo base_url('user/complete_task');?>" ><i class="fa fa-briefcase" ></i>TASK COMPLETED</a>
  <a href="<?php echo base_url('user/notification');?>" ><i class="fa fa-bell"></i>NOTIFICATION</a>
  <a href="javascript:window.history.go(-1);"><i class="fa fa-arrow-left"aria-hidden="true">BACK</i></a>
  </div>
</div>
     
 

  <div class="collapse navbar-collapse" id="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">  
    </ul>
    <a class="navbar-brand push-right" href="<?php echo base_url('login');?>">
     <i class="fa fa-fw fa-user"></i>Logout</a>
   
 <?php echo form_close(); ?>
 <?php echo form_error('query',"<p class='navbar-text'>",'</p>'); ?>
    
  </div>
</nav>
</body>
</html>