<?php declare(strict_types=1);
require __DIR__.'/views/header.php';

   $statement = $pdo->prepare('SELECT * FROM users WHERE userID = :id');
   $statement->bindParam(':id', $_SESSION['user']); //user id is same as id, connects them.
   $statement->execute();
   $user = $statement->fetch(PDO::FETCH_ASSOC);

 ?>

<h1>Welcome!</h1>

<img class="profileimage" src="app/<?php echo $user['image_url']?>">
<ul>
    <li>Username: <?php echo $user['username']?></li>
    <li>Email: <?php echo $user['email']?></li>
    <li>Bio: <?php echo $user['biography']?></li>
</ul>
<a class="btn" href= "./editprofile.php">Edit Profile</a>
