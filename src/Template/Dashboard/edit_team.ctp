<?php
if($this->request->params['action']=='editTestimonial'){
   $page_t = "Tesimonails";
   $p_name = "Title";
   $is_testimonail = 1;
   $edit_url =  $this->request->webroot."dashboard/editTestimonial/0";
       
}
else{
    $page_t = "My Team";
    $p_name = "Name";
    $is_testimonail = 0;
     $edit_url =  $this->request->webroot."dashboard/editTeam/0";
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-10">
                    <h3>
                        <?php echo $page_t;?> Manager <span class="small">Add/Edit <?php echo $page_t;?></span>                
                    </h3>
                       <?php
                //var_dump($model);die();
                if(isset($model)){

                     $title = $model->title;
                     $image = $model->image;
                     $desc = $model->description;
                     $designation = $model->designation;
                 
                }
                else{
                    $title = '';
                    $image = '';
                    $desc = '';
                    $designation='';
               
                }
                
                //$category = $cat->find()->all();
                ?>
                </div>
                <div class="col-md-2" >
                    <a href="<?php echo $edit_url;?>" class="btn btn-success btn-lg">Add New</a>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="<?php echo $this->request->webroot;?>dashboard/saveTeam/<?php if(isset($model->id))echo $model->id;else echo "0";?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="is_testimonial" value="<?php echo $is_testimonail;?>" />
                <div class="form-group">
                    <label class="col-md-3"><?php echo $p_name;?></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title" value="<?php echo $title;?>" required="required"  />
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                
                <hr />
                 <div class="form-group">
                    <label class="col-md-3">Image</label>
                    <div class="col-md-6">
                        <?php
                        if($image!="")echo "<img src='".$this->request->webroot."img/team/".$model->image."' width='100px' height='100px'/>";?>
                        <input type="file" class="form-control" name="image"  <?php echo ($image!='')?"":"required";?> />
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                <?php if($is_testimonail==0){?>
                <div class="form-group">
                    <label class="col-md-3">Designation</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="designation" value="<?php echo $designation;?>" required="required" />
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <?php }?>
                <hr />
                <div class="form-group">
                    <label class="col-md-3">Description</label>
                    <div class="col-md-6">
                        <textarea name="description" required="required"><?php echo $desc;?></textarea>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                
                <hr />
                <div class="form-group">
                    <label class="col-md-3"> </label>
                    <div class="col-md-6">
                        <input type="submit" value="Submit" class="btn btn-primary btn-lg" />                    
                    </div>
                    <div class="clearfix"></div>
                </div>
                </form>
                    
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'description' );
    
</script>
<style>
.cke_1_contents{height:350px!important;}
</style>