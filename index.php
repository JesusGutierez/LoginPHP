<?php
    session_start();

    require 'database.php';

    if (isset($_SESSION['user_id'])) {
        $records = $con->prepare('SELECT id, email, password FROM user WHERE id = :id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results)>0) {
            $user = $results;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to my app</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

    <?php
        require 'partials/header.php'
    ?>

    <?php if (!empty($user)): ?>
        <br>Welcome. <?= $user['email'] ?>
        <br>You are Succesfully Logged In
        <a href="logout.php">logout</a>
    <?php else: ?>
        <h1>Please login or signup</h1>

        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    <?php endif; ?>
</body>
</html>
