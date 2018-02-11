<?php declare(strict_types=1); ?>
<?php require __DIR__.'/views/header.php'; ?>


<h1>Welcome!<h1>

<br>
<form action="uploadimage.php" method="POST" enctype="multipart/form-data">
   <input type="file" name="file">
   <button type="submit" name="submit">Upload Profile Image</button>
   </form>

<?php require __DIR__.'/createposts.php'; ?>
