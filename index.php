<?php
// Read data from db.json
$data = json_decode(file_get_contents('db.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Record List</h1>
    <a href="create.php">Add New Record</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($data as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $item['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
