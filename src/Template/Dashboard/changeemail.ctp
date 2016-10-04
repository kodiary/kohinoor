<script src="<?php echo $this->request->webroot;?>admin_files/js/validator/validator.js"></script>
<div class="x_content">
<form method="post" class="form-horizontal form-label-left" novalidate>
<span class="section">Change email</span>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email" >email <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="email" value="<?php echo $email; ?>" type="email" name="email"  data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" required="required" >
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