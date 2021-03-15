<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosul tau - Liquid Hug</title>
    <script src="https://kit.fontawesome.com/c72da04d6f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="imaginibranding/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="imaginibranding/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="imaginibranding/favicon-16x16.png">
    <link rel="manifest" href="imaginibranding/site.webmanifest">
    <link rel="stylesheet" type ="text/css" href="stilizareproduse.css">
    <link rel="stylesheet" type="text/css" href="stilizare.css">
</head>
<body>
    <div class="wrapper-index">
    <!--Sectiunea header care contine bara de navigatie-->
    <header><!--Element semantic care descrie zona de header-->
        <nav class="main-nav-index"><!--Element semantic pentru bara de navigatie-->
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
                <li ><a href="cart.php">Cart <span class="price" ><i class="fa fa-shopping-cart"></i>
                 <b><?php if(!empty($_SESSION['cart'])){
                   $items_in_cart = count($_SESSION['cart']);
                   echo $items_in_cart;} else{echo "0";} ?></b></span></a></li>
            </ul>
        </nav>
    </header>

    <!-- Sectiunea main pt continut -->


    <div class="cart-container" >
       <h1>Cosul tau</h1><hr>
       <table>
           <tr>
               <th>Articol</th>
               <th>Imagine</th>
               <th>Denumire</th>
               <th>Pret</th>
               <th>Cantitate</th>
           </tr>
           <?php
           include("conexiuneDB.php");
         
           $count = "1";
           $total_price = '0';
           if(!empty($_SESSION['cart'])){
           foreach ($_SESSION['cart'] as $data) {
             $id= $data;
             $result = $mysqli->query("SELECT * FROM produse where idprodus ='$id' ");
               if($result->num_rows > 0){
                   while($row = $result->fetch_object()){
            ?>
            <tr>
               <td><?php echo $count; ?></td>
               <td><img src="<?php echo $row->imagine; ?>" width="100px"></td>
               <td><?php echo $row->denumire; ?></td>
               <td><?php echo $row->pret; ?></td>
               <td>1</td>
           </tr>
         <?php
         $price = $row->pret;
          $total_price = $total_price+$price;
          $count++;
        }
        }
        }
        }
        $final = $total_price + 2;
            ?>
       </table>
       <div class="summary">
        <h1>Total produse: <?php echo $total_price; ?> Lei</h1>
        <h1>Cost transport: 2 Lei</h1>
        <h1>Final: <?php echo $final; ?> Lei</h1>
        <?php
            if(empty($_SESSION['cart'])){
                echo '<style type="text/css">
                        #butonfinalizare{
                            display:none;
                        }
                        </style>';
            }
        ?>
        <a class='butonadaugare' id='butonfinalizare' href="checkout.php">Finalizeaza comanda</a>
        <a class='butonadaugare' href="golestecos.php">Goleste cosul</a>
       </div>

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
