        <h4 class="head"><span class="m_2">Packages</span></h4>
	   <?php 
            use Cake\ORM\TableRegistry;
                foreach($packages as $p)
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
	      
	     <div class="clearfix"> </div>
	    </div>