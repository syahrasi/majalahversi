<div class='row-container'>
  <div class='row-term'>
    <?php print $fields['name']->content; ?>    
  </div>
  <div class='row-image'>
    <?php print $fields['field_main_image_fid']->content; ?>    
  </div>
  <div class='row-galeri-info'>
    <p><?php print $fields['title']->content; ?></p>
    <div class='row-comment-count'><?php print $fields['comment_count']->content; ?></div>
    <div class='row-rating'><?php print $fields['value']->content; ?></div>
  </div>
</div>

