<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard | Admin</title>

  <!-- Bootstrap core CSS --> 

  <link href="<?php echo $this->request->webroot;?>admin_files/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo $this->request->webroot;?>admin_files/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo $this->request->webroot;?>admin_files/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo $this->request->webroot;?>admin_files/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>admin_files/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php echo $this->request->webroot;?>admin_files/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php echo $this->request->webroot;?>admin_files/css/floatexamples.css" rel="stylesheet" type="text/css" />
   
    
   
  <script src="<?php echo $this->request->webroot;?>admin_files/js/jquery.min.js"></script>
  <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
  <script src="<?php echo $this->request->webroot;?>js/ajaxupload.js"></script>
  
  

  <!--[if lt IE 9]>
        <script src="<?php echo $this->request->webroot;?>admin_files/../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="<?php echo $this->request->webroot;?>admin_files/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="<?php echo $this->request->webroot;?>admin_files/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo $this->request->webroot;?>admin_files/index.html" class="site_title"><img class="admin-logo" width="75%" src="<?php echo $this->request->webroot;?>new_layout/images/kohinoor4.png" /></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            
            <div class="profile_info">
              
              <h2>Welcome Admin</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a class="parentnav"><i class="fa fa-gift"></i> Page Manager <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"  style="display: none">
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/pages"><i class="fa fa-edit"></i> List Pages</a></li></li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editPage/0">Add Page</a></li>
                    </ul>
                <li><a class="parentnav"><i class="fa fa-gift"></i> Package Manager <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/packCat">List Category</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/packages">List Packages</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editpackCat/0">Add Category</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editPackage/0">Add Packages</a>
                    </li>
                  </ul>
                </li>
                <li><a class="parentnav"><i class="fa fa-gift"></i> Tour Manager <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/tourCat">List Category</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/tours">List Tour</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/edittourCat/0">Add Category</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editTour/0">Add Tour</a>
                    </li>
                  </ul>
                </li>
                <li><a class="parentnav"><i class="fa fa-gift"></i> Silder Manager <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/sliders">List Slider</a>
                    </li>
                    
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editSlider/0">Add Slider</a>
                    </li>
                  </ul>
                </li>
                 <li><a class="parentnav"><i class="fa fa-gift"></i> Video Manager <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/listVideos">List videos</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editVideos/0">Add videos</a>
                    </li>
                  </ul>
                </li>
                 <li><a class="parentnav"><i class="fa fa-gift"></i> Associate Members <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/listMembers">List Associate Members</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editMembers/0">Add Associate Members</a>
                    </li>
                  </ul>
                </li>
               <li><a class="parentnav"><i class="fa fa-gift"></i>My Team Manager <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/listTeam">List My Team</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editTeam/0">Add a Team</a>
                    </li>
                  </ul>
                </li>
                <li><a class="parentnav"><i class="fa fa-gift"></i>Testimonial Manager <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/listTestimonial">List testimonials</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editTestimonial/0">Add a Testimonial</a>
                    </li>
                  </ul>
                </li>
                <li><a class="parentnav"><i class="fa fa-gift"></i> Blog Manager <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/blogs">List Blog</a>
                    </li>
                    <li><a href="<?php echo $this->request->webroot;?>dashboard/editBlog/0">Add Blog</a>
                    </li>
                  </ul>
                </li>
                
              </ul>
            </div>
            
          </div>
          
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="<?php echo $this->request->webroot;?>admin_files/javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  Admin
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <!--li><a href="<?php echo $this->request->webroot;?>admin_files/javascript:;">  Profile</a>
                  </li-->
                  <li>
                    <a href="<?php echo $this->request->webroot;?>dashboard/settings">
                      <!--span class="badge bg-red pull-right">50%</span-->
                      <span>Change Password</span>
                    </a>
                  </li>
                    <li>
                    <a href="<?php echo $this->request->webroot;?>dashboard/changeemail">
                      <!--span class="badge bg-red pull-right">50%</span-->
                      <span>Settings</span>
                    </a>
                  </li>
                  <!--li>
                    <a href="<?php echo $this->request->webroot;?>admin_files/javascript:;">Help</a>
                  </li-->
                  <li><a href="<?php echo $this->request->webroot;?>admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main" style="min-height: 630px;">
        <div class="" style="padding-top: 55px;">

          <?php
