<?php
require_once('config.php');
require_once('allmenu.html');
require_once('adminlogin.php');
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // ✅ Get form data
  $id       = $_POST['id'];
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $phone    = $_POST['phone'];
  $address  = $_POST['address'];
  $cabin    = $_POST['cabin'];
  $password = $_POST['password'];
  $type     = "administrator";   // important difference

  // ✅ VALIDATION

  // ID
  if (!preg_match("/^[0-9]+$/", $id)) {
    die("Invalid ID");
  }

  // Name
  if (!preg_match("/^[A-Za-z ]+$/", $name)) {
    die("Invalid Name");
  }

  // Email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid Email");
  }

  // Phone
  if (!preg_match("/^[0-9]{10}$/", $phone)) {
    die("Invalid Phone");
  }

  // Password length
  if (strlen($password) < 6) {
    die("Password must be at least 6 characters");
  }

  // ✅ Hash password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // ✅ Insert into administrator table
  $stmt = $conn->prepare("INSERT INTO administratordetail (id, name, address, email, phone, cabin) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("isssis", $id, $name, $address, $email, $phone, $cabin);
  $result = $stmt->execute();

  // ✅ Insert into users table
  $stmt1 = $conn->prepare("INSERT INTO users (userid, password, type) VALUES (?, ?, ?)");
  $stmt1->bind_param("iss", $id, $hashedPassword, $type);
  $result1 = $stmt1->execute();

  // ✅ Result
  if ($result && $result1) {
    echo "<br><br><center><h3>✅ Administrator added successfully</h3></center>";
  } else {
    echo "<br><br><center><h3>❌ Error while saving data</h3></center>";
  }

} else {
  echo "<center>No data received</center>";
}
?>