<ul class="breadcrumb">
<li>
<a href="<?php echo $this->request->webroot;?>">Home</a>
</li>
<li class="active"><?php echo "Videos";?></li>
</ul>
<h2 class="common"><?php echo "Videos";?></h2>
<div class="common">
<?php 
    foreach($model as $v)
    {
    $embed_arr = explode('=',$v->youtube);
    $code = end($embed_arr);
    ?>
    <div class="col-md-6">
      <iframe style="width:100%;" src="https://www.youtube.com/embed/<?php echo $code;?>" frameborder="0" allowfullscreen></iframe>
    </div>
<?php
}
?>
<div class="clearfix"></div>
<hr />
<ul class="pagination">
    <?= $this->Paginator->prev('<<') ?>
    <?= $this->Paginator->numbers() ?>
    
    <?= $this->Paginator->next('>>') ?>
</ul>
</div>