echo $this->Flash->render();
echo $this->fetch('content');
?>
        </div>

        <!-- footer content -->
        <footer>
          <!--div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="<?php echo $this->request->webroot;?>admin_files/https://colorlib.com">Colorlib</a>
          </div-->
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
      <!-- /page content -->
    </div>


  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="<?php echo $this->request->webroot;?>admin_files/js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="<?php echo $this->request->webroot;?>admin_files/js/progressbar/bootstrap-progressbar.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo $this->request->webroot;?>admin_files/js/icheck/icheck.min.js"></script>
  
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/datepicker/daterangepicker.js"></script>
  
  <!-- sparkline -->
  <script src="<?php echo $this->request->webroot;?>admin_files/js/sparkline/jquery.sparkline.min.js"></script>

  
  <!-- skycons -->
  <script src="<?php echo $this->request->webroot;?>admin_files/js/skycons/skycons.min.js"></script>
  
  <script src="<?php echo $this->request->webroot;?>admin_files/js/cropping/cropper.min.js"></script>
  <script src="<?php echo $this->request->webroot;?>admin_files/js/cropping/main2.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/excanvas.min.js"></script><![endif]-->
  <?php /*<script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/flot/date.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>admin_files/js/flot/jquery.flot.resize.js"></script>
  <!-- pace -->*/?>
  <script src="<?php echo $this->request->webroot;?>admin_files/js/pace/pace.min.js"></script>
  <script src="<?php echo $this->request->webroot;?>js/custom.js"></script>
  <!-- flot -->
<?php /*
  <script>
    //random data
    var d1 = [
      [0, 1],
      [1, 9],
      [2, 6],
      [3, 10],
      [4, 5],
      [5, 17],
      [6, 6],
      [7, 10],
      [8, 7],
      [9, 11],
      [10, 35],
      [11, 9],
      [12, 12],
      [13, 5],
      [14, 3],
      [15, 4],
      [16, 9]
    ];

    //flot options
    var options = {
      series: {
        curvedLines: {
          apply: true,
          active: true,
          monotonicFit: true
        }
      },
      colors: ["#26B99A"],
      grid: {
        borderWidth: {
          top: 0,
          right: 0,
          bottom: 1,
          left: 1
        },
        borderColor: {
          bottom: "#7F8790",
          left: "#7F8790"
        }
      }
    };
    var plot = $.plot($("#placeholder3xx3"), [{
      label: "Registrations",
      data: d1,
      lines: {
        fillColor: "rgba(150, 202, 89, 0.12)"
      }, //#96CA59 rgba(150, 202, 89, 0.42)
      points: {
        fillColor: "#fff"
      }
    }], options);
  </script>
  <!-- /flot -->
  <!--  -->
  <script>
    $('document').ready(function() {
      $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
        type: 'bar',
        height: '40',
        barWidth: 9,
        colorMap: {
          '7': '#a1a1a1'
        },
        barSpacing: 2,
        barColor: '#26B99A'
      });

      $(".sparkline_two").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
        type: 'line',
        width: '200',
        height: '40',
        lineColor: '#26B99A',
        fillColor: 'rgba(223, 223, 223, 0.57)',
        lineWidth: 2,
        spotColor: '#26B99A',
        minSpotColor: '#26B99A'
      });

      Chart.defaults.global.legend = {
        enabled: false
      };

      var data = {
        labels: [
          "Symbian",
          "Blackberry",
          "Other",
          "Android",
          "IOS"
        ],
        datasets: [{
          data: [15, 20, 30, 10, 30],
          backgroundColor: [
            "#BDC3C7",
            "#9B59B6",
            "#455C73",
            "#26B99A",
            "#3498DB"
          ],
          hoverBackgroundColor: [
            "#CFD4D8",
            "#B370CF",
            "#34495E",
            "#36CAAB",
            "#49A9EA"
          ]

        }]
      };

      var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: data
      });
    });
  </script>
  <!-- -->
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
  <!-- /datepicker -->

  <!-- moris js -->
  <script src="<?php echo $this->request->webroot;?>admin_files/js/moris/raphael-min.js"></script>
  <script src="<?php echo $this->request->webroot;?>admin_files/js/moris/morris.min.js"></script>
  <script>
    $(function() {
      var day_data = [{
        "period": "Jan",
        "Hours worked": 80
      }, {
        "period": "Feb",
        "Hours worked": 125
      }, {
        "period": "Mar",
        "Hours worked": 176
      }, {
        "period": "Apr",
        "Hours worked": 224
      }, {
        "period": "May",
        "Hours worked": 265
      }, {
        "period": "Jun",
        "Hours worked": 314
      }];
      Morris.Bar({
        element: 'graph_bar',
        data: day_data,
        hideHover: 'always',
        xkey: 'period',
        barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
        ykeys: ['Hours worked', 'sorned'],
        labels: ['Hours worked', 'SORN'],
        xLabelAngle: 60
      });
    });
  </script>
  <!-- skycons -->
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>
  <script>
    var opts = {
      lines: 12, // The number of lines to draw
      angle: 0, // The length of each line
      lineWidth: 0.4, // The line thickness
      pointer: {
        length: 0.75, // The radius of the inner circle
        strokeWidth: 0.042, // The rotation offset
        color: '#1D212A' // Fill color
      },
      limitMax: 'false', // If true, the pointer will not go past the end of the gauge
      colorStart: '#1ABC9C', // Colors
      colorStop: '#1ABC9C', // just experiment with them
      strokeColor: '#F0F3F3', // to see which ones work best for you
      generateGradient: true
    };
    var target = document.getElementById('foo2'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 5000; // set max gauge value
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.set(3200); // set actual value
    gauge.setTextField(document.getElementById("gauge-text2"));
  </script>
  */?>
</body>

</html>
