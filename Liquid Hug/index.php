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
        <nav class="main-nav-index" ><!--Element semantic pentru bara de navigatie-->
        <?php
          session_start();

          // $items_in_cart = count($_SESSION['cart'])
          ?>
            <ul>
                <li><a href="index.php">Acasa</a></li>
                <li><a href="desprenoi.html">Despre Noi</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="login.php">Contul Meu</a></li>
                <li><a href="contact.php">Contact</a></li>
                 <li ><a href="cart.php">Cos <span class="price" ><i class="fa fa-shopping-cart"></i>
                 <b><?php if(!empty($_SESSION['cart'])){
                   $items_in_cart = count($_SESSION['cart']);
                   echo $items_in_cart;} else{echo "0";} ?></b></span></a></li>
            </ul>
        </nav>
    </header>
    <!-- Sectiunea main pt continut -->
    <div class="showcaseproducts">

        <?php

                include("conexiuneDB.php");
            //Preluam produsele din baza de date
                if($result = $mysqli->query("SELECT * FROM produse ORDER BY idprodus")){
                //Afisam produsele in divul showcaseproducts
                    if($result->num_rows > 0){
                        while($row = $result->fetch_object()){
                            echo "<div class='produs'>";
                            echo "<p class='denumire'>" . $row->denumire . "</p>";
                            echo "<img class='imagine' src='$row->imagine'>";
                            echo "<p class='descriere'>" . $row->descriere . "</p>";
                            echo "<p class='pret'>" . $row->pret . " Lei" . "</p>"; ?>
                            <form method="post" action="log.php">
                            <input type='hidden' name='id' value ="<?php echo $row->idprodus; ?>" >
                            <button class="butonadaugare" name="submit">Adauga in cos</button>
                            </form>

                          </div>
                        <?php }
                    }else{
                        echo "Oops, something went wrong. Please try again later!";
                    }
                }


        ?>
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
