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
      <li id="active"><a href="./Products.php">Products</a></li>
      <li><a href="Orders.php">Orders</a></li>
      <li><a href="Contact-Us.php">Contact-Us</a></li>
    </ul>
  </div>

  <div class="row">
    <h1>Billing Details</h1>
  </div>

  <div class="row" id="billinginfo">
    <form action="Orders.php" method="post">
      <label for="Name">Name</label>
      <input type="text" id="Name" name="Name" placeholder="Your Name.." />

      <label for="Email">Email</label>
      <input type="text" id="Email" name="Email" placeholder="Your Email.." />

      <label for="Address">Address</label>
      <input type="text" id="Address" name="Address" placeholder="Your Address.." />

      <label for="Zip">Zip</label>
      <input type="text" id="Zip" name="Zip" placeholder="E.g. 56180" />

      <div class="submitbtn">
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
  $Address = mysqli_real_escape_string($db, $_POST['Address']);
  $Zip = mysqli_real_escape_string($db, $_POST['Zip']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Name)) {
    array_push($errors, "Name");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM orders WHERE Email='$Email'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['Email'] === $Email) {
      array_push($errors, "Order already exists");
    }


  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password); //encrypt the password before saving in the database

    $query = "INSERT INTO orders (Name,Email,Address,Zip) 
  			  VALUES('$Name','$Email','$Address','$Zip')";
    mysqli_query($db, $query);
    $_SESSION['Name'] = $Name;
    $_SESSION['success'] = "You are now logged in";
    header('location: Orders.php');
  }
}

?>