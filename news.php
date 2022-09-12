<?php
    require_once  __DIR__ . '/controllers/Show.php';
    require_once __DIR__ . '/controllers/DeleteNews.php';
    require_once __DIR__ . '/controllers/EditNews.php';
    require_once __DIR__ . '/vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/raleway/raleway.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="/assets/favicon.ico">
    <title>Новость</title>
</head>
<body>
<div class="container">
    <a href="index.php" class="back">
        <img src="assets/arrow.svg" alt="Вернуться назад">
        <span>назад к списку</span>
    </a>
    <header>
        <h1><?= Show::ShowNew($_GET['new'])['name'] ?></h1>
        <div>
            <a href="#openModal" class="edit">Редактировать</a>
            <a href="operation/delete.php?new=<?= Show::ShowNew($_GET['new'])['id']?>" class="delete">Удалить</a>
        </div>
    </header>
    <p class="date number"><?= date('d.m.Y', strtotime(Show::ShowNew($_GET['new'])['date'])) ?></p>
    <p><?= Show::ShowNew($_GET['new'])['announcement'] ?></p>
    <br />
    <p><?= "<p>". str_replace("\n", "</p>\n<p>", Show::ShowNew($_GET['new'])['new'])."</p>" ?></p>
</div>
<div id="openModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Редактирование новости</h3>
                <a href="#close" title="Close" class="close">×</a>
            </div>
            <div class="modal-body">
                <form method="post" action="operation/edit.php">
                    <p>Заполните все поля</p>
                    <input name="id" type="number" value="<?= Show::ShowNew($_GET['new'])['id'] ?>" style="display: none">
                    <input name="name" id="name" type="text" placeholder="Заголовок новости" value="<?= Show::ShowNew($_GET['new'])['name'] ?>"/>
                    <textarea name="announcement" id="announcement" cols="30" rows="10" placeholder="Анонс"><?= Show::ShowNew($_GET['new'])['announcement'] ?></textarea>
                    <textarea name="new" id="new" cols="30" rows="10" placeholder="Новость"><?= Show::ShowNew($_GET['new'])['new'] ?></textarea>
                    <div>
                        <input type="submit" class="save" id="save" value="Сохранить">
                        <a href="#close" class="btn-close">Отменить</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
