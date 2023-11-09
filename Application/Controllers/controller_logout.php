<?php
    class Controller_Logout extends Controller 
    { 
        function action_index() 
        {
            // TODO да тут можно уточнить у пользователя, уверен ли он что хочет выйти, но почему бы и не спросить, а просто выйти

            setcookie("login", "", time() - 3600*24*30*12, "/");
            setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true);

            header("Location: main"); exit();
        } 
    }