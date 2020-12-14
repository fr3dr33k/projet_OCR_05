<?php 

    namespace App\Controllers;

    use App\Models\ConnectDatabase;
    use App\Controllers\ControllerCaptachaEmail;

    class ControllerUserActions {

        public function default(){
            ConnectDatabase::init();
            require "mvc/Views/template.php";
        }

        public function send_user_mail($email,$subject,$message){ 
            mail($email,$subject,$message);
        }


    }