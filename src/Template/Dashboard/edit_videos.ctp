<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-10">
                    <h3>
                        Video Manager <span class="small">Add/Edit Video</span>                
                    </h3>
                       <?php
                //var_dump($model);die();
                if(isset($model)){

                //$cid = $model->cat_id;
                 $title = $model->title;
                //$desc = $model->description;
                 $youtube = $model->youtube;
                 $tags = $model->tags;
                }
                else{
                //$cid = 0;
                $title = '';
                //$desc = '';
                $tags='';
                $youtube ='';
                }
                
                //$category = $cat->find()->all();
                ?>
                </div>
                <div class="col-md-2" >
                    <a href="<?php echo $this->request->webroot;?>dashboard/editVideos/0" class="btn btn-success btn-lg">Add New</a>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="<?php echo $this->request->webroot;?>dashboard/savevideos/<?php if(isset($model->id))echo $model->id;else echo "0";?>" method="post">
                
                
                 <div class="form-group">
                    <label class="col-md-3">Youtube</label>
                    <div class="col-md-6">
                        <input type="url" class="form-control" name="youtube" value="<?php echo $youtube;?>" required />
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                
                <div class="form-group">
                    <label class="col-md-3">Tags</label>
                    <div class="col-md-6">
                        <?php
                        foreach($package as $p)
                        {
                            ?>
                            <div class="col-md-4 padding-left-0"><input type="checkbox" name="tags[]" value="<?php echo 'p'.$p->id;?>" /> <?php echo substr($p->title,0,16);if(strlen($p->title)>16)echo "..";?> &nbsp; &nbsp;</div>
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
                        <input type="submit" value="Submit" class="btn btn-primary btn-lg" />                    
                    </div>
                    <div class="clearfix"></div>
                </div>
                </form>
                    
            </div>
        </div>
    </div>
</div>
