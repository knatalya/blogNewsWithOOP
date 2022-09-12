<?php
    require_once  __DIR__ . '/controllers/Show.php';
    require_once __DIR__ . '/controllers/AddNews.php';
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
    <title>Список новостей</title>
</head>
<body>
<div class="container">
    <header>
        <div class="header">
            <h1>Новости</h1>
            <p>Только качественные и объективные новости и материалы по всем направлениям жизнедеятельности. У нас самая
                оперативная информация: темы дня, обзоры, анализ новостей.</p>
        </div>
        <img src="assets/news.svg" alt="Логотип">
    </header>
    <div class="content">
        <?php
            if (Show::GetPage() == 1) { ?>
                <a href="#openModal" class="add"><img src="assets/add.svg" alt="Добавить новость"></a>
            <?php } ?>
        <?php foreach (Show::GetAllNews() as $row) { ?>
            <a href="news.php?new=<?= $row['id'] ?>" class="news">
                <h2><?= $row['name'] ?></h2>
                <p class="number"><?= date('d.m.Y', strtotime($row['date'])) ?></p>
                <p><?= $row['announcement'] ?></p>
                <img src="assets/category.svg" alt="Категория">
            </a>
        <?php } ?>
    </div>
    <div class="pagination">
        <?php
            if (Show::GetPage() != 1) { ?>
                <a href="?page=<?= (Show::GetPage() - 1) ?>"><img src="assets/back.svg" alt="Назад"></a>
            <?php } ?>
        <?php for ($i = 1; $i <= Show::ShowPagination(); $i++) {
            if ($i == Show::GetPage()) { ?>
                <a href="?page=<?= $i ?>" class="active"><?= $i ?></a>
            <?php } else { ?>
                <a href="?page=<?= $i ?>"><?= $i ?></a>
            <?php } ?>
        <?php } ?>
        <?php if (Show::GetPage() != Show::ShowPagination()) { ?>
            <a href="?page=<?= (Show::GetPage() + 1) ?>"><img src="assets/forward.svg" alt="Вперед"></a>
        <?php } ?>
    </div>
</div>
<div id="openModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Добавление новости</h3>
                <a href="#close" title="Close" class="close">×</a>
            </div>
            <div class="modal-body">
                <form method="post" action="operation/add.php">
                    <p>Заполните все поля</p>
                    <input name="name" id="name" type="text" placeholder="Заголовок новости (не больше 50 символов)"/>
                    <textarea name="announcement" id="announcement" cols="30" rows="10" placeholder="Анонс"></textarea>
                    <textarea name="new" id="new" cols="30" rows="10" placeholder="Новость"></textarea>
                    <div>
                        <input type="submit" value="Сохранить" class="save" id="save">
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
