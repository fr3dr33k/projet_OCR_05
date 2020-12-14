<?php 
    
    require "vendor/autoload.php";

    use App\Controllers\ControllerUserActions;
    
    $url = "";

    if(isset($_GET["q"])){

        $q = $_GET["q"];

        switch($q){
            
            case "ok":
                ControllerUserActions::ok();
            break;
            
            default:
                ControllerUserActions::default();
        }
        
    }else{
        ControllerUserActions::default();
    }