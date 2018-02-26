<?php declare(strict_types=1);

require __DIR__.'/app/autoload.php';

// die(var_dump($_POST));

if (isset($_POST['postId'])) {

 $postId = (int)$_POST['postId'];
 $vote = (int)$_POST['voteDir'];
 $userId = (int)$_POST['userId'];
}


$statement = $pdo->prepare('SELECT COUNT(*) FROM votes WHERE userID = :userId AND postID = :postId');
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
    }
  $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
  $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
  $statement->execute();
  $voteOnPostInDbCount = $statement->fetch(PDO::FETCH_ASSOC);

  // die(var_dump($getVotesOnPost));

  $voteExists = (int)$voteOnPostInDbCount['COUNT(*)'];

  // die(var_dump($votesOnPost));

  if ($voteExists === 0) {

    $statement = $pdo->prepare("INSERT INTO votes(userID, postID, vote) VALUES (:userId, :postId, :vote)");
    if (!$statement) {
      die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
    $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
    $statement->bindParam(':vote', $vote, PDO::PARAM_INT);
    $statement->execute();

    } else {

    $statement = $pdo->prepare('SELECT * FROM votes WHERE userID = :userId AND postID = :postId');
    if (!$statement) {
      die(var_dump($pdo->errorInfo()));
      }
    $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
    $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
    $statement->execute();
    $voteOnPostInDB = $statement->fetch(PDO::FETCH_ASSOC);

    $voteOnPost = (int)$voteOnPostInDB['vote'];

    if ($voteOnPost === $vote){

      $vote = 0;

      $statement = $pdo->prepare('UPDATE votes SET vote = :vote WHERE postID = :postId AND userID = :userId');
      $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
      $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
      $statement->bindParam(':vote', $vote, PDO::PARAM_INT);
      $statement->execute();

    } else {

      $statement = $pdo->prepare('UPDATE votes SET vote = :vote WHERE postID = :postId AND userID = :userId');
      $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
      $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
      $statement->bindParam(':vote', $vote, PDO::PARAM_INT);
      $statement->execute();
    }

  }

  $statement = $pdo->prepare('SELECT sum(vote) FROM votes WHERE postID = :postId');
  $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
  $statement->execute();

  $votesOnPost = $statement->fetch(PDO::FETCH_ASSOC);

  echo json_encode($votesOnPost);
