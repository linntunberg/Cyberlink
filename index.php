<?php declare(strict_types=1); ?>
<?php require __DIR__.'/views/header.php'; ?>

<article>
<?php
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true): ?>
<?php $userId = $_SESSION['user']; ?>


<?php $posts = getPostsAllWithUserIdSortByDate($pdo, $userId)
?>

<h1><?php echo "Welcome to Cyberlink ".$_SESSION['username']."!"; ?></h1>

<?php else: ?>

    <?php $posts = getPostsAllSortByDate($pdo);
    $userId = "nouserloggedin";
    ?>


    <h1>Welcome to Cyberlink!</h1>
<?php endif ?>
<?php


foreach($posts as $post) {

    ?><ul data-post-id="<?php echo $post['postID']?>">
        <li>Title: <?php echo $post['title']?></li>
        <li>Link: <a href="<?php echo $post['link']?>"><?php echo $post['link']?></a></li>
        <li>Description: <?php echo $post['description']?></li>
        <button class="up" type="button" data-post-id="<?php echo $post['postID']?>" data-user-id="<?php echo $userId?>" data-vote-dir="1" >Upvote</button>
        <button class="down" type="button" data-post-id="<?php echo $post['postID']?>" data-user-id="<?php echo $userId?>" data-vote-dir="-1">Downvote</button>
        <div data-vote-display-id="<?php echo $post['postID']?>"><?php echo $post['sum']?></div>
    </ul>
<?php
}
?>

<script>
    'use strict';

    const voteLinks = document.querySelectorAll('.up, .down');

        voteLinks.forEach(function(link) {
            link.addEventListener('click', vote);
        });

function vote(event) {
    const postId = event.target.dataset.postId;
    const voteDir = event.target.dataset.voteDir;
    const userId = event.target.dataset.userId;

    if (userId !== "nouserloggedin"){

   const data = `postId=${postId}&voteDir=${voteDir}&userId=${userId}`;
   const url = "vote.php";

   fetch(url, {
               method: 'POST',
               headers: new Headers({"Content-Type": "application/x-www-form-urlencoded"}),
               body: data
           })

           .then((res) => res.json())
           .then((data) =>  {

             const display = document.querySelector(`[data-vote-display-id="${postId}"]`);
             const liked = document.querySelector(`[data-liked="${postId}"]`);
             const unliked = document.querySelector(`[data-unliked="${postId}"]`);

             display.innerText = data['sum(vote)'];

           })
           .catch(console.error)

         } else {

           if (confirm('You have to be logged in to participate in the voting. Press OK if you want to proceed to the login page where you can also sign up for a free account if you have not already!')) {
             window.location.href = "login.php";
             } else {
               // Do nothing!
             }

           }
         }



</script>
