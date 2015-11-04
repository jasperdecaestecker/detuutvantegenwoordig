<?php snippet('header') ?>

<main class="main" role="main">
	<div class="container">
		<div class="text">
			<span class="intro">
		  		<h1><?php echo $page->title()->html() ?></h1>
		  		<?php echo $page->intro()->kirbytext() ?>
		  	</span>

		    <div class="container">
			    <?php echo $page->text()->kirbytext() ?>		
			</div>

		</div>
	</div>
</main>

<?php snippet('footer') ?>