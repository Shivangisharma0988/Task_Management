<?php include('user_header.php'); ?>

<div></div>
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
}
</style>

<div class="container">
<br/>
<center><h1>MY TASK</h1></center>
<hr>
<div>
<div class="table-id">
<table class="table">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Given By</th>
            <th>Title</th>
            <th>Priority</th>
            <th>Date</th>
            </tr>
     <?php if(count($articles)): ?>
     <?php  $count=0;   foreach($articles as $article):
            ?>
        <tr>
<td><?php echo ++$count; ?></td>
<td>
<?php echo $article->name ?>
</td>
<td>

<?php echo anchor("user/article/{$article->id}", $article->title); ?>
</td>
<?php if($article->priority=="low"){ ?>
        <td class="table-dark"><?php } ?>
        <?php if($article->priority=="medium"){ ?>
        <td class="table-success"><?php } ?>
        <?php if($article->priority=="high"){ ?>
        <td class="table-danger"><?php } ?>
<?php echo $article->priority ?>

</td>
<td>
<?php echo $article->created_at ?>
</td>

        </tr> 
    <?php endforeach; ?>
     <?php else: ?>
<tr>
<td colspan="6">
No Records found
</td>
</tr>
   <?php endif; ?>
   <?php if(!empty($error = $this->session->flashdata('feedback'))){
echo $error;
}?> 
</tbody>
</table>
</div>
</div>

       
