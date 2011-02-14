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
<?php endif ?><br />
<?php print $fields['title']->content; ?>

