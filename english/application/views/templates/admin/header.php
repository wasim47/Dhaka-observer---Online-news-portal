<html>
<head>
	<title>Amazing Hotel</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="css/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
  <div class="navbar-wrapper">
    <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
    <div class="container">
      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/">Amazing Stay</a>
          <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="<?php echo base_url();?>">Home</a></li>
              <li><a href="hotels/list">Hotels</a></li>
              <li><a href="features/list">Features</a></li>
              <li><a href="booking/list">Bookings</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          <div class="pull-right">
            <ul class="nav">
                <li class="user-name"><a href="/auth/logout">Logout</a></li>
            </ul>
          </div> 
        </div><!-- /.navbar-inner -->
      </div><!-- /.navbar -->
    </div> <!-- /.container -->
  </div><!-- /.navbar-wrapper -->
