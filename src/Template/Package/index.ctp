<?php $url =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";/*?>
<ul class="breadcrumb">
<li>
<a href="<?php echo $this->request->webroot;?>">Home</a>
</li>
<li>
<a href="<?php echo $this->request->webroot;?><?php echo $cat->slug;?>"><?php echo $cat->title;?></a>
</li>
<li class="active"><?php echo $pack->title;?></li>
</ul><?php */?>

<div class="content">
    <div class="container_12 whitebg">
    <h4 class="head"><span class="m_2"><?php echo $pack->title;?></span></h4>
      <div class="grid_9 col-md-12">
        
        <div class="blog">
          <div class="clear"></div>
          <div class="slider">
	           <div class="callbacks_container">
                <ul class="rslides slider">
                    <li>
            	       <img src="<?php echo $this->request->webroot;?>img/package/resized/<?php echo $pack->image;?>" />
                        <div class="banner_bottom">
                            <span>This is test.</span>
                        </div>
                    </li>
                     <li>
            	       <img src="<?php echo $this->request->webroot;?>img/package/resized/img718_2016_07_21_10_24_47.jpg" />
                         <div class="banner_bottom">
                            <span>This is test.</span>
                        </div>
                    </li>
                     <li>
            	       <img src="<?php echo $this->request->webroot;?>img/package/resized/img949_2016_07_21_10_13_12.jpg" />
                         <div class="banner_bottom">
                            <span>This is test.</span>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
            <?php echo $pack->description; ?>  
          
        </div>
        
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12">
      <?php
            if($ite && count($ite))
            {
                ?>
                <p>&nbsp;</p>
                <a class="collapsible" data-toggle="collapse" href="#itinerary" aria-expanded="false" aria-controls="itinerary">Itinerary <span class="fa fa-angle-down"></span></a>
                <div class="common" id="itinerary">
                
                <table class="table table-bordered">
                <?php 
                foreach($ite as $i)
                {
                    ?>
                    <tr><td style="width: 20%;"><?php echo 'Day '.$i->day;?></td><td style="width: 20%;"><strong><?php echo $i->title;?></strong></td><td><?php echo $i->description;?></td></tr>
                    <?php
                }
                ?>
                </table>
                </div>
                <?php
            }
            if($pack->cost_detail)
            {
                ?>
                <hr />
                <a class="collapsible" onclick="$('#cost_detail').toggle('slow');" href="javascript:void(0)">Cost Detail <span class="fa fa-angle-down"></span></a>
                <div class="common collapse" id="cost_detail">
                
                <?php echo $pack->cost_detail;?>
                </div>
                <?php
            }
            if($pack->route_map || $pack->grade || $pack->start_point || $pack->end_point || $pack->best_time)
            {
                ?>
                <hr />
                <a class="collapsible" href="javascript:void(0);" onclick="$('#route').toggle('slow');">Route <span class="fa fa-angle-down"></span></a>
                <div class="common collapse" id="route">
                <?php
                if($pack->route_map){
                $col = 'col-md-6';
                ?>
                <div class="<?php echo $col;?>">
                    <img src="<?php echo $this->request->webroot;?>img/package/final/<?php echo $pack->route_map?>" style="max-width: 100%;" />
                </div>
                <?php
                }
                else
                $col = 'col-md-12';
                ?>
                <div class="<?php echo $col?>">
                <h2>Route Analysis</h2>
                <hr />
                    <p>
                        <?php if($pack->grade){?><strong><span class="fa fa-line-chart"></span> Grade:</strong> <?php echo $pack->grade;}?>
                    </p>
                    <p>
                        <?php if($pack->start_point){?><strong><span class="fa fa-car"></span> Start Point/End Point:</strong> <?php echo $pack->start_point.'/'.$pack->end_point;}?>
                    </p>
                        <?php if($pack->best_time){?><strong><span class="fa fa-clock-o"></span> Best Time:</strong> <?php echo $pack->best_time;}?>
                    </p>
                </div>
                </div>
                <?php
            }
            ?>
            <hr />
            <h4 class="head padleft0"><span class="m_2">Place your comment below</span></h4>
            <div class="fb-comments common" data-href="<?php echo $url;?>" data-numposts="5" style="width:100%;"></div>
            </div>
            <div class="clearfix"></div>
    </div>
  </div>
           
            
            