<!DOCTYPE html> 
<html lang="ru"> 
<head> 
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="./../../CSS/style.css">
    <title>Главная</title> 
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
        crossorigin="anonymous"
    >
</head> 
<body>
    <div class="container">
        <ul class="nav nav-tabs mt-2 mb-4">
            <li class="nav-item"><a class="nav-link<?= $data['page'] == 'home' ? ' active' : '' ?>" href="/main">Главная</a></li>

            <?php if(!$data['user']['hash'] && !$data['user']['login']) : ?>
                <li class="nav-item"><a class="nav-link<?= $data['page'] == 'sign_in' ? ' active' : '' ?>" href="/sign_in">Вход/Регистрация</a></li>
            <?php else : ?>
                <li class="nav-item"><a class="nav-link<?= $data['page'] == 'upload' ? ' active' : '' ?>" href="/upload_files">Добавить фото</a></li>
                <li class="nav-item"><a class="nav-link<?= $data['page'] == 'logout' ? ' active' : '' ?>" href="/logout">Выход из системы</a></li>
            <?php endif; ?>

        </ul>
        <?php include $content_view; ?>
    </div>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
        crossorigin="anonymous"
    >
    </script>
</body> 
</html>