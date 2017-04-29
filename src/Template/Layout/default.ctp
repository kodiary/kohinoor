<?php
use Cake\ORM\TableRegistry;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>The Great Kohinoor Himalaya Adventure Pvt. Ltd.</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="The Great Kohinoor Himalaya Adventure Pvt. Ltd." />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="icon" 
      type="image/png" 
      href="<?php echo $this->request->webroot;?>ms-icon-70x70.png">
<link href="<?php echo $this->request->webroot;?>new_layout/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo $this->request->webroot;?>new_layout/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo $this->request->webroot;?>fa/css/font-awesome.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet"> 
<script type="text/javascript" src="<?php echo $this->request->webroot;?>new_layout/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo $this->request->webroot;?>new_layout/js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $(".slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        pauseControls: true,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
<script type="text/javascript" src="<?php echo $this->request->webroot;?>new_layout/js/hover_pack.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=222640917866457";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php include(APP.'../webroot/Common/header.php');?>
<?php if($this->request->params['controller'] == 'Pages' && $this->request->params['action']=='index')
    {
        ?>
<div class="slider">
	  <div class="callbacks_container">
	      <ul class="rslides slider" >
            <?php
        $sliders = TableRegistry::get('Sliders')->find()->order(['id'=>'asc'])->all();
        foreach($sliders as $s)
        {
            ?>
	        <li><img src="<?php echo $this->request->webroot;?>assets/frontend/pages/img/layerslider/<?php echo $s->image?>" class="img-responsive" alt=""/>
	        <div class="banner_desc">
				<h1><?php echo $s->title;?></h1>
				
			</div>
            <div class="banner_bottom">
            <span><?php echo $s->caption;?></span>
            </div>
	        </li>
        <?php }?>
	      </ul>
	  </div>
</div>
<?php }?>
<div class="column_center">
  <div class="container">
	<div class="search col-md-5">
	  <div class="stay">Search Package</div>
	  <div class="stay_right">
		  <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
		  <input type="submit" value="">
	  </div>
	  <div class="clearfix"> </div>
	</div>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="main">
    <div class="content_top">
        <div class="container">
	       <?php include(APP.'../webroot/Common/sidebar.php');?>
	       <div class="col-md-9 content_right">
           <?php
            echo $this->Flash->render();
            echo $this->fetch('content');
            ?>
	   	     </div>
            </div>
            <div class="clearfix"></div>
    <?php if($this->request->params['action']!='videos'){?>
      <div class="videos 123">
        <div class="container">

          <h4><a href="<?= $this->request->webroot;?>pages/videos">VIDEOS</a></h4>
          <div class="row">
          <?php
          $cond = '';
          if(isset($pcat) && count($pcat))
          {
            if(isset($pcat) && count($pcat))
            {
                foreach($pcat as $pc)
                {
                    if($cond == '')
                    $cond = 'package_id = '.$pc;
                    else
                    $cond = $cond.' OR '. 'package_id = '.$pc;
                }
            }
            
          }
          if($cond)
          {
            $sql = "SELECT video_id FROM tags WHERE ".$cond;
            $videos = TableRegistry::get('Videos')->find()->where(['id IN ('.$sql.')'])->order('rand()')->limit(4)->all();
          }
          else
            $videos = TableRegistry::get('Videos')->find()->order('rand()')->limit(4)->all();
          foreach($videos as $v)
          {
            $embed_arr = explode('=',$v->youtube);
            $code = end($embed_arr);
            ?>
            <div class="col-md-3">
              <iframe style="width:100%;" src="https://www.youtube.com/embed/<?php echo $code;?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <?php
          }
          ?>
          <div class="clearfix"></div>
          </div>
          </div>
      </div>
          <?php }?>
        </div>
    </div>  	    
</div>
<div class="footer_bg">
</div>
<div class="footer">
	<div class="container">
		<div class="col-md-3 f_grid1">
			<h3>About</h3>
			<a href="#"><img src="<?php echo $this->request->webroot;?>new_layout/images/kohinoor4.png" alt="" style="max-width: 100%;"/></a>
			<p>
            <?php
            $about = TableRegistry::get('pages')->find()->where(['slug'=>'about-us'])->first();
           
            echo substr($about->description,0,250)." ...";
            ?>
            </p>
            <br />
            <a href="<?php echo $this->request->webroot;?>/pages/view/about-us">Read More</a>
		</div>
		<div class="col-md-3 f_grid1 f_grid2">
			<h3>Follow Us</h3>
			<ul class="social">
				<li><a href=""> <i class="fb"> </i><p class="m_3">Facebook</p><div class="clearfix"> </div></a></li>
			    <li><a href=""><i class="tw"> </i><p class="m_3">Twittter</p><div class="clearfix"> </div></a></li>
				<li><a href=""><i class="google"> </i><p class="m_3">Google</p><div class="clearfix"> </div></a></li>
				<li><a href=""><i class="instagram"> </i><p class="m_3">Instagram</p><div class="clearfix"> </div></a></li>
			</ul>
		</div>
		<div class="col-md-3 f_grid3">
			<h3>Contact Info</h3>
			<ul class="list">
				<li><p>Phone : +977 01-4495660</p></li>
				<li><p>mobile :+977 9851195660</p></li>
				<li><p>Email : <a href="mailto:info@kodiary.com"> info@kodiary.com</a></p></li>
			</ul>
        </div>
        <div class="col-md-3">
            <h3>Associate Members</h3>
			<ul class="list1">
                <li> <?php
                        $members =  TableRegistry::get('members')->find()->all();
                        foreach($members as $member)
                        {
                            echo "<a href='".$member->link."' target='_blank'><img src='".$this->request->webroot."img/members/".$member->image."' width='50px' height='50px'/> </a>";
                        }
                   ?>
                </li>
				
			</ul>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="footer_bottom">
       	<div class="container">
       		<div class="cssmenu">
				<ul>
					<li class="active"><a href="login.html">Privacy Policy</a></li> .
					<li><a href="checkout.html">Terms of Service</a></li> .
					<li><a href="checkout.html">Creative Rights Policy</a></li> .
					<li><a href="login.html">Contact Us</a></li> .
					<li><a href="register.html">Support & FAQ</a></li>
				</ul>
			</div>
			<div class="copy">
			    <p>&copy;  2016 Designed by <a href="http://kodiary.com" target="_blank">Kodiary</a></p>
		    </div>
		    <div class="clearfix"> </div>
       	</div>
</div>
</body>
</html>	
<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>	