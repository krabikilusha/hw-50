<?php
    class Controller 
    {
        public $model;
        public $view;
        public $db;
        
        function __construct()
        {
            $this->model = new Model();
            $this->view = new View();
            $this->db = new PDO(DATABASE);
        }

        
        public static function generateCode($length=6) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
            $code = "";
            $clen = strlen($chars) - 1;
            while (strlen($code) < $length) {
                    $code .= $chars[mt_rand(0,$clen)];
            }
            return $code;
        }

        public function checkCookie($data = []) {
            $login = $_COOKIE['login'];
            $hash = $_COOKIE['hash'];
            
            if (isset($login) && isset($hash)) 
            {
                $user = (new Model_User())->get_item($login);


                if ($user['hash'] == $hash)
                {
                    $data['user']['id'] = $user['id'];
                    $data['user']['login'] = $user['login'];
                    $data['user']['hash'] = $user['hash'];
                    $data['user']['name'] = $user['name'];
                }
                else
                {
                    setcookie("login", "", time() - 3600*24*30*12, "/");
                    setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true);
                }
                
            }
            return $data;
        }
    }