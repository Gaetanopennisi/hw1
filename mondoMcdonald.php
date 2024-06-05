<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="mondoMcdonald.css">
    <script src="mondoMcdonald.js" defer="true"></script>
    <head>
      <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=BIZ+UDMincho&family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
        
        <title> McDonald  </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <div class="spacer"></div>
        <header class="testata"> 
            <div class="container">
                
                <div class="flex-container">
                <a href=" " id="img-fluid">
                <img src="img_hw1/mcd_logo.svg" class="img-fluid">
                </a>
                <nav class="nav-bar">
                  <a href="home.php"  class="nav-element">Homepage</a>
                  <a href="nostriprodotti.php" class="nav-element">I nostri prodotti</a>
                  <a href="mondoMcdonald.php"  class="nav-element">Il mondo McDondald's</a>
                  <a href="profilo.php" class="nav-element">Il tuo archivio</a>
                  <a href="ricette_dal_mondo.php" class="nav-element">Ricette dal mondo</a>
                
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
                  
               </nav>
               


                </div>
                <div class="navigazione">
                <div class="navigation">Profilo di <?php echo $_SESSION["username"]?></div>
                    <a href="./logout.php" class="navigation">Logout</a>
                    
                </div>
            </div>
        </header>
        
        <div id="menutendina">
        <div id='tendina' class="hidden">
        <a href="home.php" class="nav-element">Homepage</a>
                  <a href="nostriprodotti.php" class="nav-element">I nostri prodotti</a>
                  <a href="mondoMcdonald.php"  class="nav-element">Il mondo McDondald's</a>
                  <a href="profilo.php" class="nav-element">Il tuo archivio</a>
                  <a href="ricette_dal_mondo.php" class="nav-element">Ricette dal mondo</a>
            </div>
        </div> 
        <div id="info">
            <h1 id="titolino">Informazioni sull'azienda:<h1>
            <p>La McDonald's Corporation è una catena di ristoranti di fast food statunitense. Fino al 2018 è stata la maggior catena di fast food al mondo per numero di punti vendita,quando è stata superata da Subway.La sede è a Chicago dall'inizio del 2018, mentre in precedenza era a Oak Brook, un sobborgo della città, nello Stato dell'Illinois. Gestisce le proprie filiali direttamente o indirettamente tramite franchising. I ristoranti McDonald's sono diffusi in tutto il mondo (impiegano a tempo pieno circa 438.000 persone) e sono diventati uno dei simboli più riconoscibili della cosiddetta globalizzazione, dello stile di vita frenetico e del consumismo moderno. McDonald's è divenuto l'emblema della globalizzazione, alcune volte definita come la "McDonaldizzazione" della società.</p>
        </div>
        <div id="play"><h3>Corri a vedere le nostre Playlist:</h3></div>
        <section id="soundtrack">
            <form id='form2'>
              <input type="button" value="Visualizza" id="bottone">
            </form>
        </section>


        <footer id="footer">
            <div class="container-f">
                <div class="subcontainer-f">
                    <p>Condividi questa pagina</p>
                    <a href=" "><img class="icona" src="img_hw1/facebooklink.png"></a>
                    <a href=" "><img class="icona" src="img_hw1/twitterlink.png"></a>
                    <a href=" "><img class="icona-w" src="img_hw1/whatsapplink.png"></a>
                </div>
            </div>
            <div class="trattogiallo">
                <div class="contenitore-g">
                    <div class="subcontenitore-g">
                    <img src="img_hw1/app-new-icon-big@2x-2.png">
                    <div class="scrittecontenitore-g">
                        <h3>Scarica la nostra App</h3>
                        <p class = "paragrafo">Non perdere neanche un'offerta. Con la nostra App<br>scopri ogni giorno tante sorprese pensate per te.
                        </p>
                    </div>
                    <a href="mondoMcdonald.php" class="bottone">Scopri di più</a>
                    </div>
                </div>
            </div>
            <div class="follow">
                
                <h3>Seguici su</h3>
                <a href=" "><img class="icona" src="img_hw1/insta.png"></a>
                    <a href=" "><img class="icona" src="img_hw1/facebook.png"></a>
                    <a href=" "><img class="icona" src="img_hw1/youtube.png"></a>
            </div>
            <div class="footer-column">
                <div class="footer-end">
                    <a href=" " class="link-foot1">Avviso antifrode</a>
                    <a href=" " class="link-foot">FAQ</a>
                    <a href=" " class="link-foot">Contattaci</a>
                    <a href=" " class="link-foot">La tua opinione conta</a>
                    <a href=" " class="link-foot">Regolamenti</a>
                    <a href=" " class="link-foot">Privacy</a>
                    <a href=" " class="link-foot">Cookies</a>
                    <a href=" " class="link-foot">Termini e condizioni</a>
                    <a href=" " class="link-foot">Invia CV</a>
                    </div>
                    <p class="paragrafo-foot">Copyright © 2024 McDonald's. All rights reserved</p>
                </div>
            </div>
        </footer>

</body>