<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Login Form | CodingLab </title>--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
     <body>
     <div class="container">
        
        <form name="f1" action = "add_admin.php" onsubmit="return validation()" method = "POST">
        <div class ="title"> Register </div>
        <div class="input-box underline">

            <div class="input-box underline">
            <input type ="text" name="fname" id="fname" placeholder="First name"><br>
            <div class="underline"></div>
            </div>

            <div class="input-box underline">
            <input type ="text" name="lname" id="lname" placeholder="Last name"><br>
            <div class="underline"></div>
            </div>

            <div class="input-box underline">
            <input type ="text" name="mname" id="mname" placeholder="Middle Name"><br>
            <div class="underline"></div>
            </div>

            <div class="input-box underline">
            <input type ="text" name="address" id="address" placeholder="Address"><br>
            <div class="underline"></div>
            </div>

            <div class="input-box underline">
            <select name="gender" id="gender">
            <option value="" disabled selected>Select gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
            </select>
            <div class="underline"></div>
            </div>

            <div class="input-box underline">
            <input type ="number" name="age" id="age" placeholder="Age"><br>
            <div class="underline"></div>
            </div>

            <div class="input-box underline">
            <input type ="date" name="birthdate" id="birthdate" placeholder="birthdate"><br>
            <div class="underline"></div>
            </div>

            <div class="input-box underline">
            <input type ="text" name="email" id="email" placeholder="Email"><br>
            <div class="underline"></div>
            </div>

            <div class="input-box underline">
            <input type ="text" name="user" id="user" placeholder="Username"><br>
            <div class="underline"></div>
            </div>

            <div class="input-box underline">
            <input type ="text" name="pass" id="pass" placeholder="Password"><br>
            <div class="underline"></div>
            </div>

            <div class="input-box button">
                <input type="submit" name="AddAdmin" value = "AddAdmin">
                </div>  
        </form>
        
           
    </div>
        <script>
        function validation() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var mname = document.getElementById("mname").value;
  var address = document.getElementById("address").value;
  var gender = document.getElementById("gender").value;
  var age = document.getElementById("age").value;
  var birthdate = document.getElementById("birthdate").value;
  var email = document.getElementById("email").value;
  var username = document.getElementById("user").value;
  var password = document.getElementById("pass").value;

  if (
    fname === "" ||
    lname === "" ||
    mname === "" ||
    address === "" ||
    gender === "" ||
    age === "" ||
    birthdate === "" ||
    email === "" ||
    username === "" ||
    password === ""
  ) {
    alert("Please fill up the form");
    return false;
  } else {
    if (fname === "") {
      alert("First name is empty");
      return false;
    }
    if (lname === "") {
      alert("Last name is empty");
      return false;
    }
    if (mname === "") {
      alert("Middle name is empty");
      return false;
    }
    if (address === "") {
      alert("Address is empty");
      return false;
    }
    if (gender === "") {
      alert("Gender is empty");
      return false;
    }
    if (age === "") {
      alert("Age is empty");
      return false;
    }
    if (birthdate === "") {
      alert("Birthdate is empty");
      return false;
    }
    if (email === "") {
      alert("Email address is empty");
      return false;
    }
    if (username === "") {
      alert("Username is empty");
      return false;
    }
    if (password === "") {
      alert("Password is empty");
      return false;
    }
  }
}

</script>
    </body>
</html>     