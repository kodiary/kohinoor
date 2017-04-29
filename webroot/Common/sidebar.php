<?php
use Cake\ORM\TableRegistry;
?>
<?php
          $cond_p = '';
          $cond_t = '';
          if((isset($pcat) && count($pcat)) || (isset($tcat) && count($tcat)))
          {
            if(isset($pcat) && count($pcat))
            {
                foreach($pcat as $pc)
                {
                    if($cond_p == '')
                    $cond_p = 'cat_id = '.$pc;
                    else
                    $cond_p = $cond_p.' OR '. 'cat_id = '.$pc;
                }
            }
            
            if(isset($tcat) && count($tcat))
            {
                foreach($tcat as $tc)
                {
                    if($cond_t == '')
                    $cond_t = 'cat_id = '.$tc;
                    else
                    $cond_t = $cond_t.' OR '. 'cat_id = '.$tc;
                }
            }
          }
          if($cond_p || $cond_t)
          {
            //$sql = "SELECT video_id FROM tags WHERE ".$cond;
            if(isset($pslug) && $cond_p)
            {
                $cond_p = '('.$cond_p.') AND slug <> "'.$pslug.'"';
            }
            if(isset($tslug) && $cond_t)
            {
                $cond_t = '('.$cond_t.') AND slug <> "'.$tslug.'"';
            }
            if($cond_p)
            $pack_side = TableRegistry::get('Packages')->find()->where(['is_tour = 0 AND ('.$cond_p.')'])->order('rand()')->limit(4)->all();
            if($cond_t)
            $tour_side = TableRegistry::get('Tours')->find()->where(['is_tour = 1 AND ('.$cond_p.')'])->order('rand()')->limit(4)->all();
          }
          
          ?>
<div class="col-md-3 sidebar_box">
<div class="sidebar">
<div class="menu_box">
 <?php include(APP.'../webroot/Common/advance_search.php');?>   
  
                     
              <?php 
              if(!isset($pack_side) && !isset($tour_side))
              {
                ?>
                <h3 class="menu_head">Pages</h3>
               <ul class="menu borders" style="">
                <?php
              $pgcats = TableRegistry::get('PageCategory')->find()->order(['id'=>'desc'])->all();
              foreach($pgcats as $pgc)
              {
               ?>
                        <li class="<?php echo 'item'.$pgc->id?>">   
                         <a href="javascript:void(0)"><img class="arrow-img" alt="" src="<?php echo $this->request->webroot;?>new_layout/images/f_menu.png"> <?php echo $pgc->title?></a>
                        <ul class="cute" style="display: none;">
                        <?php 
                            $pg = TableRegistry::get('Pages')->find()->where(['cat_id'=>$pgc->id])->order(['id'=>'desc'])->all();
                            foreach($pg as $pages)
                            {
                                ?>
                                
                                    <li class="subitem1">
                                    <a href="<?php echo $this->request->webroot;?>pages/view/<?php echo $pages->slug;?>"><?php echo $pages->title;?></a>
                                    </li>
                                
                                
                                <?php
                            }
                            if(strtolower($pgc->title) == 'main pages')
                            {?>
                                <li class="subitem1">
                                    <a href="<?php echo $this->request->webroot;?>pages/team">Our Team</a>
                                </li>
                                 <li class="subitem1">
                                    <a href="<?php echo $this->request->webroot;?>pages/testimonial">Tesimonials</a>
                                </li>
                             <?php 
                            }
                        ?>
                        </ul>
                    </li>
               
               
               <?php 
              }
              ?>
              </ul>
              <?php
              }
              else
              {
                if(isset($pack_side) && count($pack_side))
                {
                    ?>
                    <h3 class="menu_head">Related Packages</h3>
                    
                    <?php
                    foreach($pack_side as $ps)
                    {
                        ?>
                        <div class="side_group">
                         <div class="image_side" style="height: 175px;position:relative;overflow:hidden;">
                        <img style="max-width: 100%;position: absolute;top:-44px;" src="
                        <?php 
                        echo $this->request->webroot.'img/package/final/'.$ps->image;
                        ?>
                        " />
                        
                        </div>
                        <a href="<?php echo $this->request->webroot?>package/<?php echo $ps->slug;?>"><?php echo $ps->title;?></a>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                }
                if(isset($tour_side))
                {
                    ?>
                    <h3 class="menu_head">Related Tours</h3>
                    <?php
                    foreach($tour_side as $ps)
                    {
                        ?>
                        <div class="side_group">
                        <div class="image_side" style="height: 130px;position:relative;overflow:hidden;">
                         <img style="max-width: 100%;position: absolute;top:-44px;" src="
                        <?php 
                        echo $this->request->webroot.'img/tour/final/'.$ps->image;
                        ?>
                        " />
                        </div>
                       <a href="<?php echo $this->request->webroot?>package/<?php echo $ps->slug;?>"><?php echo $ps->title;?></a>
                        </div>
                        <hr />
                        <?php
                    }
                    ?>
                    <?php
                }
              }
              ?> 
              <?php
              if($this->request->params['controller'] == 'Package')
              {
               
              ?>
              <h3 class="menu_head">Enquire Package</h3>
              <div class="enquire">
              <form method="post" class="enuire_package"  style="background: #FFF;padding:10px;">
                <input type="hidden" name="p_id" value="<?php if(isset($pack))echo $pack->title;?>"/>
                <input type="hidden" name="cap" value=""/>
                  <div class="form-group">
                    <label class="col-md-12 padding-left-0">Full Name</label>
                    <div class="col-md-12 padding-left-0"><input type="text" class="form-control" name="name" required="required" /></div>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-12 padding-left-0">Email</label>
                    <div class="col-md-12 padding-left-0"><input type="email" class="form-control" name="email" required="required" /></div>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-12 padding-left-0">Phone</label>
                    <div class="col-md-12 padding-left-0"><input type="text" class="form-control" name="phone" required="required" /></div>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-12 padding-left-0">Message</label>
                    <div class="col-md-12 padding-left-0"><textarea name="message" class="form-control" required="required"></textarea></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12"><input type="submit" class="btn btn-info" value="Submit"/></div>
                    <div class="clearfix"></div>
                  </div>
              </form>
              </div>
              <?php }?>
          </div>
          </div>
          </div>
          
<script>
$(function(){
    $('.enuire_package').submit(function(event){
        event.preventDefault();
        var type = '';
        <?php
        if($this->request->action=='contactus')
        {?>
            type = 'contactus';
        <?php
        }?>
        $.ajax({
            type    :'post',
            url     :'<?php echo $this->request->webroot;?>package/enquire?type='+type,
            data    : $(this).serialize(),
            success : function(msg){
                if(msg == 'OK')
                {
                    $('.enquire').html('Thankyou!');
                    
                }
                    
            }
        })
    })
})

</script>