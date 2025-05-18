    <?php

    $title = '';
    $topic = '';
    $content = '';
    $data = '';
    $img = '';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $post = selectOnePost($id);

        $title = $post['title'];
        $content = $post['content'];
        $topic = $post['name'];
        $img = $post['img'];
        $data = $post['created_date'];
    }

    ?>

    