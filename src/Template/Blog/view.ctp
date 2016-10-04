<?php $url =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
<ul class="breadcrumb">
<li>
<a href="<?php echo $this->request->webroot;?>">Home</a>
</li>
<li class="active"><?php echo $pack->title;?></li>
</ul>
            <h2 class="common"><?php echo $pack->title;?></h2>
            <div id="introduction">
                <div class="col-md-12 largeImage padding-left-0 common">
                    <img src="<?php echo $this->request->webroot;?>img/blogs/<?php echo $pack->image;?>" />
                </div>
                <div class="clearfix"></div>
                <hr />
                
                <div class="common">
                  <?php echo $pack->description; ?>
                  <p><strong><?php echo date("d M, Y", strtotime($pack->created_date));;?></strong></p>
                </div>
            </div>
            
            <hr />
            <h1>Place your comment below</h1>
            <div class="fb-comments common" data-href="<?php echo $url;?>" data-numposts="5" style="width:100%;"></div>
           
            
            