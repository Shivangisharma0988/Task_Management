<?php include('public_header2.php'); ?>
<?php echo form_open('login/admin_login',['class'=>'form-horizontal']); ?>
<div class="container">

<style type="text/css">
        body{ font: 14px sans-serif;  
        }
        .wrapper{ width: 350px; padding: 20px; }
        .tax{
          background: rgba(255,175,75,0.63);
          background: -moz-radial-gradient(center, ellipse cover, rgba(255,175,75,0.63) 0%, rgba(255,174,74,0.63) 1%, rgba(255,102,0,1) 100%);
          background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(255,175,75,0.63)), color-stop(1%, rgba(255,174,74,0.63)), color-stop(100%, rgba(255,102,0,1)));
          background: -webkit-radial-gradient(center, ellipse cover, rgba(255,175,75,0.63) 0%, rgba(255,174,74,0.63) 1%, rgba(255,102,0,1) 100%);
          background: -o-radial-gradient(center, ellipse cover, rgba(255,175,75,0.63) 0%, rgba(255,174,74,0.63) 1%, rgba(255,102,0,1) 100%);
          background: -ms-radial-gradient(center, ellipse cover, rgba(255,175,75,0.63) 0%, rgba(255,174,74,0.63) 1%, rgba(255,102,0,1) 100%);
          background: radial-gradient(ellipse at center, rgba(255,175,75,0.63) 0%, rgba(255,174,74,0.63) 1%, rgba(255,102,0,1) 100%);
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffaf4b', endColorstr='#ff6600', GradientType=1 );
          width: 380px;
          margin: 60px auto 30px;
          padding: 15px;
          position: relative;
          border-radius: 3px;
          font-size:20px;
          box-shadow:
          0 2px 2px rgba(0,0,0,0.2),        
          0 1px 6px rgba(0,0,0,0.2),        
          0 0 0 12px rgba(255,255,255,0.4); 
          }
          .btn{
          border-radius:20px;
          background-color:black;
        }


    </style><div class="tax">
  <fieldset>
    <center><legend>Admin</legend></center>
    <center><img class='profile-img' src="https://designoweb.com/wp-content/themes/designowebchild/img/white_logo.svg"" width=80px height=80px></center>
    <div class="form-group">
      <label for="exampleInputusername">Username</label>
      <input name='username' type="username" class="form-control" id="exampleInputusername" placeholder="Username">
      <?php if(!empty($error['username'])){ echo $error['username']; }?>
      </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name='password' type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
     <?php if(!empty($error['password'])){ echo $error['password']; }?>
    </div>
    <?php if(!empty($error = $this->session->flashdata('login_failed'))){
echo $error;
}?>
		
      <center> <button type="submit" class="btn">Submit</button>
      <button type="reset" class="btn">Reset</button></center>
  </fieldset>
			
				</form>


</div>
</div>
<?php include('public_footer.php'); ?>