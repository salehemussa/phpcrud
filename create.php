<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('db.json'), true);
    
    $newRecord = [
        'id' => time(),  // Generate a unique ID based on timestamp
        'name' => $_POST['name'],
        'email' => $_POST['email']
    ];
    
    $data[] = $newRecord;
    file_put_contents('db.json', json_encode($data));
    
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
</head>
<body>
    <h1>Add New Record</h1>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
