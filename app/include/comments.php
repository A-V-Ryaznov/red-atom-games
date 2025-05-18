<?php
    include "app/controllers/commentaries-get.php";

?>
<?php foreach ($allComments as $comment): ?>
    <div class="commentary__container _container">
        <div class="commentary__item">
            <div class="commentary__header">
                <div class="Commentary__author">
                    <?= $comment["username"] ?>
                </div>
                <div class="commentary__date">
                    <?= $comment["created_date"] ?>
                </div>
            </div>
            <div class="commentary__content">
                <?= $comment["content"] ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
