<?php
    if (!$_SESSION) {
        header('location: ' . BASE_URL . 'auth.php');
    }
    //Контроллер

    $comments = selectAllComments();
    $message = [];
   

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-comment'])) {

        $publish = isset($_POST['publish']) ? 1 : 0;
        $id = $_POST['id'];

        $comment = [
            'status' => $publish
        ];

        update('comments', $id, $comment);
        header('location: ' . 'index.php');
        
    }
    else{

    }


    //редактирование



    //получение данных для редактирования

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        $comment = selectOneComment($id);

        $username = $comment['username'];
        $title = $comment['title'];
        $content = $comment['content'];
        $data = $comment['created_date'];
        $content = $comment['content'];
        
        $publish = $comment['status'];
    }


    // Удаление статьи
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
        $id = $_GET['del_id'];
        deleteContent('comments', $id);
        header("location: " . "index.php");
    }

    // Статус опубликовать или снять с публикации
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
        $id = $_GET['pub_id'];
        $publish = $_GET['publish'];

        update('comments', $id, ['status' => $publish]);

        header('location: ' . 'index.php');
    }

?>