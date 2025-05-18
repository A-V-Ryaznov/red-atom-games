<?php
    

    //Контроллер
    $message = [];

    $id_post = $_GET['id'];
    $id_user = '';
    
    if(!$_SESSION){
        $id_user = 0;
    }
    else{
        $id_user = $_SESSION['id'];
    }

    $content = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-comment'])) {

        $content = trim($_POST['content']);

        if($content === ''){
            array_push($message, "Нельзя оставить комментарий без текста");
            header('location: ' . "news-single.php?id=".$id_post);  
        }
        else{

            $comment = [
                'id_post' => $id_post,
                'id_user' => $id_user,
                'content' => $content
            ];

            insert('comments', $comment);
            header('location: ' . "news-single.php?id=".$id_post);  
        }
    }
    else{

    }


?>