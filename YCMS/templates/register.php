<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/formValidation.js"></script>
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

<div class="row">
  <div class="col-lg-2">

  </div>
  <div class="col-lg-7">
    <h1>Create Account</h1>
  </div>


</div>



    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post">


      <div class="form-group">
        <div class="row">
          <div class="col-lg-2">
            <label for="email">First Name:</label>
          </div>
          <div class="col-lg-5">

            <input type="text" class="form-control" id="fname" name="fname" onkeyup="validateFirstName()" required>
          </div>
          <div>
    		  <label class= "messages" maxLength="20" id = "firstNameEr"></label>
    		  </div>
        </div>
      </div>

      <div class="form-group">
      <div class="row">
          <div class="col-lg-2">
            <label for="email">Last Name:</label>
          </div>
          <div class="col-lg-5">

            <input type="text" class="form-control" id="lname" name="lname" onkeyup="validateLastName()" required>
          </div>
          <div>
            <label class= "messages" id = "lastNameEr"></label>
          </div>
        </div>
        </div>

      <div class="form-group">
      <div class="row">
          <div class="col-lg-2">
            <label for="email">Age:</label>
          </div>
          <div class="col-lg-5">

            <input type="number" class="form-control" id="age" name="age">
          </div>
        </div>

      </div>

      <div class="form-group">
      <div class="row">
          <div class="col-lg-2">
            <label for="email">sex:</label>
          </div>
          <div class="col-lg-2">

    		    <!-- <input type="text" class="form-control" id="fname" onkeydown="validateFirstName()" required > -->

    		    <label><input type="radio" name="sex" value="Female" checked="checked"> Female</label>
    		  </div>
    		  <div class="col-lg-1">
            <label><input type="radio" name="sex" value="Male"> Male</label>
          </div>
    		  <div>
    		  <label class= "messages" maxLength="20" id = "firstNameEr"></label>
    		  </div>
        </div>
        </div>

      <div class="form-group">
       <div class="row">
          <div class="col-lg-2">
            <label for="email">Email:</label>
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="email" name="email" onkeyup="validateEmail()" required>
          </div>
          <div>
    		     <label class= "messages" id = "emailEr"></label>
    		  </div>
        </div>
        </div>
      <div class="form-group">
       <div class="row">
          <div class="col-lg-2">
            <label for="email">Phone Number:</label>
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="phone" name="phone" onkeyup="validatePhone()" required >
          </div>
        </div>
        </div>
        <div class="form-group">
        <div class="row">
           <div class="col-lg-2">
             <label for="email">Photo:</label>
           </div>
           <div class="col-lg-5">
             <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
           </div>
         </div>
         </div>
        <div class="form-group">
       <div class="row">
          <div class="col-lg-2">
            <label for="email">Emergency Contact:</label>
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="eContact" name="eContact" required>
          </div>
        </div>
        </div>
        <div class="form-group">
        <div class="row">
           <div class="col-lg-2">
             <label for="email">Password:</label>
           </div>
           <div class="col-lg-5">
             <input type="password" class="form-control" id="pword" name="password" onkeyup="validatePassword()" required >
           </div>
           <div>
     		  <label class= "messages" id = "passwordEr"></label>
     		  </div>
         </div>
         </div>

         <div class="form-group">
     		<div class="row">
     		  <div class="col-lg-2">
     		    <label for="email">Confirm Password:</label>
     		  </div>
     		  <div class="col-lg-5">
     		    <input type="password" class="form-control" id="confirming" onkeyup="validateConfirm()" required >
     				</div>
     			<div>
     			<label class= "messages" id = "confirmEr"></label>
     			</div>
     			</div>
     			</div>


  <button type="submit" class="btn btn-primary btn-success login_btn" name="submit">Submit</button>
</form>

  </body>
</html>
