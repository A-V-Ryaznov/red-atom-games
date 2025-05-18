<?php
    include "../../path.php";
    include_once "../../app/database/db.php";
    include("../../app/controllers/commentaries-adm.php");
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Red Atom</title>

    <meta charset="utf-8">
    <!--Adaptive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--Off iphone -->
    <meta name="format-direction" content="telephone=no">
    <!--Description-->
    <meta name="description"
        content="Главная страница сайта игровой студии Red Atom, содержит общую информацию о деятельности компании">

    <meta name="Author" content="Artem Oganesyants">
    <meta name="Copyright" content="Artem Oganesyants">

    <link rel="stylesheet" href="../../assets/css/admin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <?php include("../../app/include/header-admin.php"); ?>

    <div class="container content_zone">
        <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="posts col-9">
            <div class="row title-table">
                <h2>Управление комментариями</h2>
                <div class="col-2 text">Автор</div>
                <div class="col-3 text">Статья</div>
                <div class="col-2 text">Дата создания</div>
                <div class="col-5 text">Управление</div>
            </div>
            <?php foreach($comments as $key => $comment):?>
            <div class="row post">
                <div class="id col-2 text"><?=$comment['username']?></div>
                <div class="title col-3 text"><?=$comment['title']?></div>
                <div class="data col-2 text"><?=$comment['created_date']?></div>
                <div class="red col-2"><a href="edit.php?id=<?=$comment['id'];?>">Просмотреть</a></div>
                <div class="del col-1"><a href="index.php?del_id=<?=$comment['id'];?>">Удалить</a></div>
                <?php if ($comment['status']): ?>
                    <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$comment['id'];?>">Опубликовано</a></div>
                <?php else: ?>
                    <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$comment['id'];?>">На модерации</a></div>
                <?php endif; ?>
            </div>
            <?php endforeach;?>
        </div>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>