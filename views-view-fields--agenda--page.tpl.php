<div class='row-container'>
  <div class='row-thumb'>
    <?php print $fields['field_main_image_fid']->content; ?>    
  </div>
  <p class='row-info'>
    <?php if($fields['tid']->content): ?>
      <span class='row-term'>
        <?php print $fields['tid']->content; ?>
      </span>
    <?php endif ?>
    <span class='row-date'><?php print $fields['created']->content; ?></span>
  </p>
  <h3 class='row-title'>
    <?php print $fields['title']->content; ?>      
  </h3>
  <span class='row-date'><?php print $fields['field_date_value']->content; ?></span>,&nbsp;&nbsp;
  <span class='row-location'><?php print $fields['field_location_value']->content; ?></span>,&nbsp;&nbsp;
  <span class='row-city'><?php print $fields['field_city_value']->content; ?></span>
  <div class='row-teaser'>
    <?php print $fields['teaser']->content; ?><div class='read-more'><?php print $fields['view_node']->content; ?></div>
  </div>
</div>
