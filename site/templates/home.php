<?php snippet('header') ?>


  <main class="main" role="main">
  	<div class="home">
	    <div class="intro">
	    	<div class="container"> 
	    		<?php echo $page->imagelink()->kirbytext() ?>
				<?php echo $page->text()->kirbytext() ?>
			</div>
	    </div>

	    <div class="container">

		<h1><?php echo $page->subtitle()->html() ?></h1>


		<?php $articles = $page->children()->visible()->flip()->paginate($page->articleperpage()->html()->int()) ?>
			
	      <?php foreach($articles as $article): ?>

		  <article class="article">
		    <a href="<?php echo $article->url() ?>"><?php echo $article->imagelink()->kirbytext() ?></a>
		    <h1><a href="<?php echo $article->url() ?>"><?php echo $article->title()->html() ?></a></h1>
		    <a href="<?php echo $article->url() ?>">Lees meer</a>
		    <div class="subInfo">
			    <span>Door: <?php echo $article->author()->kirbytext() ?></span>
			    <span><?php echo $article->articledate()->kirbytext() ?></span>
		    </div>
		  </article>

		  <?php endforeach ?>


		<?php if($articles->pagination()->hasPages()): ?>
		<nav class="pagination">

		  <?php if($articles->pagination()->hasPrevPage()): ?>
		  <a class="next" href="<?php echo $articles->pagination()->prevPageURL() ?>">&lsaquo; Nieuwe posts</a>
		  <?php endif ?>

		  <?php if($articles->pagination()->hasNextPage()): ?>
		  <a class="prev" href="<?php echo $articles->pagination()->nextPageURL() ?>">Oude posts &rsaquo;</a>
		  <?php endif ?>

		</nav>
		<?php endif ?>

	      <?php snippet('partena') ?>
	    </div>
    </div>
  </main>

<?php snippet('footer') ?>