<script src="<?php echo $this->request->webroot;?>admin_files/js/validator/validator.js"></script>
<div class="x_content">
<form method="post" class="form-horizontal form-label-left" novalidate>
<span class="section">Change Password</span>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old_password" >Old Password <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="old_password" type="text" name="old_password"  data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" required="required" >
  </div>
</div>
<div class="item form-group">
  <label for="password" class="control-label col-md-3">Password</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
  </div>
</div>
<div class="item form-group">
  <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
  </div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
  <div class="col-md-6 col-md-offset-3">
    <button type="button"  class="btn btn-primary">Cancel</button>
    <button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
  </div>
</div>
</form>
</div>
