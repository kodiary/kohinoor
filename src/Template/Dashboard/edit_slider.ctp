<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-10">
                    <h3>
                        Slider Manager <span class="small">Add/Edit Slider</span>                
                    </h3>
                <?php
                if(isset($model)){
                 
                $title = $model->title;
                $caption = $model->caption;
                $img = $model->image;
                
                }
                else{
                
                $title = '';
                $caption = '';
                $img ='';
                
                }
                
                ?>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo $this->request->webroot;?>dashboard/editSlider/0" class="btn btn-success btn-lg">Add New</a>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="<?php echo $this->request->webroot;?>dashboard/saveSlider/<?php if(isset($model->id))echo $model->id;else echo "0";?>" method="post" enctype="multipart/form-data">
                
                 <div class="form-group">
                    <label class="col-md-3">Title</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="title"><?php echo $title;?></textarea> <strong>USE BOLD TO HIGHLLIGHT</strong>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-md-3">Caption</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="caption"><?php echo $caption;?></textarea> 
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-md-3">Image</label>
                    <div class="col-md-9"> 
                        <input type="file" name="myfile" id="image" /> (1500px 495px)
                        <?php if($img!=''){?>
                        <div class="imagebody img-preview preview-lg" id="preview" style="width: 700px;height:230px;">
                        
                          <img src="<?php echo $this->request->webroot?>assets/frontend/pages/img/layerslider/<?php echo $img?>" style="max-width: 100%;;" />
                          
                        </div>
                        <?php  
                         }?> 
                        
                        
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
CKEDITOR.replace( 'title' );
</script>