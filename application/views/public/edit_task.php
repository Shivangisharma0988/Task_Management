<?php include('user_header.php'); ?>
<div class="over"></div>
<!-- edit kroo  -->
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
.btn{
    border-radius:20px;
    background-color:black;
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

</style>
<div class="container">
<?php echo form_open('user/update_task',['class'=>'form-horizontal']); ?>
<?php echo form_hidden('article_id',$article->id); ?>
<div class="tax">
<form>
<fieldset>
<div>
<?php if(!empty($feed = $this->session->flashdata('feedback')));{echo $feed;} ?>
</div>
<!-- Edit task ka view..... -->
<center>
<legend>EDIT TASK</legend>  </center>
<div class="row">
<div class="col-lg-6"><div class="form-group">
<label for="staticUsername">Title</label><br/>
<!-- Name -->
<?php echo form_input(['name'=>'title','placeholder'=>'Tile','value'=>set_value('title',$article->title)]) ?>
</div></div>
<div class="col-lg-6"><?php echo form_error('title',"<p class='text-danger'>","</p>"); ?></div>
</div>
<!-- Description -->
<div class="row">
<div class="col-lg-6"><div class="form-group">
<label for="exampleInputEmail1">Description</label>
<?php echo form_input(['name'=>'description','placeholder'=>'Description','value'=>set_value('description',$article->description)])?>
</div></div>
<div class="col-lg-6"><?php echo form_error('description',"<p class='text-danger'>","</p>"); ?></div>
</div>
<!-- Priority -->
<div class="row">
<div class="col-lg-6"><div class="form-group">
<label for="staticUsername">Priority</label><br/>
<select name="priority" value=<?php echo $article->priority; ?>>
<option value="high">High</option>
<option value="medium">Medium</option>
<option value="low">Low</option>
</select>   
</div></div>
<div class="col-lg-6"><?php echo form_error('priority',"<p class='text-danger'>","</p>"); ?></div>
</div>
<!-- reciever Id -->
<div class="row">
<div class="col-lg-6"><div class="form-group">
<label for="staticUsername">Reciever Id</label><br/>
<?php echo form_input(['name'=>'reciever_id','placeholder'=>'Reciever Id','value'=>set_value('reciever_id',$article->reciever_id) ])?>
</div></div>
<div class="col-lg-6"><?php echo form_error('sender_id',"<p class='text-danger'>","</p>"); ?></div>
</div>
<!-- Buttons -->
<center>
<?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn']);
echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn']); ?>
</center>
</fieldset>
</form>
</div>
</div>

<?php include('public_footer.php'); ?>  