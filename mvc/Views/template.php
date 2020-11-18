<?php
    require_once 'assets/anti-spam/autoload.php';
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

        $recaptcha = new \ReCaptcha\ReCaptcha("6LflCuMZAAAAAE1IY0GrSbScxjKBR463wcPGCtBj");
        $resp = $recaptcha->setExpectedHostname('localhost')
        ->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
            echo "ok";
        } else {    
            $errors = $resp->getErrorCodes();
            //var_dump($errors);
        }
    }else{

    }
?>
<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin="">
        </script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
       
        <script src="assets/js/navbar.js"></script>

    </head>

    <body class="container-fluid">

        <header class="container-fluid">

            <div>
                <h1 class="text-center"><a href="./">JACOB AMUBLANCE</a><img src="assets/media/cross_paramed.png" alt="icon_banner"></h1>
            </div>

            <div class="shadow p-3 mb-5 bg-white rounded d-flex justify-content-center">
                <ul class="nav text-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Accueil</a>
                    </li>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Nous contacter par 
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#" onclick="Navbaruss.init('email')">Email</a>
                          <a class="dropdown-item" href="#" onclick="Navbaruss.init('téléphone')">Téléphone</a>
                        </div>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nous situer</a>
                    </li>
                </ul>
            </div>

        </header>

        <section class="here">
            
            <?php 
                if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
                }
            ?>
    
            <form id="form" action="?" method="POST" style="display:none">
                <div class=" bloc_info shadow-none p-3 mb-5 bg-light rounded">

                    <h3 class="text-center">Envoyez votre email</h3>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adresse email</label>
                        <input name="email" type="email" class="form-control" id="input_email_contact_form" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6LflCuMZAAAAAPSHpeC3GEFuLd0NHiXQkj8YXctc" data-theme="light"></div>
                    <br/>
                    <input type="submit" value="Submit">

                </div>
            </form>
        </section>

        <footer>
            <div id='map' style='width: 80%; height: 300px; margin:auto'></div>
        </footer>
    
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
            
    </body>
</html>

