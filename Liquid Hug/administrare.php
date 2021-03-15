<?php
    //Includem fisierul pentru conectare la baza de date
    include("conexiuneDB.php");
    //Adaugarea produselor in baza de date
    if(isset($_POST['submit'])){
        //Preluam datele din formular
        $denumire=htmlentities($_POST["denumire"],ENT_QUOTES);
        $imagine=htmlentities($_POST["imagine"],ENT_QUOTES);
        $descriere=htmlentities($_POST["descriere"],ENT_QUOTES);
        $pret=htmlentities($_POST["pret"],ENT_QUOTES);
        if($denumire=='' || $imagine=='' || $descriere=='' || $pret==''){
            $error = "Va rugam completati toate campurile!";
        }
        else{
            if($stmt=$mysqli->prepare("INSERT INTO produse (denumire, imagine, descriere, pret) VALUES (?,?,?,?)")){
                $stmt->bind_param("ssss",$denumire, $imagine,$descriere,$pret);
                $stmt->execute();
                $stmt->close();
            }else{
                $error = "Inserarea nu a putut fi realizata";
            }
        }
    }
    //Se preiau produsele din baza de date
    if($result = $mysqli->query("SELECT * FROM produse ORDER BY  idprodus")){
        //Afisarea inregistrarilor pe ecran
        if($result->num_rows>0){
            //Afisam produsele intr-un container DIV
            echo "<h1 id='titluAdministrator'>Pagina administrare</h1>";
            echo "<div class='produse-admin'>";
            while($row = $result->fetch_object()){
                echo "<div class='produs-admin'>";
                echo "<p class='idprodus'>". $row->idprodus . "</p>";
                echo "<p class='denumire'>" . $row->denumire . "</p>";
                echo "<img class='imagine' src='$row->imagine'>";
                echo "<p class='descriere'>" . $row->descriere . "</p>";
                echo "<p class='pret'>" . $row->pret . " Lei" . "</p>";
                echo "<a class='stergereprodus' href='stergereprod.php?idprodus=" . $row->idprodus . "'>Sterge Produsul</a>";
                echo "</div>";
            }
            echo "</div>";
        }
        else{
            echo "Nu exista inregistrari in tabela produse!";
        }
    }
    //Else in cazul unei erori la interogare
    else{
        echo "Error: " . $mysqli->error();
    }
    $mysqli->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrare - Liquid Hug</title>
        <script src="https://kit.fontawesome.com/c72da04d6f.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="imaginibranding/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="imaginibranding/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="imaginibranding/favicon-16x16.png">
        <link rel="manifest" href="imaginibranding/site.webmanifest">
        <link rel="stylesheet" type="text/css" href="stilizare.css">
        <link rel="stylesheet" type="text/css" href="stilizareadmin.css">
    </head>
    <body>

        <div class="sectiune-adaugare">
        <hr/>
        <h2 class="instructiuni">Adaugare produse:</h2>
        <?php if(isset($error)){echo"$error";}?>
        <form action="" method="post" class="form-adaugare">
            <input type="text" name="denumire" value="" placeholder="Denumire Produs">
            <input type="text" name="imagine" value="" placeholder="Link Imagine">
            <input type="text" name="descriere" value="" placeholder="Descriere">
            <input type="text" name="pret" value="" placeholder="Pret">
            <input type="submit" name="submit" value="Adaugare produs">
        </form>
        <hr/>
        </div>

        <div class="buton-logout-admin">
            <a href="login.php">Log Out</a>
        </div>
    </body>
</html>