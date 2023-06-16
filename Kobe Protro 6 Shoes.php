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

  <div class="grid-container2">

    <div class="card1">
      <img src="./photos/Kobe Protro 6 Shoes.png" alt="Kobe Protro Shoes" style="width: 200%" />
    </div>

    <div class="card2">
      <h1 style="margin-top: 60px;">Kobe Protro Shoes</h1>
      <p class="price">$149.99</p>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star"></span>
      <h3 id="productinfo">Your footwork becomes unmatched, as you make impossible turn around jumpshots and spin-cycle
        your opponent into defeat when you bring the Kobe Protro Shoes to the battle. Trust us, the Mamba Mentality is
        incomplete without these</h3>
      <form class="radio-button">
        <h4>Size:</h4>
        <label class="radio-inline">
          <input type="radio" name="optradio" checked>6
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio">7
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio">8
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio">9
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio">10
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio">11
        </label>
      </form>

      <form action="/action_page.php">
        <h5>Quantity:</h5>
        <label id="qlabel" for="quantity">Quantity (between 1 and 5):</label>
        <input type="number" id="quantity" name="quantity" min="1" max="5">
        <form action="Orders.html">
          <button id="BuyBtn" type="submit"><a href="./Orders.php">Buy Now!</a></button>
        </form>
      </form>

    </div>

  </div>

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