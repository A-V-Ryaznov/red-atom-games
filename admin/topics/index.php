<?php
    include "../../path.php";
    include_once "../../app/database/db.php";
    include("../../app/controllers/topics.php");
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
            <div class="button row">
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/topics/create.php";?>" class="col-3 btn btn-success green-btn">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/topics/index.php";?>" class="col-3 btn btn-warning edit-btn">Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Управление категориями</h2>
                <div class="col-1 text">ID</div>
                <div class="col-5 text">Название</div>
                <div class="col-4 text">Управление</div>
            </div>
            <?php foreach ($topics as $key => $topic): ?>
            <div class="row post">
                <div class="id col-1 text"><?=$key + 1; ?></div>
                <div class="title col-5 text"><?=$topic['name']; ?></div>
                <div class="red col-2 text"><a href="edit.php?id=<?=$topic['id']; ?>">Изменить</a></div>
                <div class="del col-2 text"><a href="index.php?del_id=<?=$topic['id']; ?>">Удалить</a></div>
            </div>
            <?php endforeach; ?>
        </div>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>