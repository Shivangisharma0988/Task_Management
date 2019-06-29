<?php include('admin_header.php'); ?>

 <?php include('admin_sidebar.php');?>
 <?php if(!empty($this->session->flashdata('feedback'))){echo $this->session->flashdata('feedback');}?>
<?php include('admin_footer.php'); ?>