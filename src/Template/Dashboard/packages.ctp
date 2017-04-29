<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-10">
                    <h3>
                        <?php if(isset($_GET['is_tour'])){?>Tour<?php }else{?>Package<?php }?> Manager                
                    </h3>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo $this->request->webroot;?>dashboard/editPackage/0" class="btn btn-success btn-lg">Add New</a>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered">
                <?php
                $cat_id = 0;
                $i=0;
                $j=0;
                foreach($model as $m)
                {
                    $j++;
                    $i++;
                    $cid = $m->cat_id;
                    if($cat_id!=$cid)
                    {
                        $i=1;
                        $cat_id = $cid;
                        $category = $cat->find()->where(['id'=>$cat_id])->first();
                        ?>
                        <tr><td colspan="3"><h2><?php echo $category->title;?></h2></td></tr>
                        
                        
                            <tr><td><strong>SN</strong></td><td><strong>Title</strong></td><td><strong>Actions</strong></td></tr>
                        
                        <?php
                    }
                    ?>
                    <tr><td><?php echo $i;?></td><td><?php echo $m->title;?></td><td><a href="<?php echo $this->request->webroot;?>dashboard/editPackage/<?php echo $m->id;if(isset($_GET['is_tour'])){?>?is_tour=1<?php }?>" class="btn btn-primary">Edit</a> <a href="<?php echo $this->request->webroot;?>dashboard/deletePackage/<?php echo $m->id;?>" class="btn btn-danger">Delete</a></td></tr>
                    
                    <?php
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>