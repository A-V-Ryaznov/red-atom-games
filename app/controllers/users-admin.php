<?php

    if (!$_SESSION) {
        header('location: ' . BASE_URL. 'auth.php');
    }

    $message = [];
    $login = '';
    $email = '';


    $users = selectAll('users');


    //создание через админку
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {

        $admin = 0;
        $login = trim($_POST['UserLogin']);
        $email = trim($_POST['UserEmail']);
        $password = trim($_POST['UserPassword']);
        $passwordConfirm = trim($_POST['UserConfirmPassword']);




        if ($login === '' || $email === '' || $password === '') {
            array_push($message, "Не все данные заполнены");
        } elseif (mb_strlen($login, 'UTF8') < 3) {
            array_push($message, "Минимальная длина логина 3 символа");
        } elseif ($password !== $passwordConfirm) {
            array_push($message,  "Пароли должны соответствовать");
        } else {

            $existence = selectOne('users', ['email' => $email]);
            $existence2 = selectOne('users', ['username' => $login]);

            if (!empty($existence['email']) && $existence['email'] === $email) {
                array_push($message, "Данная почта уже зарегистрирован");
            } elseif (!empty($existence2['email']) && $existence2['username'] === $login) {
                array_push($message, "Данный логин уже зарегистрирован");
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);

                if(isset($_POST['admin'])){
                    $admin = 1;
                }

                $post = [
                    'admin' => $admin,
                    'username' => $login,
                    'email' => $email,
                    'password' => $password
                ];

                //$message = "Регистрация прошла успешно.";
                insert('users', $post);
                $user = selectOne('users', ['username' => $login]);
                $login = '';
                $email = '';
                header('location: '.'index.php');

            }
        }
    } else {
        $login = '';
        $email = '';
    }


    // Удаление пользователя
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['dell_id'])) {
        $id = $_GET['dell_id'];
        deleteContent('users', $id);
        header("location: " . "index.php");
    }



    //Редактирование
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
        $id = $_GET['edit_id'];

        $user = selectOne('users', ['id' => $id]);

        $id = $user['id'];
        $admin =$user['admin'];
        $username = $user['username'];
        $email = $user['email'];
        $admin = $user['admin'];
        $blocked = $user['blocked'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){

        $id =  $_POST['id'];
        $login = trim($_POST['UserLogin']);
        $email = trim($_POST['UserEmail']);
        $password = trim($_POST['UserPassword']);
        $passwordConfirm = trim($_POST['UserConfirmPassword']);
        $admin = isset($_POST['admin']) ? 1 : 0;
        $blocked = isset($_POST['blocked']) ? 1 : 0;

        if($login === ''){
            array_push($message, "Не все поля заполнены!");
        }
        elseif (mb_strlen($login, 'UTF8') < 3) {
            array_push($message, "Минимальная длина логина 3 символа");
        } elseif (!empty($password)){
            if($password !== $passwordConfirm){
                array_push($message,  "Новые пароли должны соответствовать");
            }
            else{
              $password = password_hash($password, PASSWORD_DEFAULT);
                if (isset($_POST['admin'])) {
                    $admin = 1;
                }

                $user = [
                    'admin' => $admin,
                    'username' => $login,
                    'email' => $email,
                    'blocked' => $blocked,
                    'password' => $password
                ];


                update('users', $id, $user);
                header('location: ' . 'index.php');
            }
        }
        else{
            
            if(isset($_POST['admin'])){
                $admin = 1;
            }

            $user = [
                'admin' => $admin,
                'email' => $email,
                'blocked' => $blocked,
                'username' => $login
            ];  
    
            update('users', $id, $user);
            header('location: '.'index.php');
        }


    }
    else{
        //$title = $_POST['title'];
        //$content = $_POST['content'];
        //$publish = isset($_POST['publish']) ? 1 : 0;
        //$topic = $_POST['id_topic'];
    }
?>