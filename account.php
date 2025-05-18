<?php 
    include("path.php"); 
    include_once("app/database/db.php");
    include_once("app/controllers/account.php"); 
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
                    <h1>Аккаунт</h1>
                </div>
                <div class="form__content">
                    <form name="account__form" action="account.php" method="post">
                        <div class="form__text">
                            Здесь вы можете удалить свой аккаунт
                        <div class="form__checkbox__container">
                            <div class="form_checkbox">
                                <input class="form_checkbox_1" type="checkbox" name="confirm" value="1">
                            </div>
                            <div class="form__text_1">
                                Я хочу удалить свой аккаунт
                            </div>
                        </div>
                        <div class="form_error">
                            <p><?=$message?></p>
                        </div>
                        <div class="form__control">
                            <div class="form__button">
                                <button type="submit" name="button-account" >Удалить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <?php include("app/include/footer.php"); ?>
    </div>
    <!--JS-->
    <!--<script src="../js/script.js"></script>!-->
  </body>
</html>