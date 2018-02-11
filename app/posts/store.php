<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we store/insert new posts in the database.

if (isset($_POST['title']) && isset($_POST['link']) && isset($_POST['description'])) //isset is a function, so parenthases. If the username and password is set, it will continue, otherwise not.
{

$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$link = filter_var($_POST['link'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING); //Take what you get from the form and set to the variable at the beginning, and then filters and sanitizes. Filters the title, link, and description so that they become more secure.
$userid = ($_SESSION['userid']);

$statement = $pdo->prepare("INSERT INTO posts(title, link, description, userid) VALUES (:title, :link, :description, :userid)"); //Prepare the database for the information and tell it where to put the information.


$statement ->bindParam(':title', $title); //bind the variable title with the parameter that you send to the database.
$statement ->bindParam(':link', $link);//same
$statement ->bindParam(':description', $description);
$statement ->bindParam(':userid', $userid);

$statement -> execute();

redirect('../../login.php');
}
