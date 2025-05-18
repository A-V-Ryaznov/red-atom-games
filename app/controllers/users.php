<?php
    
    $message = '';



    //формы регистрации
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-reg'])){
        $admin = 0;
        $login = trim($_POST['UserLogin']);
        $email = trim($_POST['UserEmail']);
        $password = trim($_POST['UserPassword']);
        $passwordConfirm = trim($_POST['UserConfirmPassword']);
        $confirm = isset($_POST['confirm']) ? 1 : 0;

        if($login === '' || $email === '' || $password === ''){
            $message = "Не все данные заполнены";
        }
        elseif(mb_strlen($login, 'UTF8')< 3){
            $message = "Минимальная длина логина 3 символа";
        }
        elseif($password !== $passwordConfirm){
            $message = "Пароли должны соответствовать";
        }
        elseif($confirm === 0){
            $message = "Вы не дали согласие на обработку";
        }
        else{

            $existence = selectOne('users', ['email' => $email]);
            $existence2= selectOne('users', ['username' => $login]);

            if(!empty($existence['email']) && $existence['email'] === $email){
                 $message = "Данная почта уже зарегистрирован";
           }
           
            elseif(!empty($existence2['email']) && $existence2['username'] === $login ){
                $message = "Данный логин уже зарегистрирован";
            }

            else{
                $password = password_hash($password, PASSWORD_DEFAULT);
                $post = [
                    'admin' => $admin,
                    'username' => $login,
                    'email' => $email,
                    'password' => $password
                ];

                //$message = "Регистрация прошла успешно.";
                insert('users', $post);
                $user = selectOne('users',['username'=>$login]);

                //задаем сессию
                $_SESSION['id'] = $user['id'];
                $_SESSION['login'] = $user['username'];
                $_SESSION['admin'] = $user['admin'];

                if($_SESSION['admin']){
                    header('location: '.BASE_URL.'admin/admin.php');
                }
                else{
                    header('location: '.BASE_URL);
                }
            } 
        }
    }
    else{
        $login = '';
        $email = '';
    }



    //авторизация
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-auth'])){

        $email = trim($_POST['UserEmail']);
        $password = trim($_POST['UserPassword']);

       

        if($email === '' || $password === ''){
            $message = "Не все данные заполнены";
        }   
        else{
            $existence = selectOne('users', ['email' => $email]);
            if(!empty($existence['email']) && $existence['email'] === $email)
            {     
                if(!empty($existence) && password_verify($password, $existence['password'])){
                    if($existence['blocked'] === '1'){
                        $message = "Пользователь заблокирован либо удален";
                    } 
                    else {
                        $_SESSION['id'] = $existence['id'];
                        $_SESSION['login'] = $existence['username'];
                        $_SESSION['admin'] = $existence['admin'];

                        if ($_SESSION['admin']) {
                            header('location: ' . BASE_URL . 'admin/posts/index.php');
                        } else {
                            header('location: ' . BASE_URL);
                        }
                    }
                }

                else{
                    $message = "Почта либо пароль введены неверно";
                }
            }
            else{
                $message = "Почта либо пароль введены неверно";
            }

        }
    }

?>