<ul class="breadcrumb">
    <li>
    <a href="<?php echo $this->request->webroot;?>">Home</a>
    </li>
    <li>
        <?php echo $cat->title;?></a>
    </li>
</ul>
<h2><?php echo $cat->title;?> Packages</h2>
<div class="filters">
    <?php echo $this->Paginator->sort('title', 'Title');?> | 
    <?php echo $this->Paginator->sort('days', 'Days');?>
</div>
<div class="list-group">
<?php 
use Cake\ORM\TableRegistry;
    foreach($packages as $p)
    {
        $ite = TableRegistry::get('Iteniery');
        $days = $ite->find()->where(['pid' => $p->id])->count();

        ?>
        <div class="col-md-4 padding-left-0 margin-left-0">
            <div class="product-item">
              <div class="pi-img-wrapper">
                <img src="<?php echo $this->request->webroot;?>img/package/final/<?php echo $p->image;?>" class="img-responsive" alt="<?php echo $p->title;?>">
              </div>
              <h3><a href="<?php echo $this->request->webroot;?>package/<?php echo $p->slug;?>"><?php echo substr($p->title,0,50);if(strlen($p->title > 50))echo '...';?></a></h3>
              <div class="pi-price common"><?php echo $days;?> day<?php echo ($days>1)?"s":'';?></div>
              <a href="<?php echo $this->request->webroot;?>package/<?php echo $p->slug;?>" class="btn btn-default add2cart">View Detail</a>
              <?php if($p->is_new=='1'){?><div class="sticker sticker-new"></div><?php }?>
            </div>
        </div>
        <?php
    }
    
?>
  
</div>
<hr />
<div class="common col-md-12">
<?php 
//echo $this->Paginator->counter('current:{{current}} count:{{count}}');
if($this->Paginator->counter('{{current}}')!=$this->Paginator->counter('{{count}}')){?>
<ul class="pagination">
    <?php echo $this->Paginator->prev('<'); ?>
    <?php echo $this->Paginator->numbers();?>
    <?php echo $this->Paginator->next('>'); ?>
</ul>
<?php }?>
</div>