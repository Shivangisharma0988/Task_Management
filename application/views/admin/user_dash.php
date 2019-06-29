<?php include('admin_header.php'); ?>
<div class="over"></div>
<div class="container" style="position: relative;">

<br/>
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
<br/>
<center><h1>ALL USERS</h1></center>
<hr>

<div class="table-id">
<table class="table" push-r>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Designation</th>
            <th>Date</th>
        </tr>
     <?php if(count($articles)): ?>
     <?php     foreach($articles as $article):
        // print_r($article);die;
        ?>
        <tr>
<td><?php echo $article->name ?></td>
<td>
<?php echo $article->email ?></td>
<td>
<?php echo $article->gender ?></td>
<td>
<?php echo $article->designation?></td>
<td>
<?php echo $article->created_at; ?></td>
<td>
<div class="row">
    <div class="col-lg-6"><?php echo form_open('admin/delete_article'),
    form_hidden('article_id',$article->id),
    form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure?')"]),
    
    form_close(); ?></div>
    <div class="col-lg-6">
<?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary']); ?>

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
</tbody>

</table>
</div>
</div>
</div>

<?php include('admin_footer.php'); ?>