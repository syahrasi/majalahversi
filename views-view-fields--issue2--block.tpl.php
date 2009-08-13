<div class='row-container'>
  <div class='row-thumb'>
    <?php print $fields['field_main_image_fid']->content; ?>    
  </div>
  <div class='row-textgroup'>
    <h4 class='row-title'>
      <?php print $fields['title']->content; ?>      
    </h4>
    <p class='row-info'>
      <span class='row-author'><?php print $fields['field_job_value']->content; ?></span>
    </p>
    <div class='row-teaser'>
      <?php print $fields['body']->content; ?>
    </div>
  </div>
</div>
