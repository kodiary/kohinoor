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
            
            <h4>Packages</h4>
            <div class="row">
            <?php 
                
                foreach($pmodel as $p)
                {
                    $ite = TableRegistry::get('Iteniery');
                    $days = $ite->find()->where(['pid' => $p->id])->count();

                    ?>
                    <div class="col-md-4 top_grid1-box1 packages">
                        <a href="<?php echo $this->request->webroot;?>package/<?php echo $p->slug;?>">
                        <div class="grid_1">
                          <div class="thickbox">
                            <img src="<?php echo $this->request->webroot;?>img/package/final/<?php echo $p->image;?>" class="img-responsive" alt="<?php echo $p->title;?>"> </div>
                          <div class="grid_2">
                            <p><?php echo substr($p->title,0,35).'...';?></p>
                            <ul class="grid_2-bottom">
                              <li class="grid_2-left"><p><?php echo $days;?><small> Day<?php echo ($days>1)?"s":'';?></small></p></li>
                              <li class="grid_2-right"><div class="btn btn-info btn-normal btn-inline " target="_self" title="View Detail">View Detail</div></li>
                              <div class="clearfix"> </div>
                            </ul>
                          </div>
                        </div>
                       </a>
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
            <div class="row">
            <?php 
            
                foreach($tmodel as $p)
                {
                    $ite = TableRegistry::get('Iteniery');
                    $days = $ite->find()->where(['pid' => $p->id])->count();

                    ?>
                    <div class="col-md-4 top_grid1-box1 packages">
                        <a href="<?php echo $this->request->webroot;?>package/<?php echo $p->slug;?>">
                        <div class="grid_1">
                          <div class="thickbox">
                            <img src="<?php echo $this->request->webroot;?>img/package/final/<?php echo $p->image;?>" class="img-responsive" alt="<?php echo $p->title;?>"> </div>
                          <div class="grid_2">
                            <p><?php echo substr($p->title,0,35).'...';?></p>
                            <ul class="grid_2-bottom">
                              <li class="grid_2-left"><p><?php echo $days;?><small> Day<?php echo ($days>1)?"s":'';?></small></p></li>
                              <li class="grid_2-right"><div class="btn btn-info btn-normal btn-inline " target="_self" title="View Detail">View Detail</div></li>
                              <div class="clearfix"> </div>
                            </ul>
                          </div>
                        </div>
                       </a>
                    </div>
                    
                    <?php
                }
            ?>
              <div class="clearfix"></div>
            </div>
            <?php }?>