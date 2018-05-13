<?php

    $page = getPage($_GET['id'],$pages); 
?>

<h1><?php echo $page->name ?></h1>
<div>
    <?php if (!empty($page->description)) :?>
        <?php echo $page->description; ?>
    <?php else: ?>
        <div>Страница наполняется</div>
    <?php endif;?>
</div>
