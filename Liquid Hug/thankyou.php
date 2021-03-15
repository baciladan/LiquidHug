<?php

    include("conexiuneDB.php");
    session_start();
    if(isset($_POST['checkout']))
    {
      $name=$_POST['firstname'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      foreach($_SESSION['cart'] as $data){
      $sql = "INSERT INTO `purchased_products`(`productid`, `name`, `email`, `address`, `city`) VALUES ('$data','$name','$email','$address','$city')";
      $stmt = $mysqli->prepare($sql);
      if($stmt->execute()){
      }
      else{
         echo "Oops! Something went wrong! Please try again later!";
      }
    }
  }
  session_destroy();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin - Liquid Hug</title>
    <script src="https://kit.fontawesome.com/c72da04d6f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="imaginibranding/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="imaginibranding/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="imaginibranding/favicon-16x16.png">
    <link rel="manifest" href="imaginibranding/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="stilizare.css">
    <link rel="stylesheet" type ="text/css" href="stilizareproduse.css">
</head>
<body>
    <div class="wrapper-index">
    <!--Sectiunea header care contine bara de navigatie-->
    <header><!--Element semantic care descrie zona de header-->
        <nav class="main-nav"><!--Element semantic pentru bara de navigatie-->
            <ul>
                <li><a href="index.php">Acasa</a></li>
                <li><a href="desprenoi.html">Despre Noi</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="login.php">Contul Meu</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sectiunea main pt continut -->


    <div class="mesajConfirmareComanda">
      <h1>Multumim pentru comanda efectuata!</h1>
      <p>Aceasta a fost inregistrata cu succes si urmeaza sa fie livrata</p>
      <div class="butonInapoiContact"><a href="index.php">Inapoi la pagina principala</a></div>
    </div>


    <!--Sectiunea footer care contine antetul paginii web-->
    <footer>
        <div id="socialbar">
            <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
            <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f fa-2x"></i></a>
            <a href="https://www.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a>
            <a href="https://ro.pinterest.com/" target="_blank"> <i class="fab fa-pinterest-p fa-2x"></i></a>
        </div>
        <div id="copyright">
            <h5>Copyright Bacila Dan &copy; 2020</h5>
        </div>
    </footer>
    </div>
</body>
</html>
