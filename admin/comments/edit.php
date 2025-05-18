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
                <h2>Просмотр комментария</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!--Error-->
                    <?php include "../../app/helps/error-info.php"; ?>
                </div>
                <form accept="edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <div class="col mb-2">
                        <label for="editor" class="form-label  text">Название статьи</label>
                        <input readonly value="<?=$title?>" type="text" class="form-control input-new" aria-label="Title">
                    </div>
                    <div class="col mb-2">
                        <label for="editor" class="form-label text">Автор комментария</label>
                        <input readonly value="<?=$username?>" type="text" class="form-control input-new" aria-label="Title">
                    </div>
                    <div class="col mb-2">
                        <label for="editor" class="form-label text">Дата создания комментария</label>
                        <input readonly value="<?=$data?>" type="text" class="form-control input-new" aria-label="Title">
                    </div>
                    <div class="col mb-4">
                        <label for="editor" class="form-label text">Содержимое комментария</label>
                        <textarea readonly class="form-control input-new" rows="6"><?=$content?></textarea>
                    </div>
                    <div class="form-check">
                        <?php if(empty($publish) && $publish == 0 ): ?>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                            <label class="form-check-label text" for="flexCheckChecked">
                                Опубликовать
                            </label>
                        <?php else: ?>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                            <label class="form-check-label text" for="flexCheckChecked">
                                Опубликовать
                            </label>    
                        <? endif; ?>
                    </div>
                    <div class="col col-6">
                        <button name="edit-comment" class="btn btn-primary" type="submit">Сохранить действия</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../../assets/js/script.js"></script>

</body>