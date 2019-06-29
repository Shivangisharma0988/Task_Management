<?php include('user_header.php'); ?>


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
.table-id .table a:not(.btn){ color:red;
    
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
}
</style>

<div class="container">
<br/>
<center><h1>ALL Notification</h1></center>
<hr>
<div class="table-id">
<table class="table" >
    <thead>
        <tr>
        <th>S.no</th>
        <th>Title</th>
        <th>Message</th>
        <th>Created at</th>
        </tr>
        <?php if(count($articles)){ ?>
     <?php  $count=0;  foreach($articles as $article){
        //print_r($article);die;
        ?>
        <tr>
<td><?php echo ++$count; ?></td>


<td>
<?php echo $article->title ?>
</td>
<td>
<?php echo $article->message ?>
</td>
<td>
<?php echo $article->created_at ?>
</td>

</td>
</tr>
        <?php }} else{ ?>
<tr>
<td colspan="6">
No Records found
</td>
</tr>
        <?php } ?>
   <?php if(!empty($error = $this->session->flashdata('feedback'))){
echo $error;
}?>
</tbody>

</table>
</div>
</div>

</div>       
