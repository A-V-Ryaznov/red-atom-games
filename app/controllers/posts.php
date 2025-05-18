    <?php

    if (!$_SESSION) {
        header('location: ' . BASE_URL. 'auth.php');
    }

    $message = [];
    $id = '';
    $title = '';
    $content = '';
    $topic = '';


    $topics = selectAll('topics');
    $posts = selectAll('posts');
    $postsADM = selectAllFromPostsWithUsers('posts', 'users');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {

        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $topic = trim($_POST['topic']);
        $publish = isset($_POST['publish']) ? 1 : 0;

        if ($title === '' || $content === '' || $topic === '') {
            array_push($message, "Не все данные заполнены");
        }
        elseif($topic==='error'){
            array_push($message, "Категория не выбрана");
        }
        else
        {
            if (!empty($_FILES['img']['name'])) {
                $imgName = time() . "_" . $_FILES['img']['name'];
                $fileTmpName = $_FILES['img']['tmp_name'];
                $fileType = $_FILES['img']['type'];
                $destination = ROOT_PATH . "\assets\image\posts\\" . $imgName;
    
                if (strpos($fileType, 'image') === false) {
                    array_push($message, "Приложенный файл не является изображением");
                    $_POST['img'] = '';
                }
                else{
                    $result = move_uploaded_file($fileTmpName, $destination);
                    if ($result) {
                        $_POST['img'] = $imgName;
                    } else {
                        array_push($message, "Ошибка загрузки изображения на сервер");
                    }
                }

                $post = [
                    'id_user' => $_SESSION['id'],
                    'title' => $title,
                    'img' => $_POST['img'],
                    'content' => $content,
                    'status' => $publish,
                    'id_topic' => $topic
                ];
    
                insert('posts', $post);
                header('location: ' . "index.php");
    
            } else {
                array_push($message, "Изображение не выбрано или не получено");

                $post = [
                    'id_user' => $_SESSION['id'],
                    'title' => $title,
                    'img' => '!default.png',
                    'content' => $content,
                    'status' => $publish,
                    'id_topic' => $topic
                ];

                insert('posts', $post);
                header('location: ' . "index.php");
            }
        }
    } else {
        //$name = '';
        // $description = '';
    }


    //Редактирование
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        $post = selectOne('posts', ['id' => $id]);
        
        $title = $post['title'];
        $content = $post['content'];
        $topic = $post['id_topic'];
        $publish = $post['status'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){

        $id =  $_POST['id'];
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $topic = trim($_POST['topic']);
        $publish = isset($_POST['publish']) ? 1 : 0;

        if($title === '' || $content === '' || $topic === ''){
            array_push($message, "Не все поля заполнены!");
        } 
        else
        {
            if (!empty($_FILES['img']['name'])) {
                $imgName = time() . "_" . $_FILES['img']['name'];
                $fileTmpName = $_FILES['img']['tmp_name'];
                $fileType = $_FILES['img']['type'];
                $destination = ROOT_PATH . "\assets\image\posts\\" . $imgName;


                if (strpos($fileType, 'image') === false) {
                    array_push($message, "Подгружаемый файл не является изображением!");
                } else {
                    $result = move_uploaded_file($fileTmpName, $destination);

                    if ($result) {
                        $_POST['img'] = $imgName;
                    } else {
                        array_push($message, "Ошибка загрузки изображения на сервер");
                    }
                }

                $post = [
                    'id_user' => $_SESSION['id'],
                    'title' => $title,
                    'content' => $content,
                    'img' => $_POST['img'],
                    'status' => $publish,
                    'id_topic' => $topic
                ];
    
                update('posts', $id, $post);
                header('location: ' . 'index.php');


            }
            else {
                $post = [
                    'id_user' => $_SESSION['id'],
                    'title' => $title,
                    'content' => $content,
                    'status' => $publish,
                    'id_topic' => $topic
                ];
    
                update('posts', $id, $post);
                header('location: ' . 'index.php');
            }   
        }
    }
    else{
        //$title = $_POST['title'];
        //$content = $_POST['content'];
        //$publish = isset($_POST['publish']) ? 1 : 0;
        //$topic = $_POST['id_topic'];
    }

    // Удаление статьи
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        deleteContent('posts', $id);
        header("location: " . "index.php");
    }

    // Статус опубликовать или снять с публикации
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
        $id = $_GET['pub_id'];
        $publish = $_GET['publish'];

        update('posts', $id, ['status' => $publish]);

        header('location: ' . 'index.php');
    }
    ?>

    