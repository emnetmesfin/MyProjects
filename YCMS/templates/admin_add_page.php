<html>
  <head>
    <meta charset="utf-8">
    <title>Add User</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/formValidation.js"></script>
    <link href="css/main.css" rel="stylesheet">
	<!-- <link href="css/registration.css" rel="stylesheet"> -->

    <style type="text/css">
    	form{
    		padding: 20px;
    	}
    	body{
    		margin: 0px;
    	}
        .department{
            visibility: hidden;
                    }
    </style>
    <script>

        function change(){
            var sele =document.getElementById("selected");
			var s = sele.value;
            // console.log(s);
            if(s === "doctor"){
            	document.getElementById("department").style.visibility = "visible";
        	}
			else{
				document.getElementById("department").style.visibility="hidden";
			}
        }

    </script>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="admin_add.php" style="color: white;">Ye-Lemma CMS</a>
      </div>
      <ul class="nav nav-tabs navbar-nav nav_radius">
        <li><a href="admin_add.php" class="active">Add User</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="content">
  <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post">
    <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-9">
    <div class="form-group">
    <div class="row">
      <div class="col-lg-2">
        <label for="email">User:</label>
      </div>
      <div class="col-lg-3">
        <div class="selecte" >
            <select class="form-control selected" id="selected" name = "role" onchange="change();">
              <option>Select a user to add: </option>
              <option value="doctor">Doctor</option>
              <option value="lab">Lab Technician</option>
              <option value="receptionist">Receptionist</option>
            </select>
        </div>
      </div>
      <div class="department" id="department">
          <div class="col-lg-3" id="department">
              <label><input type="radio" name="rad_name">Internal-Medicine</label>
          </div>
          <div class="col-lg-2">
              <label><input type="radio" name="rad_name"> Pediatrics</label>
          </div>
          <div class="col-lg-2">
              <label><input type="radio" name="rad_name"> Radiology</label>
          </div>
      <div>

      </div>
          </div>
    </div>
    </div>

    <div class="form-group">
    <div class="row">
      <div class="col-lg-2">
        <label for="email">First Name:</label>
      </div>
      <div class="col-lg-5">
        <input type="text" class="form-control" id="fname" name = "fname" onkeyup="validateFirstName()" required >
      </div>
      <div>
         <label class= "messages" id = "firstNameEr" maxLength= "20"></label>
       </div>
    </div>
    </div>
    <div class="form-group">
    <div class="row">
      <div class="col-lg-2">
        <label for="email">Last Name:</label>
      </div>
      <div class="col-lg-5">

        <input type="text" class="form-control" name = "lname" id="lname" onkeyup="validateLastName()" required >
      </div>
      <div>
        <label class= "messages" id = "lastNameEr"></label>
      </div>
    </div>

    </div>

    <div class="form-group">
    <div class="row">
      <div class="col-lg-2">
        <label for="email">Email:</label>
      </div>
      <div class="col-lg-5">
        <input type="text" class="form-control" id="email" name = "email" onkeyup="validateEmail()" required >
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
        <input type="text" class="form-control" id="phone" name = "phone" onkeyup="validatePhone()" required >
      </div>
      <div>
      <label class= "messages" id = "phoneEr"></label>
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

  <button type="submit" name="submit" class="btn btn-primary btn-success login_btn">Add User</button>
    </div>
  </div>
</form>

</body>
</html>
