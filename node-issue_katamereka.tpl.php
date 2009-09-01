
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>
<?php if ($date || $authors): ?>
  <div class="node-submit-info">
  <?php if ($authors): ?>
    <?php print $authors ?>
  <?php endif; ?>
  <?php if ($date): ?>
    <span class="post-date"><?php print $date ?></span>
  <?php endif; ?>
  <?php if ($terms): ?>
    <?php print $terms ?>
  <?php endif; ?>
  </div>
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
    <?php if ($style_teaser_differently): ?>
      <div class="node-summary"><?php print $teaser; ?></div>
    <?php endif; ?>
    <?php print $content ?>
      <div id="embedded-views">
        <?php
        $viewname = 'Issue';
        $display_id = 'block_2';
        $arg1 = $node->nid;
        print views_embed_view($viewname, $display_id, $arg1);
        ?>
      </div>
    <?php if ($tags): ?>
      <span class="tags"><?php print $tags ?></span>
    <?php endif; ?>
  </div>
</div>
<?php
  if ($links) {
    print '<div class="node-links">'. $links .'</div>';
  }
?>


