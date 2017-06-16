<h2><?= $title ?></h2>
<div class="col-lg-3">
<p><h4><?= $leftheader ?></h4></p>
<?php $this->load->view('templates/left-sidebar');?> 
</div>
<div class="col-lg-6">
<?= $banner ?>
<p>Welcome to the Convert Number To Romans Application Function </p>
<?php
if(isset($_POST['ConvNum'])):
echo $SuccessMessage ;
endif;
?>
<?php echo form_open('/converter'); ?>
  <div class="form-group">
    <label>Type Number To Convert To Roman's Number Here</label>
    <input type="text" id="ConvNum" class="form-control" name="ConvNum" placeholder="e.g 10">
 </div>
  <button type="submit" class="btn btn-default">Convert</button>
</form>
 </div>
 <div class="col-lg-3">
 <p><h4><?= $rightheader ?></h4></p>
 <?php $this->load->view('templates/right-sidebar');?>            
 </div>