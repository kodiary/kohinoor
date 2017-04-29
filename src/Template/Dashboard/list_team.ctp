<?php
if($this->request->params['action']=='listTestimonial'){
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
                        <?php echo $page_t;?> Manager <span class="small">List <?php echo $page_t;?></span>                
                    </h3>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo $edit_url;?>" class="btn btn-success btn-lg">Add New</a>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered">
                <tr><td><strong>SN</strong></td><td><strong><?php echo $p_name;?></strong></td>
                    <td><strong>Image</strong></td>
                    <?php if($is_testimonail==0){?><td>Designatoin</td><?php }?>
                    <td><strong>Actions</strong></td></tr>
                <?php
                $i=0;
                foreach($model as $m)
                {
                    $i++;
                    
                    ?>
                    <tr><td><?php echo $i;?></td>
                        <td><?php echo $m->title;?></td>
                        <td><img src="<?php echo $this->request->webroot."img/team/".$m->image;?>"  height="100px"/></td>
                        <?php if($is_testimonail==0){?><td><?php echo $m->designation;?></td><?php }?>
                        <td><a href="<?php echo $edit_url.$m->id;?>" class="btn btn-primary">Edit</a> <a href="<?php echo $this->request->webroot;?>dashboard/deleteteam/<?php echo $m->id;?>" class="btn btn-danger">Delete</a></td></tr>
                    
                    <?php
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>