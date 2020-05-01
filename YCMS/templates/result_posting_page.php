<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Post Result</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">


    <style type="text/css">
    	form{
    		padding: 20px;
    	}
    	body{
    		margin: 0px;
    	}
    </style>
  </head>
  <body>

<!--<div class="jumbotron">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-2">
			<p>Ye-Lemma CMS</p>
		</div>
	</div>
</div>-->

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="lab_home.php" style="color: white;">Ye-Lemma CMS</a>
      </div>
      <ul class="nav nav-tabs navbar-nav nav_radius">
        <li><a href="lab_home.php" class="active">Home</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-3 registrationText" style="font-size: 25px;">Patient Results</div>
</div>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-9">
	<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
		<div class="row">
		  <div class="col-lg-2">
		    <label for="email">Exam ID:</label>
		  </div>
		  <div class="col-lg-5">


		    <input readonly type="text" class="form-control" id="fname" name="examid" value="<?php echo $this->exam_data[0][0] ?>" >
		  </div>

		</div>
		</div>
		<div class="form-group">
		<div class="row">
		  <div class="col-lg-2">
		    <label for="email">Patient ID:</label>
		  </div>
		  <div class="col-lg-5">


		    <input readonly type="text" class="form-control" id="fname" name="patientid" value="<?php echo $this->exam_data[0][2] ?>">
		  </div>

		</div>
		</div>

		<div class="form-group">
		<div class="row">
		  <div class="col-lg-2">
		    <label for="email">Doctor ID:</label>
		  </div>
		  <div class="col-lg-5">
		    <input readonly type="text" class="form-control" id="mname" name="docid" value="<?php echo $this->exam_data[0][1] ?>" required  >
		  </div>

		</div>
		</div>

		<div class="form-group">
		<div class="row">
		  <div class="col-lg-2">
		    <label for="email">Diagnosis:</label>
		  </div>
		  <div class="col-lg-5">

        <textarea name="diagnosis" rows="8" cols="80" class="form-control" style="resize:none;"></textarea>


		  </div>
      <div class="col-lg-2">
        <span style="color:green;"><?php echo $this->suc_data ?></span>
        <span style="color:red;"><?php echo $this->error_data ?></span>

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
        <li class="nav_color"><a href="#" style="color: white;">About Us</a></li>
        <li class="nav_color"><a href="account.php" style="color: white;">Contact Us</a></li>
        <li class="nav_color"><a href="#" style="color: white;">FAQ</a></li>
      </ul>
    </div>
  </nav>

  </body>
</html>
