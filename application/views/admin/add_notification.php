<?php include('admin_header.php'); ?>

<div class="container">
<br/>
<?php echo form_open_multipart('admin/store_notification',['class'=>'form-horizontal']); ?>
<?php echo form_hidden('id',$this->session->userdata('user_id')); ?>
<style>


html, body {
position: relative;
background-image: url("https://images.unsplash.com/photo-1489486501123-5c1af10d0be6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80");
font-family: serif;
background-repeat: no-repeat;
background-size: cover;
font-size: 18px;
line-height: 1;
}
#btn1{
    margin-top: 30px;
    margin-left:20px;}
#btn1 {
    margin-top: 30px;
    margin-left: 24px;
    border-radius: 20px;
    margin-top: auto;

}
.tax
{
  
    background:#ffc299;
    width: 400px;
    margin: 30px auto 30px;
    padding: 15px;
 
    border-radius: 3px;
    color: #7e7975;
    box-shadow:
        0 2px 2px rgba(0,0,0,0.2),        
        0 1px 6px rgba(0,0,0,0.2),        
        0 0 0 12px rgba(255,255,255,0.4);
}
#btn1{
    margin-top: 30px;
    margin-left:20px;
}
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
<div class="tax">
<form>
  <fieldset>
  <div>
  <?php if($feed = $this->session->flashdata('feedback')){echo $feed;} ?>
  </div>
  <center>
 
    <legend>ADD Notification</legend>  </center>
   
    <div class="row">
      <div class="col-lg-6"><div class="form-group">
      <label>Title</label><br/>
     <?php echo form_input(['name'=>'title','placeholder'=>'Title']) ?>
     <?php if(!empty($error['title'])){print_r($error['title']); }?>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-lg-6"><div class="form-group">
      <label>Message</label><br/>
     <?php echo form_input(['name'=>'message','placeholder'=>'Message']) ?>
     <?php if(!empty($error['message'])){print_r($error['message']); }?>
      </div>
      </div>
      </div>
    <div>
    <center>
    <?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn','id'=>'btn1']);
    echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn','id'=>'btn1']); ?></center></div>
  </fieldset>
</form>
</div>
</div>

<?php include('admin_footer.php'); ?>  