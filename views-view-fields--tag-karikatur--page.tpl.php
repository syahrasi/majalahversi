<div class='row-container'>
  <?php if($fields['tid']->content): ?>
    <div class='row-term'>
      <?php print $fields['tid']->content; ?>    
    </div>
  <?php endif ?>  
  <?php if($fields['field_main_image_fid']->content): ?>
    <div class='row-image'>
      <?php print $fields['field_main_image_fid']->content; ?>    
    </div>
  <?php endif ?>
  <?php if($fields['title']->content): ?>
    <div class='row-galeri-info'>
    <div class='row-title'><?php print $fields['title']->content; ?></div>
    <div class='row-comment-count'><?php print $fields['comment_count']->content; ?></div>
      <?php if($fields['value']->content): ?>
          <div class='row-rating'><?php print $fields['value']->content; ?></div>
      <?php endif ?>
    </div>  
  <?php endif ?>
</div>
