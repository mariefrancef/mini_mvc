<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Entity\Article;

class ArticleController extends Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'list':
            $this->list();
            break;
          case 'show':
            $this->show();
            break;
          default:
            throw new \Exception("Cette action n'existe pas : ".$_GET['action']);
            break;
          }
        } else {
          throw new \Exception("Aucune action détectée");
        }
    } catch(\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  protected function list()
  {
    $articleRepository = new ArticleRepository;
    $articles = $articleRepository->findAll();

    //var_dump($articles);
    $this->render('article/list', [
      'articles' => $articles
    ]);
  }

  protected function show(){
    if (isset($_GET['id'])) {
    $articleRepository = new ArticleRepository;
    $id = (int)$_GET['id'];
    $article = $articleRepository->findOneById($id);
    //var_dump($article);
    $this->render('article/show', [
      'article' => $article
    ]);
    }
  }
}