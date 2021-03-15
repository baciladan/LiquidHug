<?php
// Includem fisierul de conectare la baza de date

require_once "conexiuneDB.php";

// Definim variabilele necesare si le initializam

$nume = $email = $mesaj = $subiect = "";
$nume_err = $email_err = $mesaj_err = $subiect_err = NULL;

// Procesarea datelor de pe formular in momentul in care acesta este trimis

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validare nume

    if(empty(trim($_POST["nume"]))){
        $nume_err = "Va rugam introduceti numele!";
    }else{
        $nume = trim($_POST["nume"]);
    }

    // Validare email

    if(empty(trim($_POST["email"]))){
        $email_err = "Va rugam introduceti adresa de email!";
    }else{
        $email = trim($_POST["email"]);
    }

    // Validare mesaj

    if(empty(trim($_POST["mesaj"]))){
        $mesaj_err = "Va rugam introduceti mesajul!";
    }elseif(strlen(trim($_POST["mesaj"])) > 300){
        $mesaj_err = "Mesajul poate avea maxim 300 de caractere!";
    }else{
        $mesaj = trim($_POST["mesaj"]);
    }

    // Validare subiect

    if(empty(trim($_POST["subiect"]))){
        $subiect_err = "Va rugam selectati sau introduceti un subiect!";
    }else{
        $subiect = trim($_POST["subiect"]);
    }

    // Verificam toate erorile inainte de a introduce datele in DB

    if(empty($nume_err) && empty($email_err) && empty($mesaj_err) && empty($subiect_err)){
        // Pregatim statement-ul pentru insert

        $sql = "INSERT INTO mesajecontact (nume, email, mesaj, subiect) VALUES (?, ?, ?, ?)";
        if($stmt = $mysqli->prepare($sql)){

            // Atasam variabilele statement-ului pregatit anterior

            $stmt->bind_param("ssss", $param_nume, $param_email, $param_mesaj, $param_subiect);

            // Setam parametrii

            $param_nume = $nume;
            $param_email = $email;
            $param_mesaj = $mesaj;
            $param_subiect = $subiect;

            // Incercam sa executam statement-ul pregatit anterior

            if($stmt->execute()){

                // Afisam pagina care arata ca mesajul s-a trimis
                
                header("location: succes.php");

            }else{
                echo '<script>alert("Something Went Wrong!")</script>';
            }
        }

        // Inchidem statement-ul
        $stmt->close();

    }

    // Inchidem conexiunea
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Liquid Hug</title>
    <script src="https://kit.fontawesome.com/c72da04d6f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="imaginibranding/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="imaginibranding/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="imaginibranding/favicon-16x16.png">
    <link rel="manifest" href="imaginibranding/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="stilizare.css">
</head>
<body>

    <div class="wrapper-login-register">
    <!--Sectiunea header care contine bara de navigatie-->
    <header><!--Element semantic care descrie zona de header-->
        <nav class="main-nav"><!--Element semantic pentru bara de navigatie-->
            <ul>
                <li><a href="index.php">Acasa</a></li>
                <li><a href="desprenoi.html">Despre noi</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="login.php">Contul meu</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="showcase-on-form-pages">
    </div>

    <!--Zona main a paginii contact care contine formularul pentru contact-->
    <main class="main-form">
        <div class="form-title"><h2>Contacteaza-ne: </h2></div>
        <div class="errorContact">
            <?php
                if(isset($nume_err)){
                    echo $nume_err . "<br>";
                }
                if(isset($email_err)){
                    echo $email_err . "<br>";
                }
                if(isset($mesaj_err)){
                    echo $mesaj_err . "<br>";
                }
                if(isset($subiect_err)){
                    echo $subiect_err . "<br>";
                }
            ?>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off" class="formular">
            <div class="form-item">
                <input type="text" placeholder="Nume Complet" id="nume" name="nume" value="<?php echo $nume;?>">
            </div>

            <div class="form-item">
                <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $email;?>">
            </div>

            <div class="form-item">
                <textarea  placeholder="Mesaj..." id="mesaj" name="mesaj" value="<?php echo $mesaj;?>"></textarea>
            </div>

            <div class="form-item">
                <input type="text" list="subiecte" id="subiect" placeholder="Subiect" name="subiect" value="<?php echo $subiect;?>">
                <datalist id="subiecte">
                    <option value="Comenzi"></option>
                    <option value="Produse"></option>
                    <option value="Evenimente"></option>
                    <option value="Livrare"></option>
                    <option value="Oferte"></option>
                    <option value="Altele"></option>
                </datalist>
            </div>

            <div class="button-form">
                <input type="submit" value="TRIMITE">
            </div>
        </form>
    </main>

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