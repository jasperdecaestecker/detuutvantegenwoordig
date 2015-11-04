<nav role="navigation">
  
  <ul class="menu">
    <?php foreach($pages->visible() as $p): ?>
       
    <li>
      <a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
    </li>
    <?php endforeach ?>

    <?php

      $items = false;

      if($root = $pages->findOpen()) {
        $items = $root->children()->visible();
      }
      
      $currentPageTitle = $page->title()->text();
      if($items && $items->count() > 0):

    ?>
    <?php if($currentPageTitle != 'Home' && $root->title()->text() != 'Home'): ?>
      <nav>
        <ul class="submenu">
          <?php foreach($items as $item): ?>
          <?php if($item->labelnavigation() != '')
          {
            $labelNavigation = $item->labelnavigation();
          }
          else{
            $labelNavigation = $item->title();
          }
            ?>  
        
          <li><a<?php ecco($item->isOpen(), ' class="active"') ?> href="<?php echo $item->url() ?>"><?php echo html($labelNavigation) ?></a></li>
          <?php endforeach ?>
           <div class="uuu"></div>
        </ul>
      </nav>
          <?php endif ?>
    <?php endif ?>
  </ul>

</nav>







