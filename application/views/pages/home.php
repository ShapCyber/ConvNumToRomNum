<h2><?= $title ?></h2>
<div class="col-lg-3">
<p><h4><?= $leftheader ?></h4></p>
<?php $this->load->view('templates/left-sidebar');?> 
</div>
<div class="col-lg-6">
<?= $banner ?>
<p><h4><?php echo "Total Number Recently Coverted ".$totalconv; ?></h4></p>
<p>Welcome to the Convert Number To Romans Application</p>
 </div>
 <div class="col-lg-3">
 <p><h4><?= $rightheader ?></h4></p>
 <?php $this->load->view('templates/right-sidebar');?>            
 </div>