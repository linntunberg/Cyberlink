<?php declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}


function getPostsAllWithUserIdSortByDate($pdo, $userId) {

$postsStatement = $pdo->prepare("SELECT posts.*, users.*, votes.*, (SELECT sum(vote) FROM votes WHERE posts.postID = votes.postID) AS sum, (SELECT sum(vote) FROM votes WHERE votes.userID = :userId AND votes.postID = posts.postID) AS userVote, (SELECT count() FROM votes WHERE votes.postID = posts.postID) AS voteCount FROM posts JOIN votes ON posts.postID=votes.postID JOIN users ON posts.userID = users.userID GROUP BY posts.postID ORDER BY timeOfSub DESC");
  if (!$postsStatement) {
    die(var_dump($pdo->errorInfo()));
    }
  $postsStatement->bindParam(':userId', $userId, PDO::PARAM_STR);
  $postsStatement->execute();
  return $postsStatement->fetchAll(PDO::FETCH_ASSOC);

}





function getPostsAllSortByDate($pdo) {

  $postsStatement = $pdo->prepare("SELECT posts.*, users.*, votes.*, (SELECT sum(vote) FROM votes WHERE posts.postID = votes.postID) AS sum, (SELECT count() FROM votes WHERE votes.postID = posts.postID) AS voteCount FROM posts JOIN votes ON posts.postID=votes.postID JOIN users ON posts.userID = users.userID GROUP BY posts.postID ORDER BY timeOfSub DESC");
  if (!$postsStatement) {
    die(var_dump($pdo->errorInfo()));
    }
  $postsStatement->execute();
  return $postsStatement->fetchAll(PDO::FETCH_ASSOC);

}
