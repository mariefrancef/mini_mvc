<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<?php foreach ($articles as $article) : ?>
  <div class="card">
    <div class="card-body">
      <h3 class="card-title
      ">
        <?= $article->getTitle() ?>
      </h3>
      <a href="index.php?controller=article&action=show&id=<?= $article->getId() ?>" class="btn btn-primary">Lire plus</a>
    </div>
  </div>
<?php endforeach; ?>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>