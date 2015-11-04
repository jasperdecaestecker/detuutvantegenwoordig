<?php snippet('header') ?>

<?php go('tips/oren-beschermen') ?>

  <main class="main" role="main">
  	  <div class="container">
    <div class="text">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </div>
    </div>
  </main>

<?php snippet('footer') ?>