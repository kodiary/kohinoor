<?php $url =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
<ul class="breadcrumb">
<li>
<a href="<?php echo $this->request->webroot;?>">Home</a>
</li>
<li class="active">Blogs</li>
</ul>
            <h2 class="common">Blogs</h2>
            <div id="introduction">
                <div class="">
            <?php 
            
                foreach($model as $p)
                {
                    

                    ?>
                    <div class="col-md-12 padding-left-0 margin-left-0 common blog_listing">
                        
                          <div class="col-md-3">
                            <img src="<?php echo $this->request->webroot;?>img/blogs/<?php echo $p->image;?>" class="img-responsive" alt="<?php echo $p->title;?>">
                          </div>
                          <div class="col-md-9">
                          <h3><a href="<?php echo $this->request->webroot;?>blog/view/<?php echo $p->slug;?>"><?php echo substr($p->title,0,50);if(strlen($p->title > 50))echo '...';?></a></h3>
                          <?php echo substr($p->description,0,200).'...';?>
                          <p><strong><?php echo date("d M, Y", strtotime($p->created_date));;?></strong></p>
                          </div>
                          <div class="clearfix"></div>
                        
                    </div>
                    <?php
                }
            ?>
              
            </div>
            </div>
            
           
            
            