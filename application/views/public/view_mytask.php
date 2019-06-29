<?php include_once('user_header.php'); ?>
<style>  
.divi{
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
         
          font-size:20px;
          box-shadow:
          0 2px 2px rgba(0,0,0,0.2),        
          0 1px 6px rgba(0,0,0,0.2),        
          0 0 0 12px rgba(255,255,255,0.4); 
          
}

 html, body {
    position: relative;
    background-image: url("https://images.unsplash.com/photo-1489486501123-5c1af10d0be6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80");
    font-family: serif;
    background-repeat: no-repeat;
    background-size: cover;
    font-size: 18px;
    line-height: 1;
}
h1 {
    font-size: 36px;
    font-family:serif;
}
    
    .btn-primary {
    background-color: #76b7d6;
    border-radius: 15px;
    border-color: #76b7d6;
}
.btn-danger {
    background-color: #d9534f;
    border-radius: 18px;
}
    
.table-id .table thead th,.table-id .table thead td {
    
  color: black;

}
.table-id .table a{ color:red;
    
}

.table-id {
    border: 2px solid;
    background-color:white;
}
.over{
    position: absolute;
   
    content: '';
    filter: blur(18px);
    -webkit-filter: blur(8px);
    
    width: 100%;
    height: 100%;
}</style>
<div class="container">
<?php echo form_open('user/complete_task/'.$article->id); ?>  
<br/>
<div class="divi">
<center><h1>Task Information</h1></center>
<br/>
<h1>
<br/>
<?php echo form_hidden('id',$article->id);?>
<h3><u>TITLE</u> -  <?= $article->title ?></h3>
<br/>
<p><h3>
<u>Description</u> - <?= $article->description ?></h3>
</p>
<br/>
<p>
<u>Priority</u> -  <?= $article->priority ?>
<p>
<br/>
<u>Assigned On</u>-
<?php echo $article->created_at; ?>
<br/>
<br/>
Progress -
<button name="progress" value="1">Completed</button>
<!--<?php //'echo anchor("user/complete_task/".$article->id,'SUBMIT',['class'=>'btn btn-primary']); ?>-->
</div>
</div>
</div>
<?php echo form_close();?>
</div>

<?php include_once('public_footer.php'); ?>
