<?php
include 'auth.php';
checkAuth();
if(isset($_SESSION["username"])){
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="index.css">
    <script src="index.js" defer="true"></script>
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
        <header class="testata"> 
            <div class="container">
                
                <div class="flex-container">
                <a href=" " id="img-fluid">
                <img src="img_hw1/mcd_logo.svg" class="img-fluid">
                </a>
                <nav class="nav-bar">
                <a href="home.php" class="nav-element">Homepage</a>
                  <a href="nostriprodotti.php" class="nav-element">I nostri prodotti</a>
                  <a href="mondoMcdonald.php"  class="nav-element">Il mondo McDondald's</a>
                  <a href="profilo.php" class="nav-element">Il tuo archivio</a>
                  <a href="ricette_dal_mondo.php" class="nav-element">Ricette dal mondo</a>
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
                  
               </nav>
               


                </div>
                <div class="navigazione">
                    <a href="login.php" class="navigation">Accedi</a>
                    <a href="signup.php" class="navigation">Registrati</a>
                    
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
        <section class="section">
            <div class="section-slide">
                <div class="slide-div">
                <h1 class="slide-divh1">Gusta il Double<br>
                Chiken BBQ o il<br>
                Double Cheeseburger</h1>
                <h2 class="slide-divh2">Dal 6 al 19 Marzo.</h2>
                <a href="mondoMcdonald.php" class="button">Scopri di più</a>
                </div>
                <div id="pallini">
                    <h2 class="pallino">
                    </h2>
                    <h2 class="pallino">
                    </h2>
                    <h2 class="pallino">
                    </h2>
                    <h2 class="pallino">
                    </h2>
                    <h2 class="pallino">
                    </h2>
                    <h2 class="pallino">
                    </h2>
                    <h2 class="pallino">
                    </h2>
                    <h2 class="pallino">
                    </h2>
                    <h2 class="pallino">
                    </h2>
                    <h2 class="pallino">
                    </h2>
                </div>
                <img src="img_hw1/eevm-marzo--carousel-desktop.png.webp" class="img-slide">
            </div>
            
            
            <div class="links">

              <div class="links1">
               <div class="content"><div class="image-links">
                <div class="text-img1">
                 <h1>Ordina,Paga in app<br>
                    e Ritira al ristornante
                </h1>
                <h4>Leggi di più ▼</h4>
               </div><img src="img_hw1/homepage-box-mop--mob_1.jpg.webp"></div></div>

               <div class="content"><div class="image-links">
                <div class="text-img2">
                    <h1>Entra in un mondo<br>
                       di gusto con l'App<br>
                       McDonald's
                   </h1>
                   <h4>Leggi di più ▼</h4>
                  </div>
                <img src="img_hw1/homepage-box-app--mob_2.jpg.webp"></div></div>
              </div>
              <div class="links1">
                <div class="content"><div class="image-links">
                    <div class="text-img3">
                        <h1>Passa al McDrive<br>
                       </h1>
                       <h4>Leggi di più ▼</h4>
                      </div>
                    <img src="img_hw1/homepage-mcdrive-mob.png.webp"></div></div>
                <div class="content"><div class="image-links">
                    <div class="text-img4">
                        <h1>Con McDelivery<br>
                            McDonald's arriva a<br>
                            casa tua.
                       </h1>
                       <h4>Leggi di più ▼</h4>
                      </div>
                    <img src="img_hw1/homepage-mcdelivery_mobile_2.jpg.webp"></div></div>
             </div>
              <div class="links1">
                <div class="content"><div class="image-links">
                    <div class="text-img6">
                        <h1>Tutta<br>
                            la nostra qualità
                       </h1>
                       <h4>Leggi di più ▼</h4>
                      </div>
                    <img src="img_hw1/homepage---box-qualita--mob.jpg.webp"></div></div>
                <div class="content"><div class="image-links">
                    <div class="text-img5">
                        <h1>Vuoi far parte<br>
                            del nostro team?
                       </h1>
                       <h4>Leggi di più ▼</h4>
                      </div>
                    <img src="img_hw1/candidatura-spontanea--box-mob.jpg.webp"></div></div>
              </div>
              <div class="social">
                <img src="img_hw1/1683909855441.jpg">
                <h2>Il meglio dai nostri social</h2>
                <img src="img_hw1/1683909855441.jpg">
              </div>
              
        </div>
        
        </section>
        

        <section class="section2">
            <div class="galleria">
                <img src="img_hw1/431701915_722253826686061_2964834705714492899_n.jpg">
                <img src="img_hw1/432429948_766269572119650_507801519853578773_n.jpg">
                <img src="img_hw1/432605267_1046688286427148_6257794414280700701_n.jpg">
                <img src="img_hw1/433691252_2178678029140507_6858657537624592442_n.jpg">
                <img src="img_hw1/433761002_876800067582440_2471593340957869344_n.jpg">
            </div>
        </section>

        <section id="modal-view" class="hidden">
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
</html>