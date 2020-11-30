<?php
    require_once 'assets/anti-spam/autoload.php';
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

        $recaptcha = new \ReCaptcha\ReCaptcha("6LflCuMZAAAAAE1IY0GrSbScxjKBR463wcPGCtBj");
        //$resp = $recaptcha->setExpectedHostname('projet5.jacob-projets-dwj.fr')
        $resp = $recaptcha->setExpectedHostname('localhost')
        ->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
            //SEND MAIL
            
            echo "ok";
        } else {    
            
            $errors = $resp->getErrorCodes();
            var_dump($errors);
            echo "no";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">

    <head>

        <title>JACOB ambulances</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- MAPBOX // LEAFLET -->
        <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="">
        </script>

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <!-- ReCaptcha_GOOGLE -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> 

        <!-- SLIDER SWIPPER_JS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

        <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- STYLES CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

    </head>

    <body>

        <header class="container-fluid">

            <h1 class="text-right mb-4 mt-2">
                <a class="p-2" href="#">
                    JACOB ambulances
                </a>    
            </h1>

            <div class="shadow p-3 mb-5 bg-white rounded d-flex justify-content-center flex-wrap">
                <ul class="nav text-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Accueil
                            <svg class="home_icon" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            </svg>
                        </a>
                    </li>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Nous contacter par 
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="Navbaruss.init('email')">
                          Email
                                <svg class="mail_icon" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                </svg>
                            </a>
                            <a class="dropdown-item" href="#" onclick="Navbaruss.init('téléphone')">
                                Téléphone
                                <svg class="phone_icon" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <li class="nav-item">
                        
                        <a class="nav-link" href="#">
                            Nous situer
                            <svg class="home_icon" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
                
        </header>

        <section class="here">
    
            <form class="bloc_send_mail" action="" method="POST" style="display:none">
                <button type="button" class="close mt-2 mr-3" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="shadow-none p-3 mb-5 bg-light rounded">
                    
                    <h4 class="text-center mb-5 mt-4">Envoyez votre email</h4>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adresse email</label>
                        <input name="email" type="email" class="form-control" id="input_email_contact_form" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Votre message</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6LflCuMZAAAAAPSHpeC3GEFuLd0NHiXQkj8YXctc" data-theme="light"></div>
                    <br/>
                    <div class="text-center m-3">
                        <input class="p-2 border-0 text-white bg-success" type="submit" value="Envoyer">
                    </div>

                </div>
            </form>
        </section>

        <footer>
            <div id='map' style='width: 80%; height: 300px; margin:auto'></div>
        </footer>

        <script src="assets/js/carousel.js"></script>
        <script>

            mapboxgl.accessToken = 'pk.eyJ1IjoiZmZmZmZmZmZmZmZmZmZmZmZmZmYiLCJhIjoiY2toZDcxZnV1MDMyaTM0b2sybWxmM3ZmMSJ9.QcO5t9rZyZhRoFktIw2Agw';
            var map = new mapboxgl.Map({
                container: 'map',
                center: [2.0979813, 49.8591198],
                style: 'mapbox://styles/mapbox/streets-v11',
                zoom: 15
            }); 
           
        </script>
        
         <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
        </script>
        <script src="assets/js/emailVerifier.js"></script>
        <script src="assets/js/navbar.js"></script>

            
    </body>
</html>

