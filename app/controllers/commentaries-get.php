<?php
    //Контроллер

    $content = '';

    $allComments = [];

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id_post = $_GET['id'];

        $allComments = selectAllCommentsInPost($id);
    }

?>