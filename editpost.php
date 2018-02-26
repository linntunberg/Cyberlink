<?php declare(strict_types=1);
require __DIR__.'/views/header.php';

if(isset($_GET['id'])) {
    $postID =  filter_var($_GET['id'], FILTER_SANITIZE_STRING);
}

$statement = $pdo->prepare('SELECT * FROM posts WHERE postID = :postid');
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
$statement->bindParam(':postid', $_GET['id']); //user id is same as id, connects them.
$statement->execute();

$post = $statement->fetch(PDO::FETCH_ASSOC);


?>


<h1>Edit Post</h1>

<form action="/app/posts/update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="postID" value="<?php echo $postID; ?> ">


    <div class="form">
<strong>Title: </strong> <input type="text" name="title" value="<?php echo $post['title']?>" required><br>
<br><button type="submit">Update</button>
</div>



    <div class="form">
<strong>Link: </strong> <input type="text" name="link" value="<?php echo $post['link']?>" required><br>
<br><button type="submit">Update</button>
</div>



    <div class="form">
<strong>Description: </strong><br>
<textarea rows="4" cols="50" name="description" placeholder="Write something here!"><?php
 echo $post['description']; ?></textarea>
<br><button type="submit">Update</button>
</div>
</form>
<!--
<form method="POST" action="/app/back/editprofile.php"><br>
    <div class="form">
<strong>Old password: </strong> <input type="password" name="oldpassword" required><br>
<strong>New password: </strong> <input type="password" name="newpassword" required><br>
<strong>New password: </strong> <input type="password" name="repeatpassword" required><br>
<br><button type="submit">Confirm</button>

</div>
</form>

<form method="POST" action="/app/back/editprofile.php"><br>
    <div class="form">
<strong>Change bio: </strong> <input type="text" name="biography" value="" required><br>
<br><button type="submit">Confirm</button>
</div>
</form> -->
