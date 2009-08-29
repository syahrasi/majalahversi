<?php if($fields['title']->content): ?>
  <?php print $fields['title']->content; ?>
<?php endif ?>
<?php if($fields['comment_count']->content): ?>
  <span class="count-number"><?php print $fields['comment_count']->content; ?></span>
<?php endif ?>
<?php if($fields['totalcount']->content): ?>
  <span class="count-number"><?php print $fields['totalcount']->content; ?></span>
<?php endif ?>

