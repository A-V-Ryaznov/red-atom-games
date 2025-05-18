<?php

session_start();

/*
Логика работы с базой данных
*/
require('connect.php');


//Выводим данные запроса (для тестирования)
function printData($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
//Проверка выполнения запроса к БД
function checkForError($query){
    $errorInfo = $query->errorInfo();
    if($errorInfo[0] !== PDO::ERR_NONE){
        echo $errorInfo[2];
        exit();
    }
    return true;
}
//Запрос на получение данных с одной таблицы
function selectAll($table, $params=[]){
    global $pdo;

    $sql = "Select * From $table";

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){

            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " Where $key=$value";
            }
            else{
                $sql = $sql . " And $key=$value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query -> execute();

    checkForError($query);
   
    return $query->fetchAll();
}

//Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params=[]){
    global $pdo;

    $sql = "Select * From $table";

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){

            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " Where $key=$value";
            }
            else{
                $sql = $sql . " And $key=$value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1";

    $query = $pdo->prepare($sql);
    $query -> execute();

    checkForError($query);
   
    return $query->fetch();
}

//Запись данных в таблицу
function insert($table, $params ){
    global $pdo;

    $i = 0;
    $column = '';
    $mask = '';
    foreach($params as $key => $value){
        if($i === 0){
            $column = $column . "$key"; 
            $mask = $mask . "'" . "$value". "'"; 
        }
        else{
            $column = $column . ", $key"; 
            $mask = $mask . ", '"."$value" . "'"; 
        }
        $i++;
    }


    $sql = "INSERT INTO $table ($column) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query -> execute($params);

    checkForError($query);
}

//Обновление строки в таблице
function update($table,$id, $params){
    global $pdo;

    $i = 0;
    $str = '';
    foreach($params as $key => $value){
        if($i === 0){
            $str = $str .$key. " = '" . $value. "'"; 
        }
        else{
            $str = $str .", ".$key. " = '" . $value. "'"; 
        }
        $i++;
    }
    

    $sql = "UPDATE $table SET $str WHERE id = $id";

    $query = $pdo->prepare($sql);
    $query -> execute($params);

    checkForError($query);
}

function selectActualPosts(){
    global $pdo; 

    $sql = " SELECT t1.id, t1.title, t1.img, t1.status, t2.name, t1.created_date FROM posts AS t1 JOIN topics AS t2 ON t1.id_topic = t2.id Where status = 1 ORDER BY created_date DESC LIMIT 3;";
   

    $query = $pdo->prepare($sql);
    $query -> execute();

    checkForError($query);
   
    return $query->fetchAll();

}
function selectAllPosts(){
    global $pdo; 

    $sql = " SELECT t1.id, t1.title, t1.img, t1.status, t2.name, t1.created_date FROM posts AS t1 JOIN topics AS t2 ON t1.id_topic = t2.id Where status = 1 ORDER BY created_date DESC;";
   

    $query = $pdo->prepare($sql);
    $query -> execute();

    checkForError($query);
   
    return $query->fetchAll();
}

//Поиск по заголовкам и содержимому
function searchInTitleAndContent($text){

    $text = trim(strip_tags(stripslashes(htmlspecialchars($text))));

    global $pdo; 

    $sql = " SELECT t1.id, t1.title, t1.img, t1.status, t2.name, t1.created_date 
    FROM posts AS t1 JOIN topics AS t2 ON t1.id_topic = t2.id 
    Where status = 1 AND t1.title LIKE '%$text%'
    ORDER BY created_date DESC;";
   
    //OR t1.content LIKE '%$text%'

    $query = $pdo->prepare($sql);
    $query -> execute();

    checkForError($query);
   
    return $query->fetchAll();
}
//Поиск по категориям
function searchInCategory($id){

    $text = trim(strip_tags(stripslashes(htmlspecialchars($id))));

    global $pdo; 

    $sql = " SELECT t1.id, t1.title, t1.img, t1.status, t2.name, t1.created_date 
    FROM posts AS t1 JOIN topics AS t2 ON t1.id_topic = t2.id 
    Where status = 1 AND t2.id LIKE '%$id%'
    ORDER BY created_date DESC;";
   
    //OR t1.content LIKE '%$text%'

    $query = $pdo->prepare($sql);
    $query -> execute();

    checkForError($query);
   
    return $query->fetchAll();
}

function selectCountPosts(){
    global $pdo; 

    $sql = "SELECT COUNT(*) From posts;";
   

    $query = $pdo->prepare($sql);
    $query -> execute();

    checkForError($query);
   
    return $query->fetch();
}

//Удаление строки
function deleteContent($table,$id){
    global $pdo; 

    $sql = "DELETE FROM $table WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query -> execute();

}



//Выбор записей (posts) с автором в админку

function selectAllFromPostsWithUsers($table1, $table2){
    global $pdo;

    $sql = "SELECT 
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_topic,
    t1.created_date,
    t2.username
     FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";

    $query = $pdo->prepare($sql);
    $query -> execute();
    checkForError($query);
    return $query->fetchAll();
}

//Найти пост с категорией (для одиночного)
function selectOnePost($id){
    global $pdo;

    $sql = "SELECT t1.title,
     t1.img, 
     t1.content,
     t2.name,
     t1.created_date
     From posts as t1 JOIN topics as t2 on t1.id_topic=t2.id
     Where $id = t1.id;";
    

    $query = $pdo->prepare($sql);
    $query -> execute();
    checkForError($query);
    return $query->fetch();

}

function selectAllCommentsInPost($id){
    global $pdo;

    $sql = "SELECT 
    users.username,
    comments.created_date,
    comments.content
    
    FROM comments JOIN users ON comments.id_user = users.id
    Where comments.id_post = $id AND comments.status = 1";
    

    $query = $pdo->prepare($sql);
    $query -> execute();
    checkForError($query);
    return $query->fetchAll();
}

function selectAllComments(){
    global $pdo;

    $sql = "SELECT 
    comments.id,
    users.username,
    posts.title,
    comments.created_date,
    comments.status
    
    From comments JOIN users JOIN posts ON comments.id_post = posts.id AND comments.id_user = users.id";
    

    $query = $pdo->prepare($sql);
    $query -> execute();
    checkForError($query);
    return $query->fetchAll();
}
function selectOneComment($id){
    global $pdo;

    $sql = "SELECT 
	comments.id,
	posts.title,
    users.username,
    comments.created_date,
    comments.content,
    comments.status
    
    From comments JOIN users JOIN posts ON comments.id_post = posts.id AND comments.id_user = users.id
    Where comments.id = $id";
    

    $query = $pdo->prepare($sql);
    $query -> execute();
    checkForError($query);
    return $query->fetch();
}


?>