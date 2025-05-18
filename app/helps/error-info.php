<?php if(count($message)>0):  ?>
    <ul>
        <?php foreach($message as $error):?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>