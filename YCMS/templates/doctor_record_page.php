<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Patient History Page</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/starter-template.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">


  </head>

  <body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="docHome.php" style="color: white;">Ye-Lemma CMS</a>
        </div>
        <ul class="nav nav-tabs navbar-nav nav_radius">
          <li><a href="docHome.php" style="color:white;">Home</a></li>
          <li><a href="docResult.php" style="color:white;">Results</a></li>
          <li><a href="doctorRecord.php" class="active">Search</a></li>
        </ul>
        <form class="navbar-form navbar-right" role="search" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group formstyle">
        <input type="text" class="form-control" name = "patient_id" placeholder="Enter Patient ID">
        <button type="submit" class="btn btn-default" name = "search">Search</button>
      </div>
      </form>

      </div>
    </nav>





  <div class="menu shiftleft">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <ul class="group-item">
  <li class="list-group-item">Patient's Visits:</li>
  <?php
    // echo sizeof($this->recordList);
    if(sizeof($this->recordList) > 0):
    foreach ($this->recordList as $key => $value):
  ?>
  <li class="list-group-item">
    <button class="form-control" name = "cons_id" value = "<?=$value[1]?>" type = "submit"><?=$value[0]?></button>

  </li>

  <?php
    endforeach;
    endif;
  ?>
</li>
<!--   <?php
    // if (sizeof($this->recordList) > 0):
  ?> -->
  <button class="form-control btn btn-warning" name = "addRecord" type = "submit">Add Record</button><!-- 
<?php 
// endif;?> -->
<!-- <li> -->
  </form>


      </div>
  <?php

    if (sizeof($this->recordData) > 0):
  ?>
    <div class="container containerstyle">
    <div class="panel panel-default">
  <div class="panel-heading">Consultation </div>
  <div class="panel-body panelstyle">

  <p><b>Date:</b></p>
  <p><?=$this->recordData['rdate']?></p>
  <p><b>Doctor:</b></p>
  <p><?=$this->recordData['doctor_id']?></p>
  <p><b>Record Content:</b></p>
  <p><?=$this->recordData['data']?></p>

  </div>
</div>

      </div>
      <?php
        endif;
      ?>



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
