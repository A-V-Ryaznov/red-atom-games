<?php
    
    $message = '';



    //форма аккаунта
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-account'])){

        $id = $_SESSION['id'];
        $confirm = isset($_POST['confirm']) ? 1 : 0;

        if($confirm === 0){
            $message = "Вы не дали согласие на удаление";
        }
        else{


            $user = [
                'id' => $id,
                'blocked' => 1
            ];

            update('users', $id, $user);

            unset($_SESSION['id']);
            unset($_SESSION['login']);
            unset($_SESSION['admin']);
        
            header('location: ' .BASE_URL);
        }
    }
    else{
    }


?>