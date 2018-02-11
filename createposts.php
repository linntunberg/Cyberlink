<?php declare(strict_types=1); ?>

<h1>Post a link</h1>

<form method="POST" action="/app/posts/store.php"><br>
    <strong>Title: </strong> <input type="text" name="title" placeholder="Enter title" id="title" required><br>
    <br><strong>Link: </strong> <input type="text"  name="link" placeholder="Enter link" id="link" required><br>
    <br><strong>Description: </strong> <input type="text"  name="description" placeholder="Enter description" id="description" required><br>


    <br><button type="submit" id="createlink">Create link</button>
    </form>

    <?php require __DIR__.'/views/footer.php'; ?>
