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
      $getPassword = $pdo->prepare('SELECT * FROM user WHERE userId= :id');
      $getPassword ->bindParam(':id', $_SESSION['userId']);
      $getPassword->execute();
      $getPassword->fetch(PDO::FETCH_ASSOC); //gets all the information selected and puts it in an array called getPassword, fetch and put in an associative array

if(password_verify($getPassword['password'], $_POST['oldpassword']) && $_POST['Newpassword'] == $_POST['Repeatpassword']){}

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
