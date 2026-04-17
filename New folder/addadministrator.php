<?php
require_once('config.php');
require_once('allmenu.html');
require_once('adminlogin.php');
?>

<html>

<head>

<style>
.signup_tab{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding-top: 30px;
}

.signup_tab div{
  background-color: black;
  color: white;
  opacity: 0.90;
  font-family: sans-serif;
  font-size: 15px;
  margin: 20px;
  padding: 20px;
}

.signup_tab .signup_details{
  width: 400px;
  margin: 20px auto;
  padding: 30px;
}

.signup_tab .signup_details h2{
  text-align: center;
}

.signup_tab .signup_details p{
  margin: 0;
  font-weight: bold;
}

.signup_tab .signup_details input[type="text"],
.signup_tab .signup_details input[type="password"],
.signup_tab .signup_details input[type="email"]{
  width: 100%;
  margin-bottom: 25px;
  border: 0;
  border-bottom: 2px solid white;
  background: transparent;
  outline: none;
  height: 50px;
  color: white;
}

.signup_tab .signup_details input[type="submit"]{
  width: 100%;
  background-color: green;
  height: 50px;
  color: white;
}

.signup_tab .signup_details input[type="submit"]:hover{
  background: blue;
  cursor: pointer;
}
</style>

<title>Create Administrator</title>

<!-- ✅ VALIDATION SCRIPT -->
<script>
function validateForm() {
  var id = document.forms[0]["id"].value;
  var name = document.forms[0]["name"].value;
  var email = document.forms[0]["email"].value;
  var phone = document.forms[0]["phone"].value;
  var pass = document.getElementById("pass").value;
  var cpass = document.getElementById("cpass").value;

  if (!/^[0-9]+$/.test(id)) {
    alert("ID must contain only digits");
    return false;
  }

  if (!/^[A-Za-z ]+$/.test(name)) {
    alert("Name must contain only alphabets");
    return false;
  }

  if (!/^[^ ]+@[^ ]+\.[a-z]{2,3}$/.test(email)) {
    alert("Enter valid email");
    return false;
  }

  if (!/^[0-9]{10}$/.test(phone)) {
    alert("Phone must be 10 digits");
    return false;
  }

  if (pass !== cpass) {
    alert("Passwords do not match");
    return false;
  }

  return true;
}
</script>

</head>

<body>

<div class="signup_tab">

<h1 style="text-align:center; color:#0A639C;">
Enter Administrator Detail
</h1>

<div class="signup_details">
<h2>Enter your details here</h2>

<form action="addascheck.php" method="post" onsubmit="return validateForm();">

<p>ID</p>
<input type="text" name="id" placeholder="Enter ID" pattern="[0-9]+" required>

<p>Name</p>
<input type="text" name="name" placeholder="Enter name" pattern="[A-Za-z ]+" required>

<p>Email</p>
<input type="email" name="email" placeholder="Enter email" required>

<p>Phone</p>
<input type="text" name="phone" placeholder="Enter phone" pattern="[0-9]{10}" required>

<p>Cabin</p>
<input type="text" name="cabin" placeholder="Enter cabin" required>

<p>Address</p>
<input type="text" name="address" placeholder="Enter address" required>

<p>Password</p>
<input type="password" name="password" id="pass" placeholder="Enter password" required>

<p>Confirm password</p>
<input type="password" name="conf_passwd" id="cpass" placeholder="Re-enter password" required>

<input type="submit" name="signup" value="CONFIRM">

</form>
</div>
</div>

</body>
</html>