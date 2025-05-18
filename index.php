<?php 
    include("path.php"); 
    include_once("app/database/db.php");

    $posts = selectActualPosts();
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
                        <h1 class="about-block__title">От людей и для людей</h1>
                            <div class="about-block__subbody">
                                <img class="about-block__img"  src="/red-atom-games/assets/image/QualityLogo.png" alt="Oh, this problem">
                                <div class="about-block__underbody">
                                    <div class="about-block__text">
                                        Первоочередной задачей для нас - это поддержка качества наших продуктов, ради досуга наших пользователей.
                                    </div>
                                    <div class="about-block__buttons">
                                        <a href="abbout-us.php" class="about-block__button button">Подробнее о нашей компании</a>
                                    </div>                      
                                </div>                               
                            </div>
                    </div>
                </div>
            </div>
            <div class="page__title-block title-block">
                <div class="title-block__container _container">
                    <div class="title-block__body">
                        Последние новости
                    </div>
                </div>
            </div>

            <div class="page__last-news last-news">
                <div class="last-news__container _container">
                    <div class="last-news__list">
                        <?php foreach($posts as $post ): ?>
                            <div class="news__list__item">
                                <div class="list__item__image">
                                    <img src="<?='/red-atom-games/assets/image/posts/'.$post['img']?>" alt="<?=$post['title']?>">
                                </div>
                                <div class="list__item__header">
                                    <a href="<?="news-single.php?id=".$post['id']?>"><?=substr($post['title'], 0, 50)?></a>
                                </div>
                                <div class="list__item__data">
                                    <div class="item__data__category">
                                        <?=$post['name']?>
                                    </div>
                                    <div class="item__data__date">
                                        <?=$post['created_date']?>
                                    </div> 
                                </div>
                            </div>
                        <?php endforeach;?>
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