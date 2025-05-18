<?php 
    include("path.php"); 
    include_once("app/database/db.php");
    include("app/controllers/single.php");
    //include("app/controllers/commentaries.php");
?>

<!doctype html>
<html lang="ru">
  <head>

    <title>Red Atom</title>

    <meta charset="utf-8">
    <!--Adaptive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--Off iphone -->
    <meta name="format-direction" content="telephone=no">
    <!--Description-->
    <meta name="description" content="Главная страница сайта игровой студии Red Atom, содержит общую информацию о деятельности компании">
   
    <meta name="Author" content="Artem Oganesyants">
    <meta name="Copyright" content="Artem Oganesyants">

    <link rel="stylesheet" href="/red-atom-games/assets/css/style.css">

  </head>
  <body>
    <div class="wrapper">
        <?php include("app/include/header.php"); ?>

        <main class="page">
           <div class="single__container _container">
                <div class="single__category">
                    <div class="category__first">
                        Metro Mod
                    </div>
                    <div class="category__delimiter">
                        >
                    </div>
                    <div class="category__two">
                        <?=$topic?>
                    </div>
                </div>
                <div class="single__header">
                    <h1><?=$title?></h1>
                </div>
                <div class="single__date">
                    <?=$data?>
                </div>
                <div class="single__img">
                    <img src="/red-atom-games/assets/image/posts/<?=$img?>" alt="Oh, this problem">
                </div>
                <div class="single__content">
                    <?=$content?>
                </div>
           </div>
        </main>
        <?php include("app/include/comments-form.php"); ?>
        <?php include("app/include/comments.php"); ?>
        <?php include("app/include/footer.php"); ?>
    </div>
    <!--JS-->
    <!--<script src="../js/script.js"></script>!-->
  </body>
</html>