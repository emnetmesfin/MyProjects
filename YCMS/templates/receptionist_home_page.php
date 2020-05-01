<html>
<head>
  <meta charset="utf-8">
  <title>Receptionist Homepage</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/main.css" rel="stylesheet">
  <style type="text/css">

  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="receptionHome.php" style="color: white;">Ye-Lemma CMS</a>
      </div>
      <ul class="nav nav-tabs navbar-nav nav_radius">
        <li><a href="receptionHome.php" class="active">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
  <h2 style="margin: 10px;">Today's Schedule</h2>
  <table class="table table-bordered table-striped table-hover ">
    <thead>
      <tr>
        <th>Time</th>

        <th>ID</th>
        <th>Doctor ID</th>
        <th>Approve</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $i = 0;
        foreach ($this->info as $key => $value) {
          // print_r($value);
          // echo "<br>";
        ?>
        <tr>
          <td><?=$value["appointment_time"]?></td>

          <td><?=$value["patient_id"]?></td>
          <td><?=$value["doctor_id"]?></td>

          <td>
            <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <button class="form-control" name = "submit"
            value="<?=$value['appointment_id']?>" style="background-color:#5cb85c; color:white;">
          Approve</button>
            </form>
        </td>

        </tr>
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
