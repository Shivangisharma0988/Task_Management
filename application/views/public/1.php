<html>
<head>
<style>
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

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
</head>
<body>

<div class="dropdown" style="float:right;">
  <button class="dropbtn"><i class="fa fa-bars">Home</i></button>
  <div class="dropdown-content">
  <a href="<?php echo base_url('user/task');?>" >TASK</a>
  <a href="<?php echo base_url('user/my_task');?>" >MY TASK</a>
  <a href="<?php echo base_url('user/complete_task');?>" >TASK COMPLETED</a>
  <a href="<?php echo base_url('user/notification');?>" >NOTIFICATION</a>
  </div>
</div>

</body>
</html>
