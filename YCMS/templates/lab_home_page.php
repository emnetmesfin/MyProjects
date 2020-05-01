<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LabTech Homepage</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <style type="text/css">
  </style>
</head>
<body>
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

<div class="container">
  <h2>Exam Schedules</h2>
  <table class="table table-bordered table-striped table-hover ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Doctor ID</th>
        <th>Patient ID</th>
        <th>Test Type</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($this->exam_data as $key => $value) {
        ?>
        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <tr>
          <td><?=$value["examId"]?></td>
          <td><?=$value["doctorId"]?></td>
          <td><?=$value["patientId"]?></td>
          <td><?=$value["testType"]?></td>
          <td>
            <button class="btn btn-success" name = "submit"
            value="<?=$value['examId']?>">
          Post Result</button>

        </td>

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
      <ul class="nav navbar-nav">
        <li  class="nav_color"><a href="#">About Us</a></li>
        <li class="nav_color"><a href="account.php">Contact Us</a></li>
        <li class="nav_color"><a href="#">FAQ</a></li>
      </ul>
    </div>
  </nav>

</body>
</html>
