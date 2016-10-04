<?php use Cake\ORM\TableRegistry;?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-10">
                    <h3>
                        Package Manager <span class="small">Add/Edit Package</span>                
                    </h3>
                <?php
                if(isset($model)){
                 $cid = $model->cat_id;
                $title = $model->title;
                $grade = $model->grade;
                $start_point = $model->start_point;
                $end_point = $model->end_point;
                $cost_detail = $model->cost_detail;
                $route_map = $model->route_map;
                $best_time = $model->best_time;
                $desc = $model->description;
                $img =  $model->image;
                $is_new =  $model->is_new;
                $coun = $model->country_id;
                $is_tour = $model->is_tour;
                }
                else{
                $cid = 0;
                $title = '';
                $desc = '';
                $img ='';
                $grade = '';
                $start_point = '';
                $end_point = '';
                $cost_detail = '';
                $route_map = '';
                $best_time = '';
                $is_new ='';
                $coun = '';
                $is_tour = 0;
                }
                $category = $cat->find()->all();
                ?>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo $this->request->webroot;?>dashboard/editPackage/0" class="btn btn-success btn-lg"  <?php if($cid==0){echo 'style="display: none"';} ?> >Add New</a>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="<?php echo $this->request->webroot;?>dashboard/savePackage/<?php if(isset($model->id))echo $model->id;else echo "0";?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3">Package Category</label>
                    <div class="col-md-6">
                        <select name="cat_id" class="form-control">
                            <option value="">Choose Category</option>
                            <?php
                            foreach($category as $c)
                            {
                                ?>
                                <option value="<?php echo $c->id?>" <?php if($c->id == $cid){?>selected="selected"<?php }?>><?php echo $c->title;?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                 <div class="form-group">
                    <label class="col-md-3">Title</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title" value="<?php echo $title;?>" />
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                 
                 <div class="form-group">
                    <label class="col-md-3">Country</label>
                    <div class="col-md-6">
                    <select name="country_id" class="form-control">
                    <option value="">Choose Country</option>
                    <?php 
                 $country = TableRegistry::get('TblCountries')->find()->all();
                 foreach($country as $co)
                 {
                    ?>
                    <option value="<?php echo $co->id;?>" <?php if($coun == $co->id){?>selected="selected"<?php }?>><?php echo $co->countryName;?></option>
                    <?php
                 }
                 ?>
                     </select>   
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-md-3">Image</label>
                    <div class="col-md-9"> 
                        <input type="hidden" name="image" id="image" />
                        <div class="imagebody img-preview preview-lg" id="preview">
                        <?php if($img!=''){
                          ?>
                          <img src="<?php echo $this->request->webroot;?>img/package/final/<?php echo $img;?>" />
                          <?php  
                         }?> 
                        </div>
                        <div class="imageaction">
                            <a href="javascript:void(0)" class="btn btn-info" id="upload">Browse</a>
                            <br />
                            <a href="javascript:void(0)" class="btn btn-default cropper">Crop</a>
                             <input class="crop_value"  type="hidden"  name="crop_value" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="cropbody img-container" style="display: none;float: left;width:785px">
                        </div>
                        <div class="clearfix"></div>
                        <div class="docs-data" style="display: none;" >
                      <div class="input-group">
                        <label class="input-group-addon" for="dataX">X</label>
                        <input class="form-control" id="dataX" type="text" placeholder="x" name="x">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataY">Y</label>
                        <input class="form-control" id="dataY" type="text" placeholder="y" name="y">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataWidth">Width</label>
                        <input class="form-control" id="dataWidth" type="text" placeholder="width" name="w">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataHeight">Height</label>
                        <input class="form-control" id="dataHeight" type="text" placeholder="height" name="h">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataRotate">Rotate</label>
                        <input class="form-control" id="dataRotate" type="text" placeholder="rotate">
                        <span class="input-group-addon">deg</span>
                      </div>
                    </div>
                        
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                 <div class="form-group">
                    <label class="col-md-3">Package Grade</label>
                    <div class="col-md-6">
                        <select name="grade" class="form-control">
                            <option value="Easy" <?php if($grade=="Easy"){?>selected="selected"<?php }?>>Easy</option>
                            <option value="Moderate" <?php if($grade=="Moderate"){?>selected="selected"<?php }?>>Moderate</option>
                            <option value="Tough" <?php if($grade=="Tough"){?>selected="selected"<?php }?>>Tough</option>
                        </select>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                 <div class="form-group">
                    <label class="col-md-3">Journey Start/End Point</label>
                    <div class="col-md-3">
                        <input type="text" name="start_point" value="<?php echo $start_point;?>" placeholder="Start Point" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="end_point" value="<?php echo $end_point;?>" placeholder="End Point" class="form-control" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <hr />
                 <div class="form-group">
                    <label class="col-md-3">Best Time</label>
                    <div class="col-md-6">
                        <input type="text" name="best_time" placeholder="Best Time" value="<?php echo $best_time;?>" class="form-control" />
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <hr />
                 <div class="form-group">
                    <label class="col-md-3">Route Map</label>
                    <div class="col-md-6">
                        <input type="file" name="route_map" placeholder="Route Map" class="form-control" />
                        <?php 
                        if($route_map)
                        {
                            ?>
                            <br />
                            <img src="<?php echo $this->request->webroot;?>img/package/final/<?php echo $route_map?>" width="150" />
                            <?php
                        }
                        ?>
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
                    <label class="col-md-3">Cost Detail</label>
                    <div class="col-md-6"> 
                        <textarea name="cost_detail"><?php echo $cost_detail?></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <hr />
                
                
                 <div class="form-group">
                    <label class="col-md-3">Itenerary</label>
                    <div class="col-md-6"> 
                        <div class="field_wrapper"> 
                                <?php 
                                if(isset($model1)){
                                    $counter=0;
                                    foreach($model1 as $k){
                                        $counter++;
                                        if($counter!=1)
                                        {
                                            echo "<hr/>";
                                        }
                                        ?>
                                    <div>
                                        <input name="iteniery[title][]" placeholder="Title" class="form-control" value="<?php echo $k->title; ?>" /><br/>
                                        <textarea name="iteniery[desc][]" placeholder="Description" class="form-control"><?php echo $k-> description; ?></textarea><br/>
                                        <a href="javascript:void(0);" class="remove_button btn btn-danger" title="Remove field">Remove</a>
                                    </div>
                                    <?php
                                        }
                                    }
                                else{
                                    ?>
                                    <div>
                                        <input name="iteniery[title][]" placeholder="Title" class="form-control" required />
                                        <br/>
                                        <textarea name="iteniery[desc][]" placeholder="Description" class="form-control" required></textarea>
                                    </div>
                                    <?php
                                }
                                
                            
                            ?>
                        </div>
                        <hr />
                                <a href="javascript:void(0);" class="add_button btn btn-info" title="Add field">Add More</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-md-3">Set As New Package</label>
                    <div class="col-md-6"> 
                        <input type="checkbox" name="is_new" value="1" <?php if($is_new==1)echo "checked='checked'";?> />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-md-3">Set as Tour</label>
                    <div class="col-md-6"> 
                        <input type="checkbox" name="is_tour" value="1" <?php if($is_tour==1)echo "checked='checked'";?> />
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
    CKEDITOR.replace( 'cost_detail' );
    $(function(){
        fileUpload('upload')
    })
    function fileUpload(ID) {
        
        var upload = new AjaxUpload("#" + ID, {
            action: "<?php echo $this->request->webroot;?>dashboard/fileUpload?type=",
            enctype: 'multipart/form-data',
            name: 'myfile',
            onSubmit: function (file, ext) {

            },
            onComplete: function (file, response) {
                if (response != 'error') {
                    $('#image').val(response);
                    $('.imagebody').html('<img src="<?php echo $this->request->webroot;?>img/package/resized/'+response+'" style="width:300px;height:300px;" />');
                    $('.cropbody').show();
                    $('.cropbody').html('<img id="cropbox1" src="<?php echo $this->request->webroot;?>img/package/resized/'+response+'" style="width:785px;" class="tocrop" />');
                    
                    
                    
                    
                    
                    'use strict';

                      var console = window.console || { log: function () {} },
                          $alert = $('.docs-alert'),
                          $message = $alert.find('.message'),
                          showMessage = function (message, type) {
                            $message.text(message);
                    
                            if (type) {
                              $message.addClass(type);
                            }
                    
                            $alert.fadeIn();
                    
                            setTimeout(function () {
                              $alert.fadeOut();
                            }, 3000);
                          };
                    
                      // Demo
                      // -------------------------------------------------------------------------
                    
                      (function () {
                        var $image = $('.img-container > img'),
                            $dataX = $('#dataX'),
                            $dataY = $('#dataY'),
                            $dataHeight = $('#dataHeight'),
                            $dataWidth = $('#dataWidth'),
                            $dataRotate = $('#dataRotate'),
                            options = {
                              aspectRatio: 1,
                              autoCropArea: 1,
                              zoomable: false,
                              minCropBoxWidth: 250,
                              preview: '.img-preview',
                              crop: function (data) {
                                $dataX.val(Math.round(data.x));
                                $dataY.val(Math.round(data.y));
                                $dataHeight.val(Math.round(data.height));
                                $dataWidth.val(Math.round(data.width));
                                $dataRotate.val(Math.round(data.rotate));
                              }
                            };
                    
                        $image.on({
                          'build.cropper': function (e) {
                            console.log(e.type);
                          },
                          'built.cropper': function (e) {
                            console.log(e.type);
                          }
                        }).cropper(options).toDataURL('image/jpeg');
                    
                    
                        // Methods
                        $(document.body).on('click', '[data-method]', function () {
                          var data = $(this).data(),
                              $target,
                              result;
                    
                          if (data.method) {
                            data = $.extend({}, data); // Clone a new one
                    
                            if (typeof data.target !== 'undefined') {
                              $target = $(data.target);
                    
                              if (typeof data.option === 'undefined') {
                                try {
                                  data.option = JSON.parse($target.val());
                                } catch (e) {
                                  console.log(e.message);
                                }
                              }
                            }
                    
                            result = $image.cropper(data.method, data.option);
                    
                            if (data.method === 'getDataURL') {
                              $('#getDataURLModal').modal().find('.modal-body').html('<img src="' + result + '">');
                            }
                    
                            if ($.isPlainObject(result) && $target) {
                              try {
                                $target.val(JSON.stringify(result));
                              } catch (e) {
                                console.log(e.message);
                              }
                            }
                    
                          }
                        }).on('keydown', function (e) {
                    
                          switch (e.which) {
                            case 37:
                              e.preventDefault();
                              $image.cropper('move', -1, 0);
                              break;
                    
                            case 38:
                              e.preventDefault();
                              $image.cropper('move', 0, -1);
                              break;
                    
                            case 39:
                              e.preventDefault();
                              $image.cropper('move', 1, 0);
                              break;
                    
                            case 40:
                              e.preventDefault();
                              $image.cropper('move', 0, 1);
                              break;
                          }
                    
                        });
                    
                    
                        // Import image
                        var $inputImage = $('#inputImage'),
                            URL = window.URL || window.webkitURL,
                            blobURL;
                    
                        if (URL) {
                          $inputImage.change(function () {
                            var files = this.files,
                                file;
                    
                            if (files && files.length) {
                              file = files[0];
                    
                              if (/^image\/\w+$/.test(file.type)) {
                                blobURL = URL.createObjectURL(file);
                                $image.one('built.cropper', function () {
                                  URL.revokeObjectURL(blobURL); // Revoke when load complete
                                }).cropper('reset', true).cropper('replace', blobURL);
                                $inputImage.val('');
                              } else {
                                showMessage('Please choose an image file.');
                              }
                            }
                          });
                        } else {
                          $inputImage.parent().remove();
                        }
                    
                    
                        // Options
                        $('.docs-options :checkbox').on('change', function () {
                          var $this = $(this);
                    
                          options[$this.val()] = $this.prop('checked');
                          $image.cropper('destroy').cropper(options);
                        });
                    
                    
                        // Tooltips
                        $('[data-toggle="tooltip"]').tooltip();
                    
                      }());
                    
                    
                    
                    
                    
                } else {
                    alert('Invalid file type.');
                }
            }

        });
    }
    
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.cropper').click(function(){
    $('.cropbody').show();$('.crop_value').val('1');
        <?php if($img!=''){
      ?>
        $('.cropbody').html('<img src=\'<?php echo $this->request->webroot.'img/package/resized/'.$img;?>\' />');
        'use strict';

                      var console = window.console || { log: function () {} },
                          $alert = $('.docs-alert'),
                          $message = $alert.find('.message'),
                          showMessage = function (message, type) {
                            $message.text(message);
                    
                            if (type) {
                              $message.addClass(type);
                            }
                    
                            $alert.fadeIn();
                    
                            setTimeout(function () {
                              $alert.fadeOut();
                            }, 3000);
                          };
                    
                      // Demo
                      // -------------------------------------------------------------------------
                    
                      (function () {
                        var $image = $('.img-container > img'),
                            $dataX = $('#dataX'),
                            $dataY = $('#dataY'),
                            $dataHeight = $('#dataHeight'),
                            $dataWidth = $('#dataWidth'),
                            $dataRotate = $('#dataRotate'),
                            options = {
                              aspectRatio: 1,
                              autoCropArea: 1,
                              zoomable: false,
                              minCropBoxWidth: 250,
                              preview: '.img-preview',
                              crop: function (data) {
                                $dataX.val(Math.round(data.x));
                                $dataY.val(Math.round(data.y));
                                $dataHeight.val(Math.round(data.height));
                                $dataWidth.val(Math.round(data.width));
                                $dataRotate.val(Math.round(data.rotate));
                              }
                            };
                    
                        $image.on({
                          'build.cropper': function (e) {
                            console.log(e.type);
                          },
                          'built.cropper': function (e) {
                            console.log(e.type);
                          }
                        }).cropper(options).toDataURL('image/jpeg');
                    
                    
                        // Methods
                        $(document.body).on('click', '[data-method]', function () {
                          var data = $(this).data(),
                              $target,
                              result;
                    
                          if (data.method) {
                            data = $.extend({}, data); // Clone a new one
                    
                            if (typeof data.target !== 'undefined') {
                              $target = $(data.target);
                    
                              if (typeof data.option === 'undefined') {
                                try {
                                  data.option = JSON.parse($target.val());
                                } catch (e) {
                                  console.log(e.message);
                                }
                              }
                            }
                    
                            result = $image.cropper(data.method, data.option);
                    
                            if (data.method === 'getDataURL') {
                              $('#getDataURLModal').modal().find('.modal-body').html('<img src="' + result + '">');
                            }
                    
                            if ($.isPlainObject(result) && $target) {
                              try {
                                $target.val(JSON.stringify(result));
                              } catch (e) {
                                console.log(e.message);
                              }
                            }
                    
                          }
                        }).on('keydown', function (e) {
                    
                          switch (e.which) {
                            case 37:
                              e.preventDefault();
                              $image.cropper('move', -1, 0);
                              break;
                    
                            case 38:
                              e.preventDefault();
                              $image.cropper('move', 0, -1);
                              break;
                    
                            case 39:
                              e.preventDefault();
                              $image.cropper('move', 1, 0);
                              break;
                    
                            case 40:
                              e.preventDefault();
                              $image.cropper('move', 0, 1);
                              break;
                          }
                    
                        });
                    
                    
                        // Import image
                        var $inputImage = $('#inputImage'),
                            URL = window.URL || window.webkitURL,
                            blobURL;
                    
                        if (URL) {
                          $inputImage.change(function () {
                            var files = this.files,
                                file;
                    
                            if (files && files.length) {
                              file = files[0];
                    
                              if (/^image\/\w+$/.test(file.type)) {
                                blobURL = URL.createObjectURL(file);
                                $image.one('built.cropper', function () {
                                  URL.revokeObjectURL(blobURL); // Revoke when load complete
                                }).cropper('reset', true).cropper('replace', blobURL);
                                $inputImage.val('');
                              } else {
                                showMessage('Please choose an image file.');
                              }
                            }
                          });
                        } else {
                          $inputImage.parent().remove();
                        }
                    
                    
                        // Options
                        $('.docs-options :checkbox').on('change', function () {
                          var $this = $(this);
                    
                          options[$this.val()] = $this.prop('checked');
                          $image.cropper('destroy').cropper(options);
                        });
                    
                    
                        // Tooltips
                        $('[data-toggle="tooltip"]').tooltip();
                    
                      }());
      <?php  
     }?> 
    })
    var maxField = 100; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><hr/><input name="iteniery[title][]" placeholder="Title" class="form-control" required /><br/><textarea placeholder="Description" name="iteniery[desc][]" class="form-control" required></textarea><br/><a href="javascript:void(0);" class="remove_button btn btn-danger" title="Remove field">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>