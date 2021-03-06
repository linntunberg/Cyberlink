<?php declare(strict_types=1);
require __DIR__.'/views/header.php'; ?>

<h1>My Posts</h1>

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
    <li>Title: <?php echo $post['title']?></li>
    <li>Link: <?php echo $post['link']?></li>
    <li>Description: <?php echo $post['description']?></li>
    <li><a href="/editpost.php?id=<?php echo $post['postID']?>">Edit Post</a></li>
    <li><a href="/app/posts/delete.php?id=<?php echo $post['postID']?>">Delete Post</a></li>
</ul>


<?php endforeach; ?>
