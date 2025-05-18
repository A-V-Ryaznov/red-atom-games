<?php 
    include("path.php");
    include_once("app/database/db.php");
    include("app/controllers/users.php"); 
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
            <div class="form__container _container">
                <div class="form__header">
                    <h1>Авторизация</h1>
                </div>
                <div class="form__content">
                    <form name="auth__form" action="auth.php" method="post">
                        <div class="form__text">
                            Ваша почта
                        </div>
                        <div class="form__input">
                            <input type="email" name="UserEmail" value="<?=$email?>">
                        </div>
                        <div class="form__text">
                            Пароль
                        </div>
                        <div class="form__input">
                            <input type="password" name="UserPassword">
                        </div>
                        <div class="form_error">
                            <p><?=$message?></p>
                        </div>
                        <div class="form__control">
                            <div class="form__button">
                                <button type="submit" name="button-auth" >Войти</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form__anchor a">
                    <a href="<?php echo BASE_URL . 'reg.php'?>">Пройти регистрацию</a>
                </div>
            </div>
        </main>

        <?php include("app/include/footer.php"); ?>
    </div>
    <!--JS-->
    <!--<script src="../js/script.js"></script>!-->
  </body>
</html>