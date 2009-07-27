
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

<?php if ($page == 0): ?>
  <?php if ($terms): ?>
    <span class="categories"><?php print $terms ?></span>
  <?php endif; ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>
<?php if ($authors || $date): ?>
  <p class="node-submit-info">
  <?php if ($authors): ?>
    Ditulis oleh:&nbsp;<?php print $authors ?>
  <?php endif; ?>
  <?php if ($date): ?>
    <span class="post-date"><?php print $date ?></span>
  <?php endif; ?>
  </p>
<?php endif; ?>

<?php if ($submitted): ?>
  <div class="meta">
  <?php if ($submitted): ?>
    <div class="submitted"><?php print $submitted ?></div>
  <?php endif; ?>
  </div>
<?php endif; ?>

  <div class="content clear-block">
    <?php print $picture ?>
    <?php print $content ?>
    <?php if ($tags): ?>
      <span class="tags"><?php print $tags ?></span>
    <?php endif; ?>
  </div>
<?php } ?>

</div>
<?php
  if ($links) {
    print '<div class="node-links">'. $links .'</div>';
  }
?>


