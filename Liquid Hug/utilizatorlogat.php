<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contul Tau - Liquid Hug</title>
    <script src="https://kit.fontawesome.com/c72da04d6f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="imaginibranding/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="imaginibranding/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="imaginibranding/favicon-16x16.png">
    <link rel="manifest" href="imaginibranding/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="stilizare.css">
</head>
<body>

    <div class="wrapper-utilizator-logat">


    <div class="wrapper-cupon-part">

    <div class="mesajUtilizatorLogat">

        <p>Multumim pentru ca ai incredere in noi!</p>
        <p>Am pregatit un cod de cupon special pentru clientii care au inregistrat deja un cont!</p>
        <i class="fas fa-hand-holding-heart"></i>


        <p>Urmeaza sa adaugam mai multe functionalitati pentru aceasta pagina</p>
        <i class="fas fa-wrench"></i>

        
        <p>Pana atunci profita de aceata ocazie si hai la unul din evenimentele din lista de mai jos!</p>
        <i class="fas fa-mug-hot"></i>

    </div>

    <div id="cupon"></div>
    <?php
    echo '<script type="text/JavaScript">
        let key = 2579

        let container = document.getElementById("cupon");

        let currentDate = new Date();

        let currentMonth = currentDate.getMonth()+1;

        let codCupon = currentMonth * key * 12;


        let paragraf = document.createElement("p");

        let mesaj = document.createElement("p");

        let mesaj2= document.createElement("p");

        mesaj.innerText = "Codul tau de cupon este: ";

        mesaj2.innerText = `Poti veni cu acest cod la oricare din evenimentele 
        prezentate mai jos si vei beneficia 
        de o reducere de 15% la achizitionarea biletului`;

        paragraf.innerText = codCupon;

        container.append(mesaj, codCupon, mesaj2);

    </script>'
    ?>
   </div>

   <div class="evenimente">
       <h1>Uite lista cu urmatoarele evenimente pe care urmeaza sa le organizam: </h1>
       <i class="far fa-calendar"></i>
       <ul>
           <li><p>28 Feburarie 2021: Workshop arta prepararii cafelei (In aer liber)</p></li>
           <li><p>15 Martie 2021: Turul fabricii LiquidHug (Nu te ingrijora, am luat toate masurile de precautie necesare!)</p></li>
           <li><p>25 Martie 2021: Degustarea noilor produse marca LiquidHug</p></li>
           <li><p>15 Aprilie 2021: Workshop protectia mediului (In aer liber)</p></li>
       </ul>
    </div>

    <div class="buton-logout">
    <a href="logout.php">Log Out</a>
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
