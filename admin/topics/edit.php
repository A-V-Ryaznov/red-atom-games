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
                <h2>Обновление категории</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!--Error-->
                    <?php include "../../app/helps/error-info.php"; ?>
                </div>
                <form accept="create.php" method="post">
                    <input name="id" value="<?=$id?>" type="hidden">
                    <div class="col">
                        <label for="content" class="form-label text">Имя категории</label>
                        <input name="name" value="<?=$name?>" type="text" class="form-control input-new" aria-label="Title">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label text">Описание категории</label>
                        <textarea name="description" class="form-control input-new" id="content" rows="6"><?=$description?></textarea>
                    </div>
                    <div class="col">
                        <button name="topic-edit" class="btn btn-primary" type="submit">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>