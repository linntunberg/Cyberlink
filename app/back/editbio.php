<?php declare(strict_types=1);
require __DIR__.'/../autoload.php';

if(isset($_POST['biography'])) {
  $email = filter_var($_POST['biography']);

  $statement = $pdo->prepare('UPDATE users SET biography =:biography WHERE userID = :id');
  $statement->bindParam(':id', $_SESSION['user']);
  $statement->bindParam(':biography', $biography);
  $statement->execute();

redirect('../../profile.php');
}
