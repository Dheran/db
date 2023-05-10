<?php
// Start a new session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: admin_login.php");
}

if(isset($_POST["logout"])) {
  session_unset();
  session_destroy();
  header("Location: admin_login.php");
  exit();
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Custom CSS -->
	<style>
		#deletePrompt, #update-form {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			padding: 20px;
			margin: 100% auto;
			bottom: 100px;
			margin: 12% auto;
			max-width: 400px;

			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
			background-color: white;
		}
		.table td {
			vertical-align: middle;
		}
    /* Style the tab */
		.tab {
			overflow: hidden;
			border: 1px solid #ccc;
			background-color: #f1f1f1;
		}

		/* Style the buttons inside the tab */
		.tab button {
			background-color: inherit;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			transition: 0.3s;
			font-size: 17px;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
			background-color: #ddd;
		}

		/* Create an active/current tablink class */
		.tab button.active {
			background-color: #ccc;
		}

		/* Style the tab content */
		.tabcontent {
			display: none;
			padding: 6px 12px;
			border: 1px solid #ccc;
			border-top: none;
		}
	</style>
	<link rel="stylesheet" href="css/style2.css">
</head>
<body>
<button type="submit" name="logout" onclick="location.href='portal.php';">Logout</button>
<div class="tab">
    <button class="tablinks" onclick="location.href='admin_register.php';">Add Admin</button>
	</div>
<!-----Search bar------>
  
<!--------------------------------------------------------------------------------------------------------------------------------------------->
  <!-- Users Table -->
  <div class="table-responsive mt-3">
  <table id="DTsid" class="table mx-auto my-auto table-bordered table-hover">
  <caption>List of admins/users</caption>
        <thead>
          <tr class="text-center">
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Middle Name</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Age</th>
              <th>Birthdate</th>
              <th>Email</th>
              <th>Username</th>
              <th>Password</th>
              <th>User Type</th>
              <th>Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include('server/connection.php');
          $sql = "SELECT tbl_info.id,
                          tbl_info.firstname,
                          tbl_info.lastname,
                          tbl_info.middlename,
                          tbl_info.address,
                          tbl_info.gender,
                          tbl_info.age,
                          tbl_info.birthdate,
                          tbl_info.email,
                          tbl_user.username as username,
                          tbl_user.password as password,
                          tbl_user.user_type as user_type
                  FROM tbl_info
                  JOIN tbl_user
                  ON tbl_info.id = tbl_user.id";
          $result = $conn->query($sql);
          $updateBtns = array();
          $deleteBtns = array();

          if ($result ->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
              echo "<tr>";
              echo "<td id='id" . $row["id"] . "'>" . $row["id"] . "</td>";
              echo "<td id='firstname" . $row["id"] . "'>" . $row["firstname"] . "</td>";
              echo "<td id='lastname" . $row["id"] . "'>" . $row["lastname"] . "</td>";
              echo "<td id='middlename" . $row["id"] . "'>" . $row["middlename"] . "</td>";
              echo "<td id='address" . $row["id"] . "'>" . $row["address"] . "</td>";
              echo "<td id='gender" . $row["id"] . "'>" . $row["gender"] . "</td>";
              echo "<td id='age" . $row["id"] . "'>" . $row["age"] . "</td>";
              echo "<td id='birthdate" . $row["id"] . "'>" . $row["birthdate"] . "</td>";
              echo "<td id='email" . $row["id"] . "'>" . $row["email"] . "</td>";
              echo "<td id='username" . $row["id"] . "'>" . $row["username"] . "</td>";
              echo "<td id='password" . $row["id"] . "'>" . $row["password"] . "</td>";
              echo "<td id='user_type" . $row["id"] . "'>" . $row["user_type"] . "</td>";
              echo "<td>";
              echo sprintf("<button class='btn btn-success update-button mr-3 ml-3' name='update-btn' value='%s'>Update</button>", $row["id"]);
              echo sprintf("<button class='btn btn-danger delete-button' name='delete-btn' value='%s'>Delete</button>", $row["id"]);

            }
          } else {
            echo "0 results";
        }
    
        $conn->close();
    
    ?>
        </tbody>
  </table>
    </div>
 </div>

<!--------------------------------------------------------------------------------------------------------------------------------------------->
<!--Update/Delete form-->
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
<form action="server/update.php" id="update-form" class="d-none h-100" method="post">
    <div class="form-group">
        <label for="id">Id</label>
        <input type="text" name="id" id="idInput" class="form-control" disabled>
    </div>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstnameInput" class="form-control">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastnameInput" class="form-control">
    </div>
    <div class="form-group">
        <label for="middlename">Middle Name</label>
        <input type="text" name="middlename" id="middlenameInput" class="form-control">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="addressInput" class="form-control">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="genderInput" class="form-control">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" id="ageInput" class="form-control">
    </div>
    <div class="form-group">
        <label for="birthdate">Birthdate</label>
        <input type="date" name="birthdate" id="birthdateInput" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="emailInput" class="form-control">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="usernameInput" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" id="passwordInput" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_type">User Type</label>
        <select name="user_type" id="userTypeInput" class="form-control">
            <option value="member">Member</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <button type="submit" name="updateBtn" id="updateBtn" class="btn btn-success btn-block">Save</button>
</form>

</div>
<div class="d-none h-25 justify-content-center align-items-center mb-5 text-center" id='deletePrompt'>
    <div>
        <h2>Are you sure you want to delete the data?</h2>
    </div>
    <div>
        <button class="btn btn-success btnDel mr-3" name='deleteBtn' id='delete' value='y'>Yes</button>
        <button class="btn btn-danger btnDel" name='deleteBtn' id='cancelDel' value='n'>No</button>
    </div>

	<!--------------------------------------------------------------------------------------------------------------------------------------------->
  <!--Script-->
		
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="server/homepage.js"></script>
  <script src="server/adminhp.js"></script>
  

	
</body>
</html>
