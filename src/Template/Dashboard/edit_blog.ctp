<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-10">
                    <h3>
                        Blog Manager <span class="small">Add/Edit Blog</span>                
                    </h3>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo $this->request->webroot;?>dashboard/editBlog/0" class="btn btn-success btn-lg">Add New</a>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <?php
                if(isset($model)){
                //$cid = $model->cat_id;
                $title = $model->title;
                $desc = $model->description;
                $img = $model->image;
                $created_date = $model->created_date;
                }
                else{
                //$cid = 0;
                $title = '';
                $desc = '';
                $img = '';
                $created_date = '';
                }
                
                //$category = $cat->find()->all();
                ?>
                <form action="<?php echo $this->request->webroot;?>dashboard/saveBlog/<?php if(isset($model->id))echo $model->id;else echo "0";?>" method="post" enctype="multipart/form-data">
                
                 <div class="form-group">
                    <label class="col-md-3">Title</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title" value="<?php echo $title;?>" />
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-md-3">Description</label>
                    <div class="col-md-6"> 
                        <textarea name="description"><?php echo $desc;?></textarea>
                        
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-md-3">Image</label>
                    <div class="col-md-9"> 
                        <input type="file" name="myfile" id="image" /> 
                        <?php if($img!=''){?>
                        <div class="imagebody img-preview preview-lg" id="preview" style="width: 500px;">
                        
                          <img src="<?php echo $this->request->webroot?>img/blogs/<?php echo $img?>" style="max-width: 100%;" />
                          
                        </div>
                        <?php  
                         }?> 
                        
                        
                    </div>
                    <div class="clearfix"></div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-md-3">Tags</label>
                    <div class="col-md-9">
                        <?php
                        $package_array = array();
                        $tour_array = array();
                        foreach($tag as $t)
                                {
                                    $package_array[] = $t->package_id;
                                    $tour_array[] = $t->tour_id;
                                   
                                }
                        foreach($package as $p)
                        {
                            ?>
                            <div class="col-md-4 padding-left-0"><input type="checkbox" name="tags[]" value="<?php echo 'p'.$p->id;?>" 
                             <?php 
                             
                                   if(in_array($p->id,$package_array)) 
                                    {
                                        ?>checked="checked"<?php 
                                    }
                                
                             ?>
                               /> <?php echo substr($p->title,0,16);if(strlen($p->title)>16)echo "..";?> &nbsp; &nbsp;</div>
                            <?php
                            
                        }
                        ?>
                        
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-md-3"> </label>
                    <div class="col-md-6">
                        <input type="hidden" name="created_date" value="<?php if(!$created_date)echo date('Y-m-d'); else echo $created_date;?>" />
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