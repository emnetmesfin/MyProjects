<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Patient History Page</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/starter-template.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">


  </head>

  <body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;">Ye-Lemma CMS</a>
        </div>
        <ul class="nav nav-tabs navbar-nav nav_radius">
          <li><a href="home.php" style="color:white;">Home</a></li>
          <li><a href="patient_history.php" class="active">My History</a></li>
          <li><a href="patient_account.php"  style="color:white;">Account</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
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

    </form>


        </div>
    <?php
      //echo sizeof($this->recordData);
      if (sizeof($this->recordData) > 0):
    ?>
    <div class="container containerstyle">
    <div class="panel panel-default">
  <div class="panel-heading">Consultation</div>
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


    <nav class="navbar navbar-inverse navbar-fixed-bottom color">
    <div class="container-fluid">
      <div class="navbar-header">

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
