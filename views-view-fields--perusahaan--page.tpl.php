<div class='row-container'>
  <div class='row-thumb'>
    <?php print $fields['field_main_image_fid']->content; ?>    
  </div>
  <?php if($fields['name']->content || $fields['field_city_value']->content): ?>
    <p class='row-info'>
      <span class='row-term'>
        <?php print $fields['name']->content; ?>
      </span>
      <?php if($fields['name']->content && $fields['field_city_value']->content): ?>
        &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
      <?php endif ?>
      <span class='row-city'>
        <?php print $fields['field_city_value']->content; ?>
      </span>
    </p>
  <?php endif ?>
  <?php if($fields['title']->content): ?>
    <h2 class='row-title'>
      <?php print $fields['title']->content; ?>      
    </h2>
  <?php endif ?>
  <?php if($fields['teaser']->content): ?>
  <div class='row-teaser'>
    <?php print $fields['teaser']->content; ?>
    <div class='read-more'>
      <?php print $fields['view_node']->content; ?>
    </div>
  </div>
  <?php endif ?>
</div>
