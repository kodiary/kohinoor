<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login - Admin</title>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo $this->request->webroot;?>admin_files/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo $this->request->webroot;?>admin_files/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>admin_files/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo $this->request->webroot;?>admin_files/css/custom.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>admin_files/css/icheck/flat/green.css" rel="stylesheet">


  <script src="<?php echo $this->request->webroot;?>admin_files/js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      
      <div id="login" class="animate form">
        <img class="admin-logo" src="<?php echo $this->request->webroot;?>new_layout/images/kohinoor4.png" />
        <section class="login_content">
          <form action="" method="post">
            
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" name="username" />
            </div> 
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" name="password" />
            </div>
            <div>
              <input type="submit" value="Login" class="btn btn-default submit" name="submit" />
              <a class="reset_pass" href="#">Lost your password?</a>  
            </div>
            <div class="clearfix"></div>
            </form>
            
            
          
          <!-- form -->
        </section>
        <section class="lostpassword" style="display: none;">
                <form action="<?php echo $this->request->webroot .'admin/forgetpassword'; ?>" method="post">
                  <h1>Forget Password</h1>
                <div>
                  <input type="text" class="form-control" placeholder="Email" required="" name="email" />
                </div>
                <div>
                    <input type="submit" value="Login" class="btn btn-default submit" name="send_email" />
                </div>
                </form>
            </section>
            <div class="clearfix"></div>
            <div class="separator">

              
              <div>
                

                <p>©2016 All Rights Reserved. Kodiary</p>
              </div>
            </div>
        </div>
        <!-- content -->
            
      <div id="register" class="animate form">
        <section class="login_content">
          <form>
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Submit</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Already a member ?
                <a href="#tologin" class="to_register"> Log in </a>
                
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>
<script>
$(function(){
    $('.reset_pass').click(function(){
        $('.lostpassword').show();
        $('.login_content').hide();
    })
})
</script>
</html>
