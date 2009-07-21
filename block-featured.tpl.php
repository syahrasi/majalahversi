<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="<?php print $classes; ?>">

<?php if ($block->subject): ?>
  <div class="block-title-wrapper"><h2><?php print $block->subject ?></h2></div>
<?php endif;?>

  <div class="content"><?php print $block->content ?></div>
  <?php print $edit_links; ?>

</div>
