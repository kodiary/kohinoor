<ul class="breadcrumb">
<li>
<a href="<?php echo $this->request->webroot;?>">Home</a>
</li>
<li class="active"><?php echo ($this->request->params['action']=='team')?"Our Team":"Testimonials";?></li>
</ul>
<h2 class="common"><?php echo ($this->request->params['action']=='team')?"Our Team":"Testimonials";?></h2>
<div class="common">
<?php foreach($model as $m){
    $desc = ($this->request->params['action']=='team')?$m->description:substr($m->description,0,200).".....<br/><a href='".$this->request->webroot."pages/testimonial/".$m->id."'>Read More</a>";
    ?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo $this->request->webroot."img/team/".$m->image;?>" height="200px" style="padding: 5px; border: 1px solid #ccc;"/>
        </div>
        <div class="col-md-8"><h3>
            <?php echo $m->title;?></h3>
            <span class="blue"><?php echo $m->designation;?></span>
            <?php echo $desc;?>
        </div>
        
        <div class="clearfix"></div>
    </div>
    <hr />
<?php
} ?>
  
</div>
