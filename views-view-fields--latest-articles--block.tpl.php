<?php if($fields['title']->content): ?>
  <?php print $fields['title']->content; ?>
<?php endif ?>
<?php if($fields['comment_count']->content): ?>
  <span class="count-number"><?php print $fields['comment_count']->content; ?></span>
<?php endif ?>
<?php if($fields['field_name_value']->content): ?>
  &nbsp;&nbsp;-&nbsp;&nbsp;<span class='sdp-pengirim'><?php print $fields['field_name_value']->content; ?></span>
<?php endif ?>
<?php if($fields['field_penulis_nid']->content): ?>
  &nbsp;&nbsp;-&nbsp;&nbsp;<span class='sdp-pengirim'><?php print $fields['field_penulis_nid']->content; ?></span>
<?php endif ?>

