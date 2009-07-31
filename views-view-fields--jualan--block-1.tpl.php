<?php if($fields['name']->content): ?>
  <span class='row-term'>
    <?php print $fields['name']->content; ?>
  </span>
<?php endif ?>
<?php if($fields['field_city_value']->content): ?>
  ,
  <span class='row-city'>
    <?php print $fields['field_city_value']->content; ?>
  </span>
<?php endif ?><br />
<?php print $fields['title']->content; ?>

