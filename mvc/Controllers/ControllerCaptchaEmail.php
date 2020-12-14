<?php 

    namespace App\controllers;

    class ControllerCaptchaEmail {

        public function control_reCaptcha(){
            if(isset($_POST['submit'])){
                $url = "https://www.google.com/recaptcha/api/siteverify";
                $data = [
                    "secret" => "6Le6yv4ZAAAAAFIvCbbCBPdeRfk5DLIYnDrpuQo0",
                    "response" => $_POST['token'],
                    "remoteip" => $_SERVER['REMOTE_ADDR']
                ];
                $options = array(
                    "http" => array(
                        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                        "method" => "POST",
                        "content" => http_build_query($data)
                    )
                );
                $context = stream_context_create($options);
                $response = file_get_contents($url,false,$context);
                $res = json_decode($response, true);
                if($res['success'] == true){
                    //mail verifier
                    ControllerCaptchaEmail::control_emailVerif();
                }else{
                    
                }
            }
        }

        public function control_emailVerif(){

            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://email-checker.p.rapidapi.com/verify/v1?email=".$email,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "x-rapidapi-host: email-checker.p.rapidapi.com",
                    "x-rapidapi-key: 8f95f8118amshed510089362e44ap11181fjsn596a754a51ca"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $response = json_decode($response, TRUE);
                if($response['status'] == "invalid"){
                    echo "desolé l'email renseigné d'existe pas !";
                }else{
                    echo "send mail all ok";
                }
            }
        }


    }