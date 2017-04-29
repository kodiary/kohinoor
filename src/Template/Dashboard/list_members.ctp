<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-10">
                    <h3>
                        Associate Members Manager <span class="small">List Associate Members</span>                
                    </h3>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo $this->request->webroot;?>dashboard/editMembers/0" class="btn btn-success btn-lg">Add New</a>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered">
                <tr><td><strong>SN</strong></td><td><strong>Image</strong></td><td><strong>Actions</strong></td></tr>
                <?php
                $i=0;
                foreach($model as $m)
                {
                    $i++;
                    
                    ?>
                    <tr><td><?php echo $i;?></td><td><img src="<?php echo $this->request->webroot."img/members/".$m->image;?>" width="50px" height="50px"/></td><td><a href="<?php echo $this->request->webroot;?>dashboard/editMembers/<?php echo $m->id;?>" class="btn btn-primary">Edit</a> <a href="<?php echo $this->request->webroot;?>dashboard/deletemembers/<?php echo $m->id;?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td></tr>
                    
                    <?php
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>