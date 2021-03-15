<?php
    //Conectare la baza de date
    include("conexiuneDB.php");
    //Verificam daca id ul produsului a fost primit
    if(isset($_GET["idprodus"])&& is_numeric($_GET["idprodus"])){
        //Preluam variabila id din URL
        $idprodus = $_GET["idprodus"];
        //Stergem inregistrarea cu id ul potrivit din DB
        if($stmt = $mysqli->prepare("DELETE FROM produse WHERE idprodus = ? LIMIT 1")){
            $stmt->bind_param("i", $idprodus);
            $stmt->execute();
            $stmt->close(); 
        }
        else{
            echo "Inregistrarea nu a putut fi stearsa. Va rugam incercati din nou!";
        }
        $mysqli->close();
        header("location: administrare.php");
    }
?>