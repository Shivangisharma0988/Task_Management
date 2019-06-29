<!DOCTYPE html>
<html lang="en">
<head>
<style>
.block {
  display: block;
  width: 5%;
  border: round;
  background-color: #4CAF50;
  color: #ff6600;
  padding: 12px 15px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  float: right;
}

.block:hover {
  background-color: #ddd;
  color: black;
}
</style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>admin login</title>
  <?= link_tag('assets/css/bootstrap.min.css')?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-fixed-top">
<a class="nav-link" href="#"><img src="https://designoweb.com/wp-content/themes/designowebchild/img/white_logo.svg" width=50 height=50></a>
<div><a class="navbar-brand push-right" href="<?php echo base_url('login/user');?>"> <button style="color:#ff6600;" >Login</button></a>

</div>
</nav>

</li>
  </div>

</body>
</html>