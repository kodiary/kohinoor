<?php 
if(isset($img_count) && $img_count)
{
    
    foreach($imgs as $im)
    {
        $img = $im->image;
        $cap = $im->caption;
        
        if(!isset($rand))$rand=rand(1000000,9999999);?>
<div class="form-group <?php echo $rand;?>">
                    <label class="col-md-3">Image Slider</label>
                    <div class="col-md-9"> 
                        <div class="img-block">
                        <input type="hidden" name="image[]" id="image_<?php echo $rand;?>" <?php if(isset($img) && $img!=''){?>value="<?php echo $img;?>"<?php }?>/>
                        <div class="imagebody img-preview<?php echo $rand;?> preview-lg" id="preview">
                        <?php if(isset($img) && $img!=''){
                          ?>
                          <img src="<?php echo $this->request->webroot;?>img/package/final/<?php echo $img;?>" />
                          <?php  
                         }?> 
                        </div>
                        <div class="imageaction">
                            <a href="javascript:void(0)" class="btn btn-info" id="upload<?php echo $rand;?>">Browse</a>
                            <br />
                            <a href="javascript:void(0)" class="btn btn-default cropper">Crop</a>
                             <input class="crop_value"  type="hidden"  name="crop_value[]" <?php if(!isset($img) || (isset($img) && $img!='')){?>value="1"<?php }?> />
                        </div>
                        <div class="clearfix"></div>
                        <div class="cropbody img-container" style="display: none;float: left;width:785px">
                        </div>
                        <div class="clearfix"></div>
                        <div class="docs-data" style="display: none;" >
                      <div class="input-group">
                        <label class="input-group-addon" for="dataX">X</label>
                        <input class="form-control" id="dataX_<?php echo $rand;?>" type="text" placeholder="x" name="x[]">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataY">Y</label>
                        <input class="form-control" id="dataY_<?php echo $rand;?>" type="text" placeholder="y" name="y[]">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataWidth">Width</label>
                        <input class="form-control" id="dataWidth_<?php echo $rand;?>" type="text" placeholder="width" name="w[]">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataHeight">Height</label>
                        <input class="form-control" id="dataHeight_<?php echo $rand;?>" type="text" placeholder="height" name="h[]">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataRotate">Rotate</label>
                        <input class="form-control" id="dataRotate_<?php echo $rand;?>" type="text" placeholder="rotate">
                        <span class="input-group-addon">deg</span>
                      </div>
                    </div>
                    <div class="col-md-5 row" style="padding-right: 17px;margin-top:10px">
                    <textarea class="form-control" placeholder="Caption" name="cap[]"><?php echo $cap;?></textarea>
                    </div>
                    <div class="clearfix"></div>
                    </div>    
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
<script type="text/javascript">
$(function(){
    fileUpload('upload<?php echo $rand;?>')
    $('.<?php echo $rand;?> .cropper').click(function(){
    $('.<?php echo $rand;?> .cropbody').show();$('.<?php echo $rand;?> .crop_value').val('1');
        <?php if(isset($img) && $img!=''){
      ?>
        $('.<?php echo $rand;?> .cropbody').html('<img src=\'<?php echo $this->request->webroot.'img/package/resized/'.$img;?>\' />');
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
                        var $image = $('.<?php echo $rand;?> .img-container > img'),
                            $dataX = $('.<?php echo $rand;?> #dataX'),
                            $dataY = $('.<?php echo $rand;?> #dataY'),
                            $dataHeight = $('.<?php echo $rand;?> #dataHeight'),
                            $dataWidth = $('.<?php echo $rand;?> #dataWidth'),
                            $dataRotate = $('.<?php echo $rand;?> #dataRotate'),
                            options = {
                              aspectRatio: 1,
                              autoCropArea: 1,
                              zoomable: false,
                              minCropBoxWidth: 250,
                              preview: '.img-preview<?php echo $rand;?>',
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
    
})
</script>     
        <?php
        unset($rand);
    }
}
else
{
    //die('there');
    if(!isset($rand))$rand=rand(1000000,9999999);?>
<div class="form-group <?php echo $rand;?>">
                    <label class="col-md-3">Image Slider</label>
                    <div class="col-md-9"> 
                        <div class="img-block">
                        <input type="hidden" name="image[]" id="image_<?php echo $rand;?>" <?php if(isset($img) && $img!=''){?>value="<?php echo $img;?>"<?php }?>/>
                        <div class="imagebody img-preview<?php echo $rand;?> preview-lg" id="preview">
                        <?php if(isset($img) && $img!=''){
                          ?>
                          <img src="<?php echo $this->request->webroot;?>img/package/final/<?php echo $img;?>" />
                          <?php  
                         }?> 
                        </div>
                        <div class="imageaction">
                            <a href="javascript:void(0)" class="btn btn-info" id="upload<?php echo $rand;?>">Browse</a>
                            <br />
                            <a href="javascript:void(0)" class="btn btn-default cropper">Crop</a>
                             <input class="crop_value"  type="hidden"  name="crop_value[]" <?php if(!isset($img) || (isset($img) && $img!='')){?>value="1"<?php }?> />
                        </div>
                        <div class="clearfix"></div>
                        <div class="cropbody img-container" style="display: none;float: left;width:785px">
                        </div>
                        <div class="clearfix"></div>
                        <div class="docs-data" style="display: none;" >
                      <div class="input-group">
                        <label class="input-group-addon" for="dataX">X</label>
                        <input class="form-control" id="dataX_<?php echo $rand;?>" type="text" placeholder="x" name="x[]">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataY">Y</label>
                        <input class="form-control" id="dataY_<?php echo $rand;?>" type="text" placeholder="y" name="y[]">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataWidth">Width</label>
                        <input class="form-control" id="dataWidth_<?php echo $rand;?>" type="text" placeholder="width" name="w[]">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataHeight">Height</label>
                        <input class="form-control" id="dataHeight_<?php echo $rand;?>" type="text" placeholder="height" name="h[]">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group">
                        <label class="input-group-addon" for="dataRotate">Rotate</label>
                        <input class="form-control" id="dataRotate_<?php echo $rand;?>" type="text" placeholder="rotate">
                        <span class="input-group-addon">deg</span>
                      </div>
                    </div>
                    <div class="col-md-5 row" style="padding-right: 17px;margin-top:10px">
                    <textarea class="form-control" placeholder="Caption" name="cap[]"></textarea>
                    </div>
                    <div class="clearfix"></div>
                    </div>    
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
<script type="text/javascript">
$(function(){
    fileUpload('upload<?php echo $rand;?>');
    $('.<?php echo $rand;?> .cropper').click(function(){
    $('.<?php echo $rand;?> .cropbody').show();$('.<?php echo $rand;?> .crop_value').val('1');
        <?php if(isset($img) && $img!=''){
      ?>
        $('.<?php echo $rand;?> .cropbody').html('<img src=\'<?php echo $this->request->webroot.'img/package/resized/'.$img;?>\' />');
        
        var random = '<?php echo $rand?>';
        
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
                        var $image = $('.'+random+' .img-container > img'),
                            $dataX = $('.'+random+' #dataX_'+random),
                            $dataY = $('.'+random+' #dataY_'+random),
                            $dataHeight = $('.'+random+' #dataHeight_'+random),
                            $dataWidth = $('.'+random+' #dataWidth_'+random),
                            $dataRotate = $('.'+random+' #dataRotate_'+random),
                            options = {
                              aspectRatio: 1,
                              autoCropArea: 1,
                              zoomable: false,
                              minCropBoxWidth: 250,
                              preview: '.'+random+' .img-preview',
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
        
        
        
      <?php  
     }?> 
    })
    
})
</script>     
<?php
}
?>
                           