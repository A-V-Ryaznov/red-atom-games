<?php 
    include("path.php"); 
    include_once("app/database/db.php");
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
            <div class="page__about-block about-block">
                <div class="about-block__container _container">
                    <div class="about-block__body">
                        <h1 class="about-block__title">Мы - команда энтузиастов</h1>
                            <div class="about-block__subbody">
                                <div class="about-block__text">
                                    Наша работа начинается с создания модификации Metro Mod в 2021 году, которая переносит игроков во вселенную Метро Дмитрия Глуховского в многопользовательском режиме. Для нас крайне важно всегда быть на связи с своими пользователями, чтобы обеспечивать их качественным продуктом
                                </div>     
                                <div class="about-block__underbody">
                                    <img class="about-block__img"  src="/red-atom-games/assets/image/RedAtomGamesLogo.png" alt="Oh, this problem"> 
                                    <div class="about-block__name">Red Atom</div>
                                </div>     
                                                         
                            </div>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </main>
        <?php include("app/include/footer.php"); ?>
    </div>
    <!--JS-->
    <!--<script src="../js/script.js"></script>!-->
  </body>
</html>