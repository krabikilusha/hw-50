<h1><?= !$data['user']['name'] ? '' : ($data['user']['name'] . '<br />') ?>Добро пожаловать!</h1> 

<p class="block-hello">
    Добро пожаловать в <span class="upper">мега</span> супер-пупер галерею!
</p>

<?php if (isset($data['CARDS'])) : ?>

    <div class="image-list">
        <?php foreach ($data['CARDS'] as $file) : ?> 
            <a href="/card/image-<?= $file['id'] ?>" class="image-link">
                <img 
                    src="<?= $file['path'] ?>" 
                    alt="picture" 
                /> 
                <p>
                    Количество комментариев: <?= $file['comments_cound'] ?>
                </p>
            </a>
        <?php endforeach; ?>
    </div>

<?php else :?>

    <h3>Чтото пошло не так</h3>

<?php endif; ?>