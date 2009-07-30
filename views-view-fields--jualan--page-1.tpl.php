<div class='row-date'>
<?php 
  if ($fields['field_status_value']->content) {
    print $fields['created']->content;
  } else {
    print 'CLOSED';    
  }
?>
</div>
<div class='row-container'>
  <div class='row-thumb'>
    <?php print $fields['field_main_image_fid']->content; ?>    
  </div>
  <p class='row-info'>
    <?php if($fields['name']->content): ?>
      <span class='row-term'>
        <?php print $fields['name']->content; ?>
      </span>
    <?php endif ?>
  </p>
  <h3 class='row-title'>
    <?php print $fields['title']->content; ?>      
  </h3>
  <div class='row-teaser'>
    <?php print $fields['teaser']->content; ?><div class='read-more'><?php print $fields['view_node']->content; ?></div>
  </div>
</div>

