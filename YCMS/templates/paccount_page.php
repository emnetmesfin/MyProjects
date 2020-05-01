<html>
<head>
  <meta charset="utf-8">
  <title>Account</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <style type="text/css">
      #update{
        margin-bottom:30px;
      }
  </style>
</head>
<body>

  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#" style="color: white;">Ye-Lemma CMS</a>
      </div>
      <ul class="nav nav-tabs navbar-nav nav_radius">
        <li><a href="home.php" style="color: white;">Home</a></li>
        <li><a href="patient_history.php" style="color: white;">My History</a></li>
        <li><a href="patient_account.php"  class="active">Account</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="content">
    <h3></h3>



    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post">
      <div class="form-group">
        <div class="row">
          <div class="col-lg-2">
            <label for="email">ID:</label>
          </div>
          <div class="col-lg-5">

            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->user_data[0] ?>">
          </div>
          <div class="col-lg-5">
             <a>Edit</a>
         </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-lg-2">
            <label for="email">First Name:</label>
          </div>
          <div class="col-lg-5">

            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $this->user_data[1] ?>">
          </div>
          <div class="col-lg-5">
             <a>Edit</a>
         </div>
        </div>
      </div>

      <div class="form-group">
      <div class="row">
          <div class="col-lg-2">
            <label for="email">Last Name:</label>
          </div>
          <div class="col-lg-5">

            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $this->user_data[2] ?>">
          </div>
          <div class="col-lg-5">
             <a>Edit</a>
         </div>
        </div>
        </div>

      <div class="form-group">
      <div class="row">
          <div class="col-lg-2">
            <label for="email">Age:</label>
          </div>
          <div class="col-lg-5">

            <input type="number" class="form-control" id="age" name="age" value="<?php echo $this->user_data[3] ?>">
          </div>
          <div class="col-lg-5">
             <a>Edit</a>
         </div>
        </div>

      </div>

      <div class="form-group">
      <div class="row">
          <div class="col-lg-2">
            <label for="email">sex:</label>
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $this->user_data[4] ?>">
          </div>
          <div class="col-lg-5">
             <a>Edit</a>
         </div>
        </div>
        </div>
      <div class="form-group">
       <div class="row">
          <div class="col-lg-2">
            <label for="email">Email:</label>
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $this->user_data[10] ?>">
          </div>
          <div class="col-lg-5">
             <a>Edit</a>
         </div>
        </div>
        </div>
      <div class="form-group">
       <div class="row">
          <div class="col-lg-2">
            <label for="email">Phone Number:</label>
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $this->user_data[5] ?>">
          </div>
          <div class="col-lg-5">
             <a>Edit</a>
         </div>
        </div>
        </div>
        <div class="form-group">
        <div class="row">
           <div class="col-lg-2">
             <label for="email">Photo:</label>
           </div>
           <div class="col-lg-5">
             <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
           </div>
           <div class="col-lg-5">
              <a>Edit</a>
          </div>
         </div>
         </div>
        <div class="form-group">
       <div class="row">
          <div class="col-lg-2">
            <label for="email">Emergency Contact:</label>
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="eContact" name="eContact" value="<?php echo $this->user_data[6] ?>">
          </div>
          <div class="col-lg-5">
             <a>Edit</a>
         </div>
        </div>
        </div>
        <div class="form-group">
        <div class="row">
           <div class="col-lg-2">
             <label for="email">Password:</label>
           </div>
           <div class="col-lg-5">
             <input type="password" class="form-control" id="password" name="password">
           </div>
           <div class="col-lg-5">
              <a>Edit</a>
          </div>
         </div>
         </div>

  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-success login_btn" name="submit" id="Update" >Update</button>
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



  </div>

</body>
</html>
