<div class='row-container'>
  <div class='row-thumb'>
    <?php print $fields['field_main_image_fid']->content; ?>    
  </div>
  <p class='row-info'>
    <span class='row-term'><?php print $fields['name']->content; ?></span>
      <h3 class='row-title'>
        <?php print $fields['title']->content; ?>      
      </h3>
    <span class='row-city'><?php print $fields['field_city_value']->content; ?></span>
    <?php print $fields['teaser']->content; ?>
  </p>
</div>
