<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Doctor Homepage</title>
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
        <li><a href="docHome.php" class="active">Home</a></li>
        <li><a href="docResult.php" style="color:white;">Results</a></li>
        <li><a href="doctorRecord.php" style="color:white;">Search</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
  <h2>Today's Schedule</h2>
  <table class="table table-bordered table-striped table-hover ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Patient ID</th>
        <th>Treated</th>
        <th>Order Exam</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
        foreach ($this->appointment_data as $key => $value) {
        ?>
        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <tr>
          <td><?=$value["appointment_time"]?></td>
          <td><?=$value["patient_id"]?></td>
          <td>
            <button class="btn btn-success" name = "submit"
            value="<?=$value['appointment_id']?>">
          Treated</button>

        </td>

        <td> <button class="btn btn-success" name = "submit1"
        value="<?=$value['patient_id']?>">
      Order</button> </td>

        </tr>
        </form>
      <?php
        }
        ?>
    </tbody>
  </table>
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
