<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <style type="text/css">
     form{
       padding: 20px;
     }
    </style>
  </head>
  <body>
<div class="jumbotron">
 <div class="row">
   <div class="col-lg-1"></div>
   <div class="col-lg-2">
     <p>Ye-Lemma CMS</p>
   </div>
 </div>
</div>

    <div class="user_input">
    <h3 class="login">Login</h3>
    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <div class="row">
          <div class="col-lg-2">
            <label for="id">User ID:</label>
          </div>
          <div class="col-lg-5">

            <input type="text" class="form-control" name = "username">
          </div>

          <div class="col-lg-5">

            <span style="color:red;"><?php echo $this->email_error ?></span>
          </div>


        </div>
      </div>

      <div class="form-group">
      <div class="row">
          <div class="col-lg-2">
            <label for="password">Password:</label>
          </div>
          <div class="col-lg-5">

            <input type="password" class="form-control" name="password">
          </div>

          <div class="col-lg-5">

            <span style="color:red;"><?php echo $this->password_error ?></span>
          </div>


        </div>
        </div>

        <div class="row">
          <div class="col-lg-5">
            <span style="color:red;"><?php echo $this->error_data ?></span>

          </div>

        </div>


  <div class="checkbox">
    <p>Don't have an account? <a href="registration.php" >Register here</a></p>
  </div>

  <button type="submit" class="btn btn-success login_btn" name="submit">Login</button>
</form>

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
