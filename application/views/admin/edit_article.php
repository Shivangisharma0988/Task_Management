<?php include('admin_header.php'); ?>
<div class="over"></div>
<style>
  html, body {
    position: relative;
    background-image: url("https://images.unsplash.com/photo-1489486501123-5c1af10d0be6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80");
    font-family: serif;
    background-repeat: no-repeat;
    background-size: cover;
    font-size: 18px;
    line-height: 1;}
  .tax
{
    
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
    box-shadow:
        0 2px 2px rgba(0,0,0,0.2),        
        0 1px 6px rgba(0,0,0,0.2),        
        0 0 0 12px rgba(255,255,255,0.4);
}
.btn{
    border-radius:20px;
    background-color:black;
  }

</style>
<div class="container">
<?php echo form_open_multipart("admin/update_article/{$article->id}",['class'=>'form-horizontal']); ?>
<?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>

<div class="tax">
<form>
  <fieldset>
  <div>
  <?php if($feed = $this->session->flashdata('feedback')){echo $feed;} ?>
  </div>
  <center>
    <legend>Edit User</legend>  </center>
    <div class="row">
      <div class="col-lg-6"><div class="form-group">
      <label for="staticUsername">Name</label><br/>
     <?php echo form_input(['name'=>'name','placeholder'=>'name','value'=>set_value('name',$article->name)]) ?>
       <!-- <input type="text"   id="staticEmail" placeholder="Email"> -->
          </div></div>
      <div class="col-lg-6"><?php echo form_error('name',"<p class='text-danger'>","</p>"); ?></div>
    </div>
    <div class="row">
      <div class="col-lg-6"><div class="form-group">
      <label>Email address</label>
           <?php echo form_input(['name'=>'email','placeholder'=>'Email','value'=>set_value('email',$article->email)]) ?>
       <!-- <input type="text"   id="staticEmail" placeholder="Email"> -->
          </div></div>
      <div class="col-lg-6"><?php echo form_error('email',"<p class='text-danger'>","</p>"); ?></div>
    </div>
    <div class="row">
      <div class="col-lg-6"><div class="form-group">
      <label>password</label><br/>
     <?php echo form_input(['name'=>'password','placeholder'=>'password','value'=>set_value('password',$article->password)]) ?>
       <!-- <input type="text"   id="staticEmail" placeholder="Email"> -->
          </div></div>
      <div class="col-lg-6"><?php echo form_error('password',"<p class='text-danger'>","</p>"); ?></div>
    </div>
    <div class="row">
      <div class="col-lg-6"><div class="form-group">
      <label>Gender</label><br/>
   <?php echo form_input(['name'=>'gender','placeholder'=>'Gender','value'=>set_value('gender',$article->gender)]) ?>
          </div></div>
      <div class="col-lg-6"><?php echo form_error('gender',"<p class='text-danger'>","</p>"); ?></div>
    </div>
    <div class="row">
      <div class="col-lg-6"><div class="form-group">
      <label>Designation</label><br/>
     <?php echo form_input(['name'=>'designation','placeholder'=>'Designation','value'=>set_value('designation',$article->designation)]) ?>
       <!-- <input type="text"   id="staticEmail" placeholder="Email"> -->
          </div></div>
      <div class="col-lg-6"><?php echo form_error('department',"<p class='text-danger'>","</p>"); ?></div>
    </div>
    <center>
    <?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn','onclick'=>"return confirm('Are you sure?')"]);
    echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn']); ?>
      </center>
  </fieldset>
</form>
</div>
</div>
</div></div>

<?php include('admin_footer.php'); ?>  