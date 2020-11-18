<?php 

    require "mvc/Controllers/ControllerUserActions.php";

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
            
        }

    }else{
        require "mvc/Views/template.php";
    }