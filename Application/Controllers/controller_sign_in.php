<?php
    class Controller_Sign_In extends Controller 
    {
        function action_index() 
        {
            $modelUser = new Model_User();
            $data['page'] = 'sign_in';

            // Условие, Входа в систему существующего пользователя.
            if (isset($_POST) 
                && isset($_POST['sign_in'])
                && isset($_POST['login'])
                && isset($_POST['password'])) 
            {
                $mdPassword = md5(md5(trim($_POST['password'])));
                $queryUser = $modelUser->get_item($_POST['login']);
                
                if ($queryUser['password'] == $mdPassword) {
                    $user = $queryUser;
                }
            }

            // Условие, Регистрации нового пользователя.
            if (isset($_POST) 
                && isset($_POST['register'])
                && isset($_POST['login']) 
                && isset($_POST['name']) 
                && isset($_POST['password'])) 
            {
                $password = md5(md5(trim($_POST['password'])));
                $user = [
                    'login' => $_POST['login'],
                    'password' => $password,
                    'name' => $_POST['name'],
                    'hash' => md5($password . $this::generateCode())
                ];
                $modelUser->put_item($user);
            }

            // Что бы не повторяться вынес во вне условий данное условие. если юзер есть, то все - хорошо, записываем куку и идем дальше
            // В противном случае что то делаем не то....
            if ($user) 
            {
                setcookie("login", $user['login'], time()+60*60*24*30, "/");
                setcookie("hash", $user['hash'], time()+60*60*24*30, "/", null, null, true); 
                header("Location: main"); exit();
            }
            else
            {
                setcookie("login", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true);

                // TODO по хорошему тут надо передать сообщение об ошибке.
            }

            $this->view->generate('sign_in_view.php', 'template_view.php', $data); 
        } 
    }