<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order Exam Page</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <link href="css/starter-template.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#" style="color: white;">Ye-Lemma CMS</a>
      </div>
      <ul class="nav nav-tabs navbar-nav">
        <li><a href="docHome.php" class="active">Home</a></li>
        <li><a href="docResult.php" style="color:white;">Results</a></li>
        <li><a href="doctorRecord.php" style="color:white;">Search</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
<div class="container containerstyle">
<div class="panel panel-default">
<div class="panel-heading">Test Ordering Information</div>
<div class="panel-body panelstlye">

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">

    <div class="form-group">
    <div class="row">
      <div class="col-lg-3">
        <label for="email">Patient ID</label>
      </div>
      <div class="col-lg-5">
        <input  type="text" class="form-control" id="name" name = "patient_id" value="<?=$this->id_data?>" disabled >
      </div>
      <div class="col-lg-2">
        <span style="color:red;"><?=$this->error_data?></span>
        <span style="color:green;"><?=$this->suc_data?></span>
      </div>

    </div>
    </div>

    <div class="form-group">
    <div class="row">
      <div class="col-lg-2">
        <label for="email">Select the required tests:</label>
      </div>

    </div>
    </div>



  <div>
    <div class="row">
      <div class="col-lg-2">
        <input type="checkbox" name="blood_test" value="Blood Test"> Blood Test
      </div>
      <div class="col-lg-5">
        <input type="checkbox" name="ultrasound_test" value="Ultrasound"> Ultrasound
      </div>
    </div>
  </div>

  <div>
    <div class="row">
      <div class="col-lg-2">
        <input type="checkbox" name="urine_test" value="Urine Test"> Urine Test
      </div>
      <div class="col-lg-5">
        <input type="checkbox" name="xray_test" value="X-Ray"> X-Ray
      </div>
    </div>
  </div>

  <div>
    <div class="row">
      <div class="col-lg-2">
        <input type="checkbox" name="stool_test" value="Stool Test"> Stool Test
      </div>
      <div class="col-lg-5">
        <!-- <input type="checkbox" name="vehicle2" value="Car"> AYMEN I COULDNT THINK OF ANOTHER TEST PUT 1 HERE PLS -->
      </div>
    </div>
  </div>

    <button type="submit" class="btn btn-primary btn-success login_btn">Order Exam</button>


  </div>
	  </form>
    <!-- <form >
      <input type="checkbox" name="value1" value="value1">
      <input type="checkbox" name="value2" value="value2">
      <button type="submit">submit</button>
    </form> -->
</div>

    <nav class="navbar navbar-inverse navbar-fixed-bottom color">
    <div class="container-fluid">
      <div class="navbar-header">

      </div>
      <ul class="nav navbar-nav">
        <li  class="nav_color"><a href="#">About Us</a></li>
        <li class="nav_color"><a href="account.php">Contact Us</a></li>
        <li class="nav_color"><a href="#">FAQ</a></li>
      </ul>
    </div>
  </nav>

  </body>
</html>
