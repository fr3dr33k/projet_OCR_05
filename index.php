<?php 
    
    require "vendor/autoload.php";
    require "assets/emailVerifier/emailVerif.php";

    use App\Controllers\ControllerUserActions;
    
    $url = "";

    if(isset($_GET["q"])){

        $q = $_GET["q"];

        switch($q){
            case "ok":
                ControllerUserActions::ok();
            break;
            case "no":
                echo "no";
            break;
            default:
                ControllerUserActions::default();
        }
        
    }else{
        ControllerUserActions::default();
    }