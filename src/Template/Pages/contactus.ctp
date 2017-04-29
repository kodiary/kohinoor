  <style>
 #map {
        width: 100%;
        height: 300px;
     }
    </style>

<ul class="breadcrumb">
  <li>
  <a href="<?php echo $this->request->webroot;?>">Home</a>
  </li>
  <li class="active"><?php echo $page->title;?></li>
</ul>
<h2 class="common"><?php echo $page->title;?></h2>

<div class="col-md-12">
  <div id="map"></div>
</div>
<div class="clearfix"></div>
<div class="common">
  <?php echo $page->description; ?>
  
</div>
<div class="common">
<form method="post" class="enuire_package" >
  <input type="hidden" name="cap" value=""/>
  <div class="form-group col-md-6">
    <label class="col-md-16 padding-left-0">Full Name</label>
    <div class="col-md-12 padding-left-0"><input type="text" class="form-control" name="name" required="required" /></div>
    <div class="clearfix"></div>
  </div>
  
  <div class="form-group col-md-6">
    <label class="col-md-12 padding-left-0">Email</label>
    <div class="col-md-12 padding-left-0"><input type="email" class="form-control" name="email" required="required" /></div>
    <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
  <div class="form-group col-md-6">
    <label class="col-md-12 padding-left-0">Phone</label>
    <div class="col-md-12 padding-left-0"><input type="text" class="form-control" name="phone" required="required" /></div>
    <div class="clearfix"></div>
  </div>
  
  <div class="form-group col-md-6">
    <label class="col-md-12 padding-left-0">Message</label>
    <div class="col-md-12 padding-left-0"><textarea name="message" class="form-control" required="required"></textarea></div>
    <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
  <div class="form-group col-md-12 row">
    <input type="submit" class="btn btn-info" value="Submit"/>
  </div>
</form>
</div>


    <script>
      function initMap() {
        var myLatLng = {lat: 27.715, lng: 85.312};
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
            center: myLatLng,
            zoom: 18
        });
         var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Golden Clouds Adventures'
        });

      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDQbdGBsVW0GRKM3-YFbWKKHdg-xA4Ij4&callback=initMap">
    </script>

