<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizare Comanda - Liquid Hug</title>
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
    <div class="wrapper-login-register">
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

    <div class="showcase-on-form-pages">
    </div>

    <div class="main-form">
       <div class="form-title"><h1>Ultimul pas dintre tine si cafeaua ta</h1></div>
       <div id="modalitate-plata">
            <p>!Plata tuturor comenzilor se realizeaza numerar la livrare!</p>
        </div>
            <div class="form-title">
                <h3>Adresa de livrare: </h3>
            </div>
           <form action="thankyou.php" method="post" class="formular">
            <div class="form-item">
                <input type="text" id="fname" name="firstname" placeholder="Nume complet"><br>
            </div>
            <div class="form-item">
                <input type="text" id="email" name="email" placeholder="Email"><br>
            </div>
            <div class="form-item">
                <input type="text" id="adr" name="address" placeholder="Detalii adresa"><br>
            </div>
            <div class="form-item">
                <input type="text" id="city" name="city" placeholder="Oras"><br><br>
            </div>
            <div class="button-form">
                <input type="submit" name="checkout"  value="Plaseaza comanda!">
            </div>
            </form>
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
