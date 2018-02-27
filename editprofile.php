<?php declare(strict_types=1);
require __DIR__.'/views/header.php';

$statement = $pdo->prepare('SELECT * FROM users WHERE userID = :id');
$statement->bindParam(':id', $_SESSION['user']); //user id is same as id, connects them.
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

?>
<h1>Edit Account</h1>
<br>
<form action="/app/back/editprofile.php" method="POST" enctype="multipart/form-data">
   <input type="file" name="file" accept="" required>
   <button type="submit" name="submit">Upload Profile Image</button>
   </form>



<form method="POST" action="/app/back/editprofile.php"><br>  <!-- sends the input to the file  (back) editprofile.php  -->
    <div class="form">
<strong>Change email: </strong> <input type="text" name="email" value="<?php echo $user['email']?>" required><br>
<br><button type="submit">Confirm</button>
</div>
</form>

<form method="POST" action="/app/back/editprofile.php"><br>  <!-- sends the input to the file  (back) editprofile.php  -->
    <div class="form">
<strong>Old password: </strong> <input type="password" name="oldpassword" required><br>
<strong>New password: </strong> <input type="password" name="newpassword" required><br>
<strong>New password: </strong> <input type="password" name="repeatpassword" required><br>
<br><button type="submit">Confirm</button>

</div>
</form>

<form method="POST" action="/app/back/editprofile.php"><br>  <!-- sends the input to the file  (back) editprofile.php  -->
    <div class="form">
<strong>Change bio: </strong> <input type="text" name="biography" value="<?php echo $user['biography']?>" required><br>
<br><button type="submit">Confirm</button>
</div>
</form>
