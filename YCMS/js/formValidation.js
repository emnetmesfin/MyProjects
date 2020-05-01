function showMessage(messsage,place,color){   // A function tohnb display error messages on prefered fields for later use
    // console.log(messsage);
    // alert(place);
    place.innerHTML = messsage;
    place.style.color = color;
}


function validateFirstName(){     //A function to check the length of the first name and that it is all alphabetical letters
  var name = fname.value;

  if (name=="") {
    showMessage("First Name required",document.getElementById('firstNameEr'),"#red");
    return false; }
  else if (!name.match(/^[A-Za-z]*$/)) {
    showMessage("Only letters allowed",firstNameEr,"#FF0000");
    return false; }
  else if (name.length<2) {
   showMessage("First Name too short",firstNameEr,"#FF0000");
    return false;  }

  showMessage("Valid First Name",firstNameEr,"#00FF00")
  return true;
}

function validateMiddleName(){     //A function to check the length of the first name and that it is all alphabetical letters
  var name = mname.value

  if (name=="") {
    showMessage("Middle Name required",middleNameEr,"#red");
    return false; }
  else if (!name.match(/^[A-Za-z]*$/)) {
    showMessage("Only letters allowed",middleNameEr,"#FF0000");
    return false; }
  else if (name.length<2) {
   showMessage("Middle Name too short",middleNameEr,"#FF0000");
    return false;  }

  showMessage("Valid Middle Name",middleNameEr,"#00FF00")
  return true;
}



function validateLastName(){        //A function to check the length of the last name and that it is all alphabetical letters
  var name = lname.value

  if (name=="") {
    showMessage("Last Name required",lastNameEr,"#FF0000");
    return false;  }

  else if (!name.match(/^[A-Za-z]*$/)) {
    showMessage("Only letters allowed",lastNameEr,"#FF0000");
    return false;  }
  else if (name.length<2) {
    showMessage("Last Name too short",lastNameEr,"#FF0000");
    return false;  }
  showMessage("Valid Last Name",lastNameEr,"#00FF00")
  return true;
}



function validateEmail(){         // A function to check that the email has the right format
  var mail = email.value

  if (mail=="") {
   showMessage("Email required",emailEr,"#FF0000");
    return false;  }
  else if (!mail.match(/^[A-Za-z0-9\._\-]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
    showMessage("Invalid Email format",emailEr,"#FF0000");
    return false;  }

  showMessage("Valid Email Adress",emailEr,"#00FF00")
  return true;
}



function validatePhone(){     // A function to check that the phone number is 10 digits and numbers only
  var phoneNum = phone.value

  if (phoneNum=="") {
    showMessage("Phone Number required",phoneEr,"#FF0000");
    return false;  }
  else if (!phoneNum.match(/^[0-9]*$/)) {
    showMessage("Only numbers allowed",phoneEr,"#FF0000");
    return false;  }
  else if (phoneNum.length!=10) {
    showMessage("Must be ten digits",phoneEr,"#FF0000");
    return false;  }


  showMessage("Valid Phone Number",phoneEr,"#00FF00")
  return true;
}


function validatePassword(){   
  var password = pword.value

  if (password=="") {
   showMessage("Password required",passwordEr,"#FF0000");
    return false;  }
  if (!password.match(/[a-z]/)) {
    showMessage("Must contain a letter",passwordEr,"#FF0000");
    return false;  }
  if (!password.match(/[0-9]/)) {
    showMessage("Must contain a Number",passwordEr,"#FF0000");
    return false;  }
  if (password.length<6) {
    showMessage("Password too short",passwordEr,"#FF0000");
    return false;  }

  showMessage("Valid Password",passwordEr,"#00FF00")
  return true;
}

function validateConfirm(){   //A function to check if the confirm password matched the passsword
  var password = pword.value
  var repeated = confirming.value
  if (password=="") {
    return false;  }
  else if (!(repeated == password)) {
    showMessage("Not a Match",confirmEr,"#FF0000");
    return false;  }

  showMessage("Match",confirmEr,"#00FF00")
  return true;
}


function validateFinal(){  // A function to check if all inputs are valid
  var isValid = true;
  if (!validateFirstName()) {
    showMessage("Fill Correctly",firstNameEr,"#FF0000")
    isValid = false;
  }
  if (!validateMiddleName()) {
    showMessage("Fill Correctly",middleNameEr,"#FF0000")
    isValid = false;
  }
  if (!validateLastName()) {
    showMessage("Fill Correctly",lastNameEr,"#FF0000")
    isValid = false;
  }
  if (!validateEmail()) {
    showMessage("Fill Correctly",emailEr,"#FF0000")
    isValid = false;
  }
  if (!validatePhone()) {
    showMessage("Fill Correctly",phoneEr,"#FF0000")
    isValid = false;
  }
  if (!validatePassword()) {
    showMessage("Fill Correctly",passwordEr,"#FF0000")
    isValid = false;
  }
  if (!validateConfirm()) {
    showMessage("Fill Correctly",confirmEr,"#FF0000")
    isValid = false;
  }
  return isValid
}



function Register(){     
  if (validateFinal()) { 
    alert("Congratulations, you have successfully registered.")

  }
}
