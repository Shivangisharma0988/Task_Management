<?php include('admin_header.php'); ?>

<div class="row">
    <div class="col-lg-3"><?php include('admin_sidebar.php');?></div>
    <div class="col-lg-9">


<div class="container">
<br/>

<center><h1>SEARCH USER</h1></center>
<hr>
<table class="table">
    <thead>
        <tr>
            <td>S.No</td>
            <td>Name</td>
            <td>Department</td>
           
        </tr>
     
        <?php  if(count($articles)):
    $count=$this->uri->segment(4,0); 

     foreach($articles as $article):
        // print_r($article);die;
        ?>
        <tr>
<td><?php echo ++$count; ?></td>
<td>
<?php echo $article->name; ?></td>

<td>
<?php echo $article->designation; ?></td>



</tr>
    <?php endforeach; ?>
    
<?php else: ?>
<tr>
<td colspan="3">
No Records found
</td>
</tr>
   <?php endif; ?>
</tbody>

</table>
<?php echo $this->pagination->create_links(); ?>
</div>

</div>
<?php include('admin_footer.php'); ?>