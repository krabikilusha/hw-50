<?php
    require_once 'Core/model.php'; 
    require_once 'Core/view.php'; 
    require_once 'Core/controller.php'; 
    require_once 'Core/route.php'; 

    require_once 'Models/model_user.php';
    require_once 'Models/model_card.php';
    require_once 'Models/model_comment.php';

    Route::start(); // запускаем маршрутизатор