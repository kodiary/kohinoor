<?php use Cake\ORM\TableRegistry;
?>
<ul class="breadcrumb">
<li>
<a href="<?php echo $this->request->webroot;?>">Home</a>
</li>

<li class="active">Search (<?php echo $_GET['keyword'];?>)</li>
</ul>
            <hr />
            <?php
            if($pmodel && count($pmodel)){?>
            
            <h2>Packages</h2>
            <div class="">
            <?php 
                
                foreach($pmodel as $p)
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
                          
                        </div>
                    </div>
                    <?php
                }
            ?>
              <div class="clearfix"></div>
            </div>
            <hr />
            <?php } 
            
            if($tmodel && count($tmodel)){?>
            
            <h2>Tours</h2>
            <div class="">
            <?php 
            
                foreach($tmodel as $p)
                {
                    $ite = TableRegistry::get('Iteniery');
                    $days = $ite->find()->where(['pid' => $p->id])->count();

                    ?>
                    <div class="col-md-4 padding-left-0 margin-left-0">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <img src="<?php echo $this->request->webroot;?>img/tours/final/<?php echo $p->image;?>" class="img-responsive" alt="<?php echo $p->title;?>">
                          </div>
                          <h3><a href="<?php echo $this->request->webroot;?>tour/<?php echo $p->slug;?>"><?php echo substr($p->title,0,50);if(strlen($p->title > 50))echo '...';?></a></h3>
                          <div class="pi-price common"><?php echo $days;?> day<?php echo ($days>1)?"s":'';?></div>
                          <a href="<?php echo $this->request->webroot;?>package/<?php echo $p->slug;?>" class="btn btn-default add2cart">View Detail</a>
                          
                        </div>
                    </div>
                    <?php
                }
            ?>
              <div class="clearfix"></div>
            </div>
            <?php }?>