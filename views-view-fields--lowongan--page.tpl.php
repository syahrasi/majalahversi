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
  <h3 class='row-title'>
    <?php print $fields['title']->content; ?>
  </h3>
  <p>
    <span class='row-company'><?php print $fields['field_company_value']->content; ?></span>,&nbsp;
    <span class='row-term'><?php print $fields['name']->content; ?></span>,&nbsp;
    <span class='row-city'><?php print $fields['field_city_value']->content; ?></span>
  </p>
</div>

