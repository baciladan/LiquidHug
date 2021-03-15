<?php
    //Includem fisierul pentru conectare la baza de date
        require_once "conexiuneDB.php";
    //Definim variabilele necesare preluarii si inserarii datelor si le initializam cu empty string
        $nume = $prenume = $email = $telefon = $password = $passwordconf = "";
        $nume_err = $prenume_err = $email_err = $telefon_err = $password_err = $passwordconf_err =  NULL;
    //Procesarea datelor din formular la momentul trimiterii
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Validarea datelor preluate din formular
            //Validare nume
            if(empty(trim($_POST["nume"]))){
                $nume_err = "Introduceti numele";
            }elseif(strlen(trim($_POST["nume"]))<2){
                $nume_err = "Introduceti cel putin 2 caractere";
            }else{
                $nume = trim($_POST["nume"]);
            }
            //Validare prenume
            if(empty(trim($_POST["prenume"]))){
                $prenume_err = "Introduceti prenumele";
            }elseif(strlen(trim($_POST["prenume"]))<2){
                $prenume_err = "Introduceti cel putin 2 caractere";
            }else{
                $prenume = trim($_POST["prenume"]);
            }
            if(empty(trim($_POST["email"]))){
                $email_err = "Introduceti adresa de email!";
            }else{
                //Dorim sa verificam daca adresa de email este deja inregistrata
                //Pregatim un select
                $sql = "SELECT idutilizator FROM utilizatori WHERE email = ?";
                
                if($stmt = $mysqli->prepare($sql)){
                    //Legam variabilele de selectul pregatit
                    $stmt->bind_param("s", $param_email);
                    //Setam parametrii
                    $param_email = trim($_POST["email"]);
                    //Incercam sa executam statement ul pregatit anterior
                    if($stmt->execute()){
                        $stmt->store_result();
                        if($stmt->num_rows == 1){
                            $email_err = "Acest email este deja inregistrat";
                        }else{
                            $email = trim($_POST["email"]);
                        }
                    }
                    else{
                        echo "Oops! Something went wrong. Please try again later!";
                    }
                }
                $stmt->close();
            }
            //Validare telefon
            if(empty(trim($_POST["telefon"]))){
                $telefon_err = "Introduceti numarul de telefon";
            }elseif(strlen(trim($_POST["telefon"]))<10){
                $telefon_err = "Introduceti cel putin 10 caractere";
            }else{
                $telefon = trim($_POST["telefon"]);
            }
            //Validare parola
            if(empty(trim($_POST["password"]))){
                $password_err = "Introduceti parola";
            }elseif(strlen(trim($_POST["password"]))<6){
                $password_err = "Parola trebuie sa aiba cel putin 6 caractere";
            }else{
                $password = trim($_POST["password"]);
            }
            //Validare camp de confirmare al parolei
            if(empty(trim($_POST["passwordconf"]))){
                $passwordconf_err = "Confirmati parola!";
            }else{
                $passwordconf = trim($_POST["passwordconf"]);
                if(empty($password_err) && ($password != $passwordconf)){
                    $passwordconf_err = "Parolele nu se potrivesc!";
                }
            }
            //Verificam toate erorile inainte de a introduce valorile in baza de date
            if(empty($nume_err) && empty($prenume_err) && empty($email_err) && empty($telefon_err) && empty($passowrd_err) && empty($passwordconf_err)){
                $sql = "INSERT INTO utilizatori (nume, prenume, email, telefon, parola) VALUES (?, ?, ?, ?, ?)";
                if($stmt = $mysqli->prepare($sql)){

                    $stmt->bind_param("sssss", $param_nume, $param_prenume, $param_email, $param_telefon, $param_password);

                    $param_nume = $nume;
                    $param_prenume = $prenume;
                    $param_email = $email;
                    $param_telefon = $telefon;
                    $param_password = password_hash($password, PASSWORD_DEFAULT);

                    if($stmt->execute()){
                        header("location: login.php");
                    }else{
                        echo $stmt->error;
                        echo "";
                        echo "Oops! Something went wrong. Please try again later!";
                    }
                }
                $stmt->close();
            }
            //Inchidem conexiunea
            $mysqli->close();
        }
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inregistrare - Liquid Hug</title>
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

    <!--Zona main a paginii register.php unde se afla formularul pentru inregistrarea unui cont-->
    <main class="main-form">
        <div class="form-title"><h2>Inregistrare: </h2></div>
        <div class="errorRegister">
        <?php
            if(isset($nume_err)){
                echo $nume_err . "<br>";
            }
            if(isset($prenume_err)){
                echo $prenume_err . "<br>";
            }
            if(isset($email_err)){
                echo $email_err . "<br>";
            }
            if(isset($telefon_err)){
                echo $telefon_err . "<br>";
            }
            if(isset($password_err)){
                echo $password_err . "<br>";
            }
            if(isset($passwordconf_err)){
                echo $passwordconf_err . "<br>";
            }
            ?>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="formular">
            <div class="form-item">
                <input type="text" placeholder="Nume" id="nume" name="nume" value="<?php echo $nume;?>" >
            </div>
            <div class="form-item">
                <input type="text" placeholder="Prenume" id="prenume" name="prenume" value="<?php echo $prenume;?>" >
            </div>
            <div class="form-item">
                <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $email;?>" >
            </div>
            <div class="form-item">
                <input type="text" placeholder="Telefon" id="telefon" name="telefon" value="<?php echo $telefon;?>" >
            </div>
            <div class="form-item">
                <input type="password" placeholder="Parola" id="password" name="password" value="<?php echo $password;?>" >
            </div>
            <div class="form-item">
                <input type="password" placeholder="Confirmati parola" id="passwordconf" name="passwordconf" value="<?php echo $passwordconf;?>" >
            </div>
            <div class="form-item">
                <input type="checkbox" id="termeniconditii" required>
                <p id="text-termeni">Sunt de acord cu <a href="termscond.html" target="_blank">Termenii si conditiile</a> de utilizare a site-ului</p>
            </div>
            <div class="button-form">
                <input type="submit" value="INREGISTRARE">
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