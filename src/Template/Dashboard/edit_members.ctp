<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-10">
                    <h3>
                        Video Manager <span class="small">Add/Edit Associate Members</span>                
                    </h3>
                       <?php
                //var_dump($model);die();
                if(isset($model)){

                    //$cid = $model->cat_id;
                     $image = $model->image;
                    //$desc = $model->description;
                     $link = $model->link;
                 
                }
                else{
                    //$cid = 0;
                    $image = '';
                    //$desc = '';
                    $link='';
               
                }
                
                //$category = $cat->find()->all();
                ?>
                </div>
                <div class="col-md-2" >
                    <a href="<?php echo $this->request->webroot;?>dashboard/editMembers/0" class="btn btn-success btn-lg">Add New</a>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="<?php echo $this->request->webroot;?>dashboard/saveMembers/<?php if(isset($model->id))echo $model->id;else echo "0";?>" method="post" enctype="multipart/form-data">
                
                
                 <div class="form-group">
                    <label class="col-md-3">Image</label>
                    <div class="col-md-6">
                        <?php
                        if($image!="")echo "<img src='".$this->request->webroot."img/members/".$model->image."' width='50px' height='50px'/>";?>
                        <input type="file" class="form-control" name="image"  <?php echo ($image!='')?"":"required";?> />
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                
                <div class="form-group">
                    <label class="col-md-3">Link</label>
                    <div class="col-md-6">
                        <input type="url" class="form-control" name="link" value="<?php echo $link;?>" placeholder="Link to associate members website."  />
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
