<?php
if (isset($_GET['id'])) {
    $data = json_decode(file_get_contents('db.json'), true);

    $data = array_filter($data, function($item) {
        return $item['id'] != $_GET['id'];
    });

    file_put_contents('db.json', json_encode(array_values($data)));
    header('Location: index.php');
    exit();
}
?>
