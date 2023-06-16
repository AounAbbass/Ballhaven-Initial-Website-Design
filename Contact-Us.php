<!DOCTYPE html>
<html>
<meta name="viewport" content="width-device-width, initial-scale=1.0" />
<title>BallHaven</title>
<link rel="stylesheet" href="styles.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<body>
  <div class="container">
    <img id="logo" src="./photos/Navbar logo.png" />
    <ul id="navlist">
      <li><a href="./Home.php" id="Home">Home</a></li>
      <li><a href="./Products.php">Products</a></li>
      <li><a href="Orders.php">Orders</a></li>
      <li id="active"><a href="Contact-Us.php">Contact-Us</a></li>
    </ul>
  </div>

  <div class="row">
    <h1>Contact Us</h1>
  </div>

  <div class="row" id="billinginfo">
    <form action="/Contact-Us.php" method="post">
      <label for="Name">Name</label>
      <input type="text" id="Name" name="Name" placeholder="Your Name.." />

      <label for="Email">Email</label>
      <input type="text" id="Email" name="Email" placeholder="Your Email.." />

      <label for="Subject">Subject</label>
      <input type="text" id="Subject" name="Subject" placeholder="How can we help?" />

      <div class="submitbtn1">
        <input type="submit" name="submit" value="Submit" />
      </div>
    </form>
  </div>
  <footer>
    <footer>
      <a id="footsocial" href="#" class="fa fa-facebook"></a>
      <a id="footsocial" href="#" class="fa fa-instagram"></a>
      <a id="footsocial" href="#" class="fa fa-envelope"></a>
      <p id="foottext"><span>&copy;</span>BallHaven
        <strong<br />
      </p>
    </footer>
  </footer>
</body>

</html>
<?php
session_start();

// initializing variables
$username = "";
$Email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ballhaven');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $Name = mysqli_real_escape_string($db, $_POST['Name']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $Subject = mysqli_real_escape_string($db, $_POST['Subject']);



  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Name)) {
    array_push($errors, "Name");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM contactus WHERE Email='$Email'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['Email'] === $Email) {
      array_push($errors, "Request already exists");
    }


  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password); //encrypt the password before saving in the database

    $query = "INSERT INTO contactus (Name,Email,Subject) 
  			  VALUES('$Name','$Email','$Subject')";
    mysqli_query($db, $query);
    $_SESSION['Name'] = $Name;
    $_SESSION['success'] = "You are now logged in";
    header('location: Orders.php');
  }
}

?>