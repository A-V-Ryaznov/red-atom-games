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
            <div class="page__contact">
                <div class="contact__container _container">
                    <div class="contact__header">
                       <h1>Хотите связаться с нами?</h1> 
                    </div>
                    <div class="contact__body">
                        <div class="contact__list">
                            <div class="contact__list__item">
                                <div class="list__item__img">
                                    <img src="/red-atom-games/assets/image/PhoneIcon.png" alt="Oh, this problem">
                                </div>
                                <div class="list__item__text">
                                    +7-777-000-00-00
                                </div>
                            </div>
                            <div class="contact__list__item">
                                <div class="list__item__img">
                                    <img src="/red-atom-games/assets/image/EmailIcon.png" alt="Oh, this problem">
                                </div>
                                <div class="list__item__text">
                                    contact@test.ru
                                </div>
                            </div>
                            <div class="contact__list__item">
                                <div class="list__item__img">
                                    <img src="/red-atom-games/assets/image/LocalIcon.png" alt="Oh, this problem">
                                </div>
                                <div class="list__item__text">
                                    Г. Краснодар Ул. Выдуманная д. 10
                                </div>
                            </div>
                        </div>
                        <div class="contact__logo">
                            <div class="logo__img">
                                <img src="/red-atom-games/assets/image/RedAtomGamesLogo.png" alt="Oh, this problem">
                            </div>
                            <div class="logo__text">
                                Red Atom
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include("app/include/footer.php"); ?>
    </div>
    <!--JS-->
    <!--<script src="../js/script.js"></script>!-->
  </body>
</html>