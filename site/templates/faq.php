<?php snippet('header') ?>

  <main class="main" role="main">
  	<div class="faq">
	    <div class="intro">
	      <h1><?php echo $page->title()->html() ?></h1>
	    </div>

	    <div class="container-faq container">
	      	<?php $ct = 1; ?>
		    <ul>
		    <?php foreach($page->children() as $faq): ?>
				<li>
				<?php echo ($ct . '. ' . $faq->title()->html()->link()) ?>
				<i class="fa fa-chevron-down"></i>
				</li>
				<span class='answer'><?php echo $faq->answer()->kirbytext() ?></span>
				<?php $ct++ ?>
	  		<?php endforeach ?>
	  		</ul>
  		</div>
    </div>
  </main>

<?php snippet('footer') ?>