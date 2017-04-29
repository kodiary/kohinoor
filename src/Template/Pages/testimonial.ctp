<ul class="breadcrumb">
<li>
<a href="<?php echo $this->request->webroot;?>">Home</a>
</li>
<li class="active"><?php echo $model->title;?></li>
</ul>
<h2 class="common"><?php echo $model->title;?></h2>
<div id="introduction">
    <div class="col-md-12 largeImage padding-left-0 common">
        <img src="<?php echo $this->request->webroot;?>img/team/<?php echo $model->image;?>" />
    </div>
    <div class="clearfix"></div>
    <hr />
    
    <div class="common">
      <?php echo $model->description; ?>
      
    </div>
</div>

<hr />