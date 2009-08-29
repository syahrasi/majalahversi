
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>
<?php if ($authors): ?>
  <p class="node-submit-info">
  <?php if ($authors): ?>
    Oleh:&nbsp;<?php print $authors ?>
  <?php endif; ?>
  <?php if ($terms): ?>
    <span class="terms"><?php print $terms ?></span>
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
      <div id="embedded-views">
      <h3><?php print $kontribusi ?> oleh <?php print $title ?></h3>
      <?php
        $viewname = 'penulis';
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


