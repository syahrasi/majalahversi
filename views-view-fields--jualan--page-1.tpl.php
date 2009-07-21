<div class='row-container'>
  <div class='row-thumb'>
    <?php print $fields['field_main_image_fid']->content; ?>    
  </div>
  <h3 class='row-title'>
    <?php print $fields['title']->content; ?>      
  </h3>
  <p>
    <span class='row-term'><?php print $fields['name']->content; ?></span>,&nbsp;&nbsp;
    <?php print $fields['teaser']->content; ?>
  </p>
</div>
<div class='row-date'>
    <?php  print $fields['created']->content; ?>
</div>
