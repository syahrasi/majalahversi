<div class='row-container'>
  <?php if($fields['tid']->content): ?>
    <span class='row-term'>
      <?php print $fields['tid']->content; ?>
    </span>
  <?php endif ?>
  <div class='row-image'>
    <?php print $fields['field_main_image_fid']->content; ?>    
  </div>
  <div class='row-galeri-info'>
    <div class='row-title'><?php print $fields['title']->content; ?></div>
    <div class='row-rating'><?php print $fields['value']->content; ?></div>
    <div class='row-comment-count'><?php print $fields['comment_count']->content; ?></div>
  </div>
</div>

