<?php snippet('header') ?>



  <main class="main" role="main">
  	<div class="oordoppen">
	    <div class="intro">
	      <h1><?php echo $page->title()->html() ?></h1>
	      <?php echo $page->text()->kirbytext() ?>
	    </div>

	    <div class="container-oordoppen">
	    <?php foreach($page->children() as $article): ?>
			<article>
				<div class="container">
				<?php echo $article->imagelink()->kirbytext() ?>
				<div class="content">
				<h1><?php echo $article->title()->html() ?></h1>
				<div class="price"><?php echo $article->price()->kirbytext()?></div>
				<?php echo $article->text()->kirbytext() ?>
				<hr>
				<span class="advantages">
				<?php echo $article->advantages()->kirbytext() ?>
				</span>
				<span class="disadvantages">
				<?php echo $article->disadvantages()->kirbytext() ?>
				</span>
				<span class="partners">
					<?php if($article->partners()->length() > 0): ?>
					<a href="" class="where">Waar te koop?</a>
					<span class="partners_images">
					<?php echo $article->partners()->kirbytext() ?>
					</span>
					<?php endif ?>
				</span>
				</div>
				</div>
			</article>
  		<?php endforeach ?>
  		</div>
    </div>
  </main>

<?php snippet('footer') ?>