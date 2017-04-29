<?php use Cake\ORM\TableRegistry;
if(isset($key))
$_GET['keyword'] = $key;
else
$_GET['keyword'] = '';

if(isset($_GET['country']) && $_GET['country'])
{
    $coun = $_GET['country'];
}
else
$coun = '';

if(isset($_GET['days']))
{
    $days = $_GET['days'];
}
else
$days = '';
?>
     <h3 class="menu_head">Advance search</h3>
     <form method="get" action="<?php echo $this->request->webroot;?>search" style="background: #FFF;padding:10px;">
         <div class="form-group">
         <input style="height: 32px;" type="text" placeholder="Keyword" class="form-control" name="keyword" value="<?php echo $_GET['keyword'];?>" style="height: 27px;padding: 0 5px" />
         <div class="clearfix"></div>
         </div>   
         <div class="form-group">
             <select name="country" class="form-control">
                 <option value="">SELECT COUNTRY</option>
                 <?php 
                 $country = TableRegistry::get('TblCountries')->find()->where(['(id IN (SELECT country_id FROM packages WHERE country_id>0) OR id IN (SELECT country_id FROM tours WHERE country_id>0))'])->all();
                 foreach($country as $co)
                 {
                    ?>
                    <option value="<?php echo $co->id;?>" <?php if($coun == $co->id){?>selected="selected"<?php }?>><?php echo $co->countryName;?></option>
                    <?php
                 }
                 ?>
             </select>
         </div>
         <div class="form-group">
             
             <div class="col-md-12 padding-left-0">
                <input type="checkbox" name="Packages" <?php if(isset($_GET['Packages']) && $_GET['Packages']){?>checked="checked"<?php }?> value="1" onchange="if($(this).is(':checked'))$('.p_hide').show();else{$('.p_hide').hide();}" /> Packages &nbsp; &nbsp; <input type="checkbox" name="Tours" <?php if(isset($_GET['Tours']) && $_GET['Tours']){?>checked="checked"<?php }?> value="1" onchange="if($(this).is(':checked'))$('.t_hide').show();else{$('.t_hide').hide();}" /> Tours
             </div>
             <div class="clearfix"></div>
         </div>
         <div class="form-group p_hide" style="<?php if(isset($_GET['Packages']) && $_GET['Packages']){?><?php }else{?>display: none;<?php }?>">
            <select name="pcat" class="form-control">
                 <option value="">PACKAGE CATEGORY</option>
                 <?php 
                 $pcats = TableRegistry::get('PackageCategory')->find()->all();
                 foreach($pcats as $co)
                 {
                    ?>
                    <option value="<?php echo $co->id;?>" <?php if(isset($_GET['pcat']) && $_GET['pcat']==$co->id){?>selected="selected"<?php }?>><?php echo $co->title;?></option>
                    <?php
                 }
                 ?>
             </select>
         </div>
         <div class="form-group t_hide" style="<?php if(isset($_GET['Tours']) && $_GET['Tours']){?><?php }else{?>display: none;<?php }?>">
            <select name="tcat" class="form-control">
                 <option value="">TOUR CATEGORY</option>
                 <?php 
                 $tcats = TableRegistry::get('TourCategory')->find()->all();
                 foreach($tcats as $co)
                 {
                    ?>
                    <option value="<?php echo $co->id;?>" <?php if(isset($_GET['pcat']) && $_GET['pcat']==$co->id){?>selected="selected"<?php }?>><?php echo $co->title;?></option>
                    <?php
                 }
                 ?>
             </select>
         </div>
         <div class="form-group" style="">
            <select name="days" class="form-control">
                 <option value="">PACKAGE/TOUR DAYS</option>
                 <option value="7" <?php if($days=='7'){?>selected="selected"<?php }?>>1 - 7 days</option>
                 <option value="14" <?php if($days=='14'){?>selected="selected"<?php }?>>8 - 14 days</option>
                 <option value="21" <?php if($days=='21'){?>selected="selected"<?php }?>>15 - 21 days</option>
                 <option value="100" <?php if($days=='100'){?>selected="selected"<?php }?>>21 days +</option>                 
             </select>
         </div>
         <div class="form-group">
         <input type="submit" value="Search" class="btn btn-info" />
         </div>
     </form>  
 <hr />  