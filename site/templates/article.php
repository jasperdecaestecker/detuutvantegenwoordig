<?php snippet('header') ?>

   <main class="main" role="main">

    <section class="content">
  <article class="container">
    <h1><?php echo $page->title()->html() ?></h1>
    <div class="subInfo">
    	<hr>
	    <span>Door: <?php echo $page->author()->kirbytext() ?></span>
	    <span><?php echo $page->articledate()->kirbytext() ?></span>
      <div class="shareLinks">

      <a href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->url()); ?>%20<?php echo ('via @detuutbe')?>" target="blank" title="Tweet this"><i class="fa fa-twitter"></i> Tweet</a>
      <a href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook"><i class="fa fa-facebook"></i> Deel op facebook</a>
      </div>
    </div>

    <!-- echo date('dd/mm/YYYY', strtotime($page->date()->kirbytext()));/*$page->date('c'); -->
    <span class="intro"><?php echo $page->intro()->kirbytext() ?></span>
    <?php echo $page->text()->kirbytext() ?>
    <a class="backLink" href="<?php echo url('../') ?>">Terug...</a>

    <?php snippet('disqus', array('disqus_shortname' => 'tuutvantegenwoordig', 'disqus_developer' => false)) ?>


  </article>
</section>


  </main>

<?php snippet('footer') ?>