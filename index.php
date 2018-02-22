<?php declare(strict_types=1); ?>
<?php require __DIR__.'/views/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/stylesheet.css">

<article>
    <h1>Welcome to Cyberlink!</h1>

<?php
    $statement = $pdo->prepare('SELECT * FROM posts WHERE userID = :id');
    $statement->bindParam(':id', $_SESSION['user']); //user id is same as id, connects them.
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    ?>

    <li>Title: <?php echo $user['title']?></li>
    <li>Link: <?php echo $user['link']?></li>
    <li>Description: <?php echo $user['description']?></li>
