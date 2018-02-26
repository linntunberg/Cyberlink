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
      $getPassword = $pdo->prepare('SELECT * FROM users WHERE userID=:id');
      $getPassword->bindParam(':id', $_SESSION['user']);
      $getPassword->execute();
      $data = $getPassword->fetch(PDO::FETCH_ASSOC); //gets all the information selected and puts it in an array called getPassword

if(password_verify($data['password'], $_POST['oldpassword']) && $_POST['Newpassword'] == $_POST['Repeatpassword'])
{
    $password = password_hash(filter_var($_POST['Newpassword'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

}

$statement = $pdo->prepare('UPDATE users SET password =:password WHERE userID = :id');
$statement->bindParam(':id', $_SESSION['user']);
$statement->bindParam(':password', $password);
$statement->execute();

redirect('../../profile.php');
}

if(isset($_POST['biography'])) {

  $biography = filter_var($_POST['biography']);

  $statement = $pdo->prepare('UPDATE users SET biography =:biography WHERE userID = :id');
  $statement->bindParam(':id', $_SESSION['user']);
  $statement->bindParam(':biography', $biography);
  $statement->execute();

redirect('../../profile.php');
}

if (isset($_FILES['file'])) {
    $getUsername = $pdo->prepare('SELECT * FROM users WHERE userID=:id');
    $getUsername->bindParam(':id', $_SESSION['user']);
    $getUsername->execute();
    $user = $getUsername->fetch(PDO::FETCH_ASSOC);
    $imagename = 'images/'.$user['username']."image.jpg";


    if(move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'/../'.$imagename)) {
        $statement = $pdo->prepare('UPDATE users SET image_url =:image_url WHERE userID = :id');
        $statement->bindParam(':id', $_SESSION['user']);
        $statement->bindParam(':image_url', $imagename);
        $statement->execute();
        redirect('../../profile.php');
    }


}
