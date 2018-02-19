<?php declare(strict_types=1);
require __DIR__.'/../autoload.php';


if(isset($_POST['email'])) {
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

  $statement = $pdo->prepare('UPDATE users SET email =:email WHERE userID = :id');
  $statement->bindParam(':id', $_SESSION['user']);
  $statement->bindParam(':email', $email);
  $statement->execute();

redirect('../../profile.php');
}

if(isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['repeatpassword'])) {
  $email = filter_var($_POST['password']);

  $statement = $pdo->prepare('UPDATE users SET password =:password WHERE userID = :id');
  $statement->bindParam(':id', $_SESSION['user']);
  $statement->bindParam(':password', $password);
  $statement->execute();

redirect('../../profile.php');
}

if(isset($_POST['biography'])) {
  $email = filter_var($_POST['biography']);

  $statement = $pdo->prepare('UPDATE users SET biography =:biography WHERE userID = :id');
  $statement->bindParam(':id', $_SESSION['user']);
  $statement->bindParam(':biography', $biography);
  $statement->execute();

redirect('../../profile.php');
}
