<div class='row-date'>
<?php
  if ($fields['field_status_value']->content == "OPEN") {
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
  <?php if($fields['tid']->content || $fields['field_city_value']->content): ?>
    <p class='row-info'>
      <?php if($fields['tid']->content): ?>
        <span class='row-term'>
          <?php print $fields['tid']->content; ?>
        </span>
      <?php endif ?>
      <?php if($fields['tid']->content && $fields['field_city_value']->content): ?>
        &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
      <?php endif ?>
      <?php if($fields['field_city_value']->content): ?>
        <span class='row-city'>
          <?php print $fields['field_city_value']->content; ?>
        </span>
      <?php endif ?>
    </p>
  <?php endif ?>
  <h3 class='row-title'>
    <?php print $fields['title']->content; ?>
  </h3>
  <div class='row-teaser'>
    <?php print $fields['teaser']->content; ?><div class='read-more'><?php print $fields['view_node']->content; ?></div>
  </div>
</div>

