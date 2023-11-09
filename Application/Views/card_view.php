<h1><?= !$data['name'] ? '' : ($data['name'] . '<br />') ?>Добро пожаловать!</h1> 

<p class="block-hello">
    Добро пожаловать в <span class="upper">мега</span> супер-пупер галерею!
</p>

<?php if (isset($data['card'])) : ?>

    <div class="image-detail">
        <div class="image-detail__links">
            <a class="image-detail__link-back" href="/"><- Назад</a>
        </div>
        <div class="image-detail__links">
            <a class="image-detail__link-back" href="<?= $data['card']['path'] ?>" download>Скачать файл</a>
            <?php if ($data['user']['hash'] && $data['user']['login']) : ?>
                <a class="image-detail__link-back red" href="/card/image-<?= $data['card']['id'] ?>?drop=true">Удалить карточку</a>
            <?php endif; ?>
        </div>
        <div class="image-detail__content">

            <img 
                class="image-detail__image" 
                src="<?= $data['card']['path'] ?>" 
                alt="picture">
            
            <div class="detail-page__content">
                <?php if ($data['user']['hash'] && $data['user']['login']) : ?>
                    <form class="detail-page__comment-form" autocomplete="off" method="post">
                        <div class="mb-3">
                            <label for="inputData" class="form-label">Комментарий</label>
                            <textarea  class="form-control" name="data" id="inputData" rows="3" required ></textarea>
                            <input type="hidden" id="card_id" name="card_id" value="<?= $data['card']['id'] ?>" />
                            <input type="hidden" id="user_id" name="user_id" value="<?= $data['user']['id'] ?>" />
                        </div>
                        <input type="submit" class="btn btn-primary mt-3" value="Отправить" name="comment_send">
                    </form>
                <?php endif; ?>
                <?php foreach($data["comments"] as $comment) : ?>
                    <div class="detail-page__item">
                        <h5>Дата: <?= $comment['create_dt'] ?>; Автор: <?= $comment['user']['name'] ?>;</h5>
                        <?php if ($comment['user_id'] == $data['user']['id']) : ?>
                            <a class="detail-page__item-delete" href="?comment_delete=<?= $comment['id'] ?>">Удалить комментарий</a>
                        <?php endif; ?>
                        <p><?= $comment['data'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

<?php else :?>

    <h3>Контент не найден</h3>

<?php endif; ?>