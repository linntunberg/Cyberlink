<?php declare(strict_types=1); ?>
<?php require __DIR__.'/views/header.php'; ?>


<article>
<?php
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true): ?>


<h1><?php echo "Welcome to Cyberlink ".$_SESSION['username']."!"; ?></h1>

<?php else: ?>

    <h1>Welcome to Cyberlink!</h1>
<?php endif ?>
<?php
    $statement = $pdo->prepare('SELECT * FROM posts');
    // $statement->bindParam(':id', $_SESSION['user']); //user id is same as id, connects them.
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($posts as $post) {

    ?><ul>
        <li>Title: <?php echo $post['title']?></li>
        <li>Link: <?php echo $post['link']?></li>
        <li>Description: <?php echo $post['description']?></li>
    </ul>
<?php
}
?>
