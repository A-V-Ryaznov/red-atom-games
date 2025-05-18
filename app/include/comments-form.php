<?php
include "app/controllers/commentaries.php";
?>


<?php if(isset($_SESSION['id'])): ?>
    <div class="commentary__form__container _container">
        <div class="commentary__form">
            <div class="commentary__form__header">
                Оставьте комментарий
            </div>
            <div class="commentary_form_error">
                <?php if(count($message)>0):  ?>
                    <?php foreach($message as $error):?>
                        <p><?=$error?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <form method="post" action="<?php "http://localhost/red-atom-games/"."news-single.php?id=".$id_post ?>">
                <input type="hidden" name="id_post" value="<?=$id_post;?>">
                <input type="hidden" name="id_user" value="<?=$id_user;?>">
                <textarea name="content" class="commentary__textarea"></textarea>
                <div class="form__button">
                    <button type="submit" name="add-comment">Отправить</button>
                </div>
            </form>
        </div>
    </div>
<?php endif;?>