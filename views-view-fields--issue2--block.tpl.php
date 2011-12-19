<div class='row-container'>
  <?php if($fields['field_main_image_fid']->content): ?>
  <div class='row-thumb'>
    <?php print $fields['field_main_image_fid']->content; ?>
  </div>
  <?php endif ?>
  <div class='row-textgroup'>
  <?php if($fields['title_1']->content): ?>
    <h4 class='row-title'>
      Tema:&nbsp;&nbsp;<?php print $fields['title_1']->content; ?>
    </h4>
  <?php endif ?>
  <?php if($fields['title']->content): ?>
    <h4 class='row-title'>
      <?php print $fields['title']->content; ?>
    </h4>
  <?php endif ?>
  <?php if($fields['field_job_value']->content): ?>
    <p class='row-info'>
      <span class='row-author'><?php print $fields['field_job_value']->content; ?></span>
    </p>
  <?php endif ?>
  <?php if($fields['body']->content): ?>
    <div class='row-teaser'>
      <?php print $fields['body']->content; ?>
    </div>
  <?php endif ?>
  </div>
</div>
