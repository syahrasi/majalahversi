
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">
<?php if(drupal_is_front_page() && $node->type == "artikel" && is_flagged) {
  $node = node_load($node->nid);
  $teaser = check_markup($node->teaser, $node->format, FALSE);
  $file = $node->field_main_image;
  $img = theme('imagecache', 'main_image_featured', $file[0]['filepath'], $alt, $title, $attributes);
  print "<a href='" . $node->path . "'>" . $img . "</a>";
  print "<h2><a href='" . $node->path . "'>" . $node->title . "</a></h2>";
  print $teaser;
  } else { ?>

<?php if ($date || $authors): ?>
  <div class="node-submit-info">
  <?php if ($authors): ?>
    <?php print $authors ?>
  <?php endif; ?>
  <?php if($authors && $date): ?>
    &nbsp;&nbsp;&bull;&nbsp;&nbsp;
  <?php endif ?>
  <?php if ($date): ?>
    <span class="post-date"><?php print $date ?></span>
  <?php endif; ?>
  <?php if($date && $terms): ?>
    &nbsp;&nbsp;&bull;&nbsp;&nbsp;
  <?php endif ?>
  <?php if ($terms): ?>
    <?php print $terms ?>
  <?php endif; ?>
  </div>
<?php endif; ?>
<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php else: ?>
  <h2 class="node-title"><?php print $title ?></h2>
<?php endif; ?>
<?php if($node->field_subtitle): ?>
  <h4 class='subtitle'><?php print $node->field_subtitle[0]['safe'];  ?></h4>
<?php endif ?>
<?php if ($submitted): ?>
  <div class="meta">
  <?php if ($submitted): ?>
    <div class="submitted"><?php print $submitted ?></div>
  <?php endif; ?>
  </div>
<?php endif; ?>

  <div class="content clear-block">
    <?php print $picture ?>
    <?php if ($style_teaser_differently): ?>
      <div class="node-summary"><?php print $teaser; ?></div>
    <?php endif; ?>
    <?php print $content ?>
    <?php if ($tags): ?>
      <span class="tags"><?php print $tags ?></span>
    <?php endif; ?>
    <?php $block = module_invoke('views' ,'block', 'view', 'related_by_tags-block_1'); ?>
      <?php if($block): ?>
      <div id="embedded-views">
        <h3>Konten Terkait</h3>
        <?php print $block['content']; ?>
      </div>
      <?php endif ?>
  </div>
<?php } ?>

</div>
<?php
  if ($links) {
    print '<div class="node-links">'. $links .'</div>';
  }
?>

