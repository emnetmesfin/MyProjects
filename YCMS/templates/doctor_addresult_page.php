<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Doctor Add Result</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <style type="text/css">
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="docHome.php" style="color: white;">Ye-Lemma CMS</a>
      </div>
      <ul class="nav nav-tabs navbar-nav nav_radius">
        <li><a href="docHome.php" style="color:white;">Home</a></li>
        <li><a href="docResult.php" class="active">Results</a></li>
        <li><a href="doctorRecord.php" style="color:white;">Search</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="row">
  	<div class="col-lg-4"></div>
  	<div class="col-lg-3 registrationText" style="font-size: 25px;">Add Patient Record</div>
  </div>
  <div class="row">
  	<div class="col-lg-2"></div>
  	<div class="col-lg-9">
  	<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
  		<div class="row">
  		  <div class="col-lg-2">
  		    <label for="email">Patient ID:</label>
  		  </div>
  		  <div class="col-lg-5">


  		    <input readonly type="text" class="form-control" id="fname" name="patientid" value="<?php echo $this->user_data ?>" >
  		  </div>

        <div class="col-lg-5">
          <?php echo "$this->suc_message"; ?>
          <?php echo "$this->error_message"; ?>

        </div>

  		</div>
  		</div>

  		<div class="form-group">
  		<div class="row">
  		  <div class="col-lg-2">
  		    <label for="email">Data:</label>
  		  </div>
  		  <div class="col-lg-5">

          <textarea name="data" rows="8" cols="80" class="form-control" style="resize:none;"></textarea>


  		  </div>

  		</div>

  		</div>

  	<button type="submit" class="btn btn-primary btn-success login_btn" name="submit">Post</button>
  </form>
  	</div>
  </div>
  </div>

  <nav class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container-fluid">
        <div class="navbar-header">
          <!--<a class="navbar-brand" href="#">Ye-Lemma CMS</a>-->
        </div>
        <ul class="nav navbar-nav foot">
          <li class="nav_color"><a href="about_us.html" style="color: white;">About Us</a></li>
          <li class="nav_color"><a href="contact_us.html" style="color: white;">Contact Us</a></li>
          <li class="nav_color"><a href="#" style="color: white;">FAQ</a></li>
        </ul>
      </div>
    </nav>

</body>
</html>
