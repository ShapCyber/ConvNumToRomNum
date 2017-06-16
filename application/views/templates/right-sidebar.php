<div class="panel panel-default">
<div class="panel-body">
<div class="list-group table-of-contents">
<ul id="topten">
<?php 
$PrintData="";
if(count($connum) == 0){
$PrintData.="No Data Available <br/>";
$PrintData.="<a href=".base_url()."converter title='Go To Converter Page'> Click Here </a>";
$PrintData.=" To Start Converting Numbers";
}
foreach($specnum as $RNum => $ConvItems) {
$conNum=$ConvItems["con_num"];
$conNumResult=$ConvItems["con_num_result"];
$conNid=$ConvItems["con_id"];
$PrintData.="<li>Number  <span class='label label-info'>".$conNum." </span>";
$PrintData.="<br/> In Romans Number  Is <span class='label label-danger'><strong>  ".$conNumResult. "</strong></span></li>";
}?>

<?= $PrintData ?>
</ul>
</div>
</div>
</div> 
     