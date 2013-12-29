<?php
/**
 * Contact List Module Entry Point
 */ 

// no direct access
defined('_JEXEC') or die; ?>

<div class="calameo<?php echo $moduleclass_sfx; ?>">
    <p>
    <?php foreach ($publications as $item) :?>
    <a href="<?php echo $item['url']; ?>"><img alt="<?php echo $params->get('publications_name'); ?>" src="<?php echo $item['img']; ?>" /></a>
    <a class="btn" target="_blank" href="<?php echo $item['url']; ?>"><em class="icon-white icon-chevron-right"></em><?php echo $params->get('publication_readmore'); ?></a>
    <?php endforeach; ?>
    </p>
</div>
