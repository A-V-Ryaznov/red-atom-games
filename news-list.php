<?php
    include("path.php");
    include_once("app/database/db.php");

$topics = selectAll('topics');
$posts = selectAllPosts();

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['search-term'])){
    $posts = searchInTitleAndContent($_POST['search-term']);
}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-search'])){

    $category = $_POST['category'];

    if(!$category==0){
        $posts = searchInCategory($category);
    }
}


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
    <meta name="description"
        content="Главная страница сайта игровой студии Red Atom, содержит общую информацию о деятельности компании">

    <meta name="Author" content="Artem Oganesyants">
    <meta name="Copyright" content="Artem Oganesyants">

    <link rel="stylesheet" href="/red-atom-games/assets/css/style.css">

</head>

<body>
    <div class="wrapper">
        <?php include("app/include/header.php"); ?>

        <main class="page">
            <div class="news__container _container">
                <div class="news__page__header">
                    <h1>Новости</h1>
                </div>
                <div class="news__page__category">
                    <div class="category__title">
                        Категории
                    </div>
                    <div class="category__search">
                        <form name="category_form" action="news-list.php" method="post">
                            <select name="category">
                                <option selected value="0">Все</option>
                                <?php foreach ($topics as $key => $topic): ?>
                                    <option value="<?=$topic['id']?>">
                                        <?= $topic['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="button_search">
                                <button type="submit" name="button-search">Найти</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="search__content">
                    <form name="search_form" action="news-list.php" method="post">
                        <div class="form__input">
                            <input type="text" name="search-term" value="" placeholder="Поиск">
                        </div>
                    </form>
                </div>
                <div class="news__list">
                    <?php for ($i = 0; $i < count($posts); $i += 3): ?>
                        <div class="news__list__line">
                            <?php for ($j = $i; $j < $i + 3 && $j < count($posts); $j++): ?>
                                <?php $post = $posts[$j]; ?>
                                <div class="news__list__item">
                                    <div class="list__item__image">
                                        <img src="<?= '/red-atom-games/assets/image/posts/' . $post['img'] ?>" alt="<?= $post['title'] ?>">
                                    </div>
                                    <div class="list__item__header">
                                        <a href="<?= "news-single.php?id=" . $post['id'] ?>"><?= substr($post['title'], 0, 50) ?></a>
                                    </div>
                                    <div class="list__item__data">
                                        <div class="item__data__category">
                                            <?= $post['name'] ?>
                                        </div>
                                        <div class="item__data__date">
                                            <?= $post['created_date'] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </main>

        <?php include("app/include/footer.php"); ?>
    </div>
    <!--JS-->
    <!--<script src="../js/script.js"></script>!-->
</body>

</html>