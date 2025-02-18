<?php

namespace App\Repository;

use App\Entity\Comment;
use App\Db\Mysql;
use App\Tools\StringTools;

class CommentRepository extends Repository
{
  public function findAllByArticleId(int $article_id)
  {
    $query = $this->pdo->prepare("SELECT * FROM comment");
    $query->execute();
    $comments = $query->fetchAll($this->pdo::FETCH_ASSOC);
    $commentsObjects = [];
    foreach($comments as $comment) {
      $commentsObjects[] = Comment::createAndHydrate($comment);;
    }
    return $commentsObjects;
  }
}