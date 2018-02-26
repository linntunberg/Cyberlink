<?php declare(strict_types=1);
require __DIR__.'/../autoload.php';

if(isset($_GET['id'])) {
    $postID =  filter_var($_GET['id'], FILTER_SANITIZE_STRING);
}

$statement = $pdo->prepare("DELETE FROM posts WHERE postID = :postID"); //Prepare the database for the information and tell it where to put the information.
$statement ->bindParam(':postID', $postID);

$statement -> execute();

redirect('../../myposts.php');
