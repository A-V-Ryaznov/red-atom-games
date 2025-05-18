<?php

    if(!$_SESSION){
        header('location: ' . BASE_URL. 'auth.php');
    }

    $message = [];
    $id = '';
    $name = '';
    $description = '';
    $topics = selectAll('topics');

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['topic-create'])){

        $name = trim($_POST['name']);
        $description = trim($_POST['description']); 

        if($name === '' || $description === ''){
            array_push($message, "Не все данные заполнены");
        }
        else{

            $existence = selectOne('topics', ['name' => $name]);

            if(!empty($existence['name']) && $existence['name'] === $name){
                array_push($message, "Данная категория уже существует");
           }
            else{
                $post = [
                    'name' => $name,
                    'description' => $description,
                ];

                insert('topics', $post);
                header('location: '."index.php");
            } 
        }
    }
    else{
        //$name = '';
       // $description = '';
    }


    //Редактирование
    if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['id'])){
        $id = $_GET['id'];

        $topics = selectOne('topics',['id'=>$id]);
        $id = $topics['id'];
        $name = $topics['name'];
        $description = $topics['description'];
    }

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['topic-edit'])){

        $name = trim($_POST['name']);
        $description = trim($_POST['description']);

        if($name === '' || $description === ''){
            array_push($message,  "Не все поля заполнены!");
        }
        else{
            $topic = [
                'name' => $name,
                'description' => $description
            ];
            $id = $_POST['id'];
            update('topics', $id, $topic);
            header("location: "."index.php");
        }
    }
    //Удаление категории
    // Удаление категории
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        deleteContent('topics', $id);
        header("location: "."index.php");
    }
?>
