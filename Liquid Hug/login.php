<?php
//Initializam o sesiune
session_start();
//Verificam daca utilizatorul este deja logat
//Daca da il redirectionam la pagina cu produse (index)
if (isset($_SESSION["loggedIn"]) && ($_SESSION["loggedIn"] === true)) {
    header("location: utilizatorlogat.php");
    exit;
}
//Includem fisierul pentru conectare la baza de date
require_once "conexiuneDB.php";
//Definim variabilele necesare interogarii si le intializam cu void
$email = $password = "";
$email_pass_err  = NULL;
//Procesarea datelor din formular in momentul trimiterii
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Verificam daca datele sunt completate
    if (empty(trim($_POST["email"]))) {
        $email_pass_err = "Introduceti email-ul si parola";
    } else {
        $email = trim($_POST["email"]);
    }
    //Verificam daca parola este completata
    if (empty(trim($_POST["password"]))) {
        $email_pass_err = "Introduceti email-ul si parola";
    } else {
        $password = trim($_POST["password"]);
    }
    //Verificam erorile
    if (empty($email_pass_err) && empty($email_pass_err)) {
        //Pregatim un select pentru verificarea datelor cu cele din baza de date
        $sql = "SELECT idutilizator, email, parola FROM utilizatori WHERE email = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            //Setam parametrii
            $param_email = $email;
            //Incercam sa executam statement ul pregatit anterior
            if ($stmt->execute()) {
                $stmt->store_result();
                //Verificam daca adresa de email exista in baza de date
                //Daca email ul exista verificam si parola
                if ($stmt->num_rows == 1) {
                    //Legam variabila rezultata
                    $stmt->bind_result($idutilizator, $email, $hashed_password);
                    if ($stmt->fetch()){
                        if(($email == "baciladan0@gmail.com")&&(password_verify($password, $hashed_password))){
                            header("location: administrare.php");
                        }
                        elseif(password_verify($password, $hashed_password)) {
                            session_start();
                            //Retinem datele in variabile de sesiune
                            $_SESSION["loggedIn"] = true;
                            $_SESSION["id"] = $idutilizator;
                            $_SESSION["email"] = $email;
                            //Redirectionam userul catre pagina principala
                            header("location: utilizatorlogat.php");
                        } else {
                            //Mesaj pentru parola gresita
                            $email_pass_err = "Combinatia email parola este gresita!";
                        }
                    }
                } else {
                    //Informam utilizatorul ca email ul nu a fost gasit in baza de date
                    $email_pass_err = "Combinatia email parola este gresita!";
                }
            } else {
                echo "Oops, Something went wrong! Please try again later.";
            }
        }
        //Inchidem statement ul
        $stmt->close();
    }
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logare - Liquid Hug</title>
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

    <!--Sectiunea main a paginii de login care o sa contina formularul pentru logare-->
    <main class="main-form">
        <div class="form-title"><h2>Login:</h2></div>
        <div class="errorLogin">
            <?php if(isset($email_pass_err)){
                echo $email_pass_err;}
                ?>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="formular">
            <div class="form-item">
                <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $email;?>">
            </div>
            <div class="form-item">
                <input type="password" placeholder="Parola" id="password" name="password" value="<?php echo $password;?>">
            </div>
            <div class="button-form">
                <input type="submit" value="LOGIN">
            </div>
            <div id="inregistrareDinLogin">
                <a href="register.php"><p style="text-align: center">Nu ai cont? Creeaza unul nou aici!</p></a>
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