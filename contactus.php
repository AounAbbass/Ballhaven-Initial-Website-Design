<html lang="en">

<head>
  <title>contactus</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <nav class="d-flex navbar navbar-inverse navbar-dark bg-light no-wrap" id="fixednav">
    <div class="container-fluid">
      <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <i class="fa fa-bars" style="font-size:24px"></i>
        </button>

        <a class="navbar-brand" href="#">EzMerch</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="nav-item"><a class="nav-link" href="./Home (2).php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="./Hoodies.php">Hoodies</a></li>
          <li class="nav-item"><a class="nav-link" href="./T-Shirts.php">T-Shirts</a></li>
          <li class="nav-item"><a class="nav-link" href="./Trousers&Shorts.php">Trousers/Shorts</a></li>
          <li class="nav-item"><a class="nav-link" href="./Orders.php">Orders</a></li>
          <li class="nav-item active"><a class="nav-link" href="./Contact-Us.php">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link" href="./Register.php">Register</a></li>
        </ul>
  </nav>
  <div class="container">
    <form action="contactus.php" method="post">

      <label for="Name">Full Name</label>
      <input type="text" name="Name" placeholder="Enter your Full Name..">

      <label for="Email">Email</label>
      <input type="text" name="Email" placeholder="Enter your Email...">

      <label for="Subject">Subject</label>
      <textarea name="Subject" placeholder="Let us know your thoughts..." style="height:200px"></textarea>

      <div class="input-group">
        <button class="btn-lg" style="margin-left: 130px; margin-top: 5px;" type="submit" name="submit">Submit</button>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </form>
    <footer>
      <div class="container">
        <div class="row">
          <div class="row justify-content-center">
            <div class="col-auto">
              <p>© Copyright 2022 EzMerch</p>
            </div>
            <a href="mailto:hege@example.com">maliccaoun@gmail.com</a></p>
          </div>
        </div>
      </div>
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
$db = mysqli_connect('localhost', 'root', '', 'ezmerch');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $Name = mysqli_real_escape_string($db, $_POST['Name']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $Subject = mysqli_real_escape_string($db, $_POST['Subject']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Name)) {
    array_push($errors, "Name is required");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM contactus WHERE Email='$Email'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }


  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password); //encrypt the password before saving in the database

    $query = "INSERT INTO contactus (Name,Email,Subject) 
  			  VALUES('$Name','$Email','$Subject')";
    mysqli_query($db, $query);
    $_SESSION['Name'] = $Name;
    $_SESSION['success'] = "Information saved successfully";
    header('location: contactus.php');
  }
}

?>