<?php declare(strict_types=1);
require __DIR__.'/../autoload.php';

if (isset($_POST['title']) && isset($_POST['link']) && isset($_POST['description'])) //isset is a function, so parenthases. If the username and password is set, it will continue, otherwise not.
{

$postID = filter_var($_POST['postID'], FILTER_SANITIZE_STRING);
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$link = filter_var($_POST['link'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING); //Take what you get from the form and set to the variable at the beginning, and then filters and sanitizes. Filters the title, link, and description so that they become more secure.
$userid = ($_SESSION['user']);


$statement = $pdo->prepare("UPDATE posts SET title = :title, link = :link, description = :description WHERE postID = :postID"); //Prepare the database for the information and tell it where to put the information.


$statement ->bindParam(':title', $title); //bind the variable title with the parameter that you send to the database.
$statement ->bindParam(':link', $link);
$statement ->bindParam(':description', $description);
$statement ->bindParam(':postID', $postID);

$statement -> execute();

redirect('../../myposts.php');
}
