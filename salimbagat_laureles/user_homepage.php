<?php
// Start a new session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: user_login.php"); // Redirect to the login page
}

// Display the home page
echo "Welcome, " . $_SESSION['username'] . "!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<!-- Link Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Custom CSS -->
	
	<link rel="stylesheet" href="css/homepage.css">
</head>
<body>
<div class="header">
  <div class="logo">Dashboard</div>
  <button class="account-btn">Account</button>
</div>
<div class="dashboard">
  <div class="sidebar">
    <ul class="tabs">
      <li class="active"><a href="#">Tab 1</a></li>
      <li><a href="#">Tab 2</a></li>
      <li><a href="#">Tab 3</a></li>
      <li><a href="#">Tab 4</a></li>
    </ul>
  </div>
  <div class="main-content">
    <h2>Main Content</h2>
    <form>
      <label for="input1">Input 1:</label>
      <input type="text" id="input1" name="input1"><br>

      <label for="input2">Input 2:</label>
      <input type="text" id="input2" name="input2"><br>

      <label for="input3">Input 3:</label>
      <input type="text" id="input3" name="input3"><br>

      <button type="submit">Submit</button>
    </form>
  </div>
</div>

</div>
</body>
</html>
