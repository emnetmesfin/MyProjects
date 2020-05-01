<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Patient Home Page</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <style type="text/css">

  </style>
</head>
<body>

  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#" style="color: white;">Ye-Lemma CMS</a>
      </div>
      <ul class="nav nav-tabs navbar-nav nav_radius">
        <li><a href="home.php" class="active">Home</a></li>
        <li><a href="patient_history.php" style="color: white;">My History</a></li>
        <li><a href="patient_account.php"  style="color:white;">Account</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="content">

    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <!--<h1 class="login">ADD BOOK</h1>-->
      <div class="form-group">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-2">
            <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $this->user_data[5] ).'" width="50%" height="50%" />';
             ?>
          </div>
          <div class="col-lg-2">
            <label for="email">Name</label>
            <br>
            <h4><?=$this->user_data[1]?></h4>
          </div>
          <div class="col-lg-2">
            <label for="email">User ID</label>
            <br>
            <h4><?=$_SESSION['id']?></h4>
          </div>
          <!---->
          <div class="row">

          </div>

          </div>

        </div>
      </div>

      <hr style="color: black;">
      <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-4">
          <h3 class="login opt_margin">Book An Appointment?</h3>
        </div>
      </div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="form-group">
        <div class="row">
          <div class="col-lg-5"></div>
          <div class="col-lg-2">
            <label for="email">Select A Department:</label>
          </div>
          <div class="col-lg-2">
            <select class="form-control" name = "department" id="department">

              <option >Pediatrics</option>
              <option  >Internal Medicine</option>
              <option >Radiology</option>
            </select>

            <script type="text/javascript">
                document.getElementById('department').value = "<?php echo $_POST['department'];?>";
            </script>
          </div>
        </div>
      </div>

<div class="form-group">
        <div class="row">
          <div class="col-lg-5"></div>
          <div class="col-lg-2">
            <label for="email">Date of Appointment:</label>
          </div>

          <div class="col-lg-2">
            <select class="form-control" name = "date" id="date">
              <option value="tomorrow">Tomorrow</option>
              <option value="dayAfter">Day After Tomorrow</option>
            </select>
            <script type="text/javascript">
                document.getElementById('date').value = "<?php echo $_POST['date'];?>";
            </script>
          </div>


          <div class="col-lg-2">
            <button type="submit" class="btn btn-primary" name="submit">Get Available Dates</button>
          </div>
        </div>
      </div>








      <?php //print_r($this->time_data) ?>



<div class="form-group">
        <div class="row">
          <div class="col-lg-5"></div>
          <div class="col-lg-2">

            <label>Appointment Time:</label>
          </div>
          <div class="col-lg-2">

            <select class="form-control" name = "time">
              <option selected disabled hidden>Choose here</option>
              <?php

              foreach ($this->time_data as $key => $value){
                //echo "$value<br>";

               ?>

              <option value="<?=$value?>"><?=$value?></option>

              <?php
                }
                ?>

            </select>


          </div>
          <div class="col-lg-2">
            <?php echo "$this->suc_data"; ?>
            <?php echo "$this->error_data"; ?>
            <?php echo "$this->time_error"; ?>


          </div>
        </div>
</div>


<!--<h4 class="col-lg-1 login">To:</h4>
<select class="col-lg-2 opt_margin">
  <option>End:</option>
  <option>12:50</option>
  <option>01:10</option>
  <option>01:30</option>
</select>-->
</div>
<div class="row">
  <div class="col-lg-8"></div>
<button type="submit" class="btn btn-success login_btn" name="bsubmit">Book</button>
</div>
</form>

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

    </form>

  </div>
</body>
</html>
