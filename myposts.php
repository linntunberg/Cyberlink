<?php declare(strict_types=1); ?>
<?php require __DIR__.'/views/header.php'; ?>



<h1>My Posts</h1>

<br><button type="submit" id="createlink">Edit link</button>

<?php
$statement = $pdo->prepare('SELECT * FROM posts WHERE userID = :id');
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
$statement->bindParam(':id', $_SESSION['user']); //user id is same as id, connects them.
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($posts as $post): ?>

<ul>
    <li><a href="/editpost.php?id=<?php echo $post['postID']?>">Edit Post</a></li>
    <li>Title: <?php echo $post['title']?></li>
    <li>Link: <?php echo $post['link']?></li>
    <li>Description: <?php echo $post['description']?></li>
</ul>

<?php endforeach; ?>
