<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

?>

<div class='row-container'>
  <?php if($fields['field_main_image_fid']->content): ?>
      <div class='row-thumb'>
      <?php print $fields['field_main_image_fid']->content; ?>
    </div>
  <?php endif ?>
  <div class='row-textgroup'>
  <?php if($fields['field_penulis_nid']->content || $fields['created']->content): ?>
    <p class='row-info'>
      <span class='row-author'><?php print $fields['field_penulis_nid']->content; ?></span>
      <?php if($fields['field_penulis_nid']->content && $fields['created']->content): ?>
      &nbsp;&bull;&nbsp;
      <?php endif ?>
      <?php if($fields['created']->content): ?>
          <span class='row-date'><?php print $fields['created']->content; ?></span>
      <?php endif ?>
      <?php if($fields['comment_count']->content): ?>
          <span class='row-comment-count'><?php print $fields['comment_count']->content; ?></span>
      <?php endif ?>
    </p>
  <?php endif ?>
  <?php if($fields['title']->content): ?>
    <h4 class='row-title'>
      <?php print $fields['title']->content; ?>
    </h4>
  <?php endif ?>
  <?php if($fields['teaser']->content || $fields['body']->content): ?>
    <div class='row-teaser'>
      <?php print $fields['teaser']->content; ?>
      <?php print $fields['body']->content; ?>
      <?php if($fields['view_node']->content): ?>
        <div class='read-more'><?php print $fields['view_node']->content; ?></div>
      <?php endif ?>
    </div>
  <?php endif ?>
  </div>
</div>

