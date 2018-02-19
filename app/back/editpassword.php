<?php declare(strict_types=1);
require __DIR__.'/../autoload.php';

if(isset($_POST['password'])) {
  $email = filter_var($_POST['password']);

  $statement = $pdo->prepare('UPDATE users SET password =:password WHERE userID = :id');
  $statement->bindParam(':id', $_SESSION['user']);
  $statement->bindParam(':password', $password);
  $statement->execute();

redirect('../../profile.php');
}
