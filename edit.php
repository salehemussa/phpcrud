<?php
$data = json_decode(file_get_contents('db.json'), true);
$record = null;

foreach ($data as $item) {
    if ($item['id'] == $_GET['id']) {
        $record = $item;
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($data as &$item) {
        if ($item['id'] == $_POST['id']) {
            $item['name'] = $_POST['name'];
            $item['email'] = $_POST['email'];
            break;
        }
    }
    file_put_contents('db.json', json_encode($data));
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
</head>
<body>
    <h1>Edit Record</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $record['name']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $record['email']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
