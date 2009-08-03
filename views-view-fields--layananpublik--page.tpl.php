<div class='row-container'>
  <p class='row-info'>
    <?php if($fields['name']->content): ?>
      <span class='row-term'>
        <?php print $fields['name']->content; ?>
      </span>
    <?php endif ?>
  </p>
  <h2 class='row-title'>
    <?php print $fields['title']->content; ?>      
  </h2>
  <div class='row-teaser'>
    <?php print $fields['teaser']->content; ?><div class='read-more'><?php print $fields['view_node']->content; ?></div>
  </div>
</div>


