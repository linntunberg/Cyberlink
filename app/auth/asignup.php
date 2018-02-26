<?php declare(strict_types=1);

require __DIR__.'/../autoload.php';


if (isset($_POST['username']) && isset($_POST['password'])) //isset is a function, so parenthases. If the username and password is set, it will continue, otherwise not.
{

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = password_hash(filter_var($_POST['password'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING); //Take what you get from the form and set to the variable at the beginning, and then filters and sanitizes. Filters the username, email, and password so that they become more secure and hashes the password


$statement = $pdo->prepare("INSERT INTO users(username, password, email) VALUES (:username, :password, :email)"); //Prepare the database for the information and tell it where to put the information.
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$statement ->bindParam(':username', $username); //bind the variable username with the parameter that you send to the database.
$statement ->bindParam(':password', $password);//same
$statement ->bindParam(':email', $email);

$statement -> execute();


redirect('../../login.php');
}
