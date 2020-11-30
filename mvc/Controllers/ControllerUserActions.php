<?php 

    namespace App\Controllers;

    use App\Models\ConnectDatabase;

    class ControllerUserActions {

        public function default(){
            ConnectDatabase::init();
            require "mvc/Views/template.php";
        }

        public function send_user_mail(){
            
        }


    }