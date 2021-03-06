<?php
// $Id: template.php,v 1.15.2.1.2.15 2008/12/23 03:40:02 designerbrent Exp $

/**
 * Uncomment the following line during development to automatically
 * flush the theme cache when you load the page. That way it will
 * always look for new tpl files.
 */
//drupal_flush_all_caches();

/**
 * Intercept page template variables
 *
 * @param $vars
 *   A sequential array of variables passed to the theme function.
 */
/*
function majalahversi_preprocess_search_theme_form(&$vars, $hook) {

  // Modify elements of the search form
  $vars['form']['search_theme_form']['#title'] = t('');

  // Set a default value for the search box
  $vars['form']['search_theme_form']['#value'] = t('Search');

  // Add a custom class to the search box
  $vars['form']['search_theme_form']['#attributes'] = array('class' => t('cleardefault'));

  $vars['form']['search_theme_form']['#size'] = 35;

  // Change the text on the submit button
  $vars['form']['submit']['#value'] = t('Go');

  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($vars['form']['search_theme_form']['#printed']);
  $vars['search']['search_theme_form'] = drupal_render($vars['form']['search_theme_form']);

  // Rebuild the rendered version (submit button, rest remains unchanged)
  unset($vars['form']['submit']['#printed']);
  $vars['search']['submit'] = drupal_render($vars['form']['submit']);

  // Collect all form elements to make it easier to print the whole form.
  $vars['search_form'] = implode($vars['search']);
}*/
function phptemplate_preprocess_page(&$vars) {
  global $user;
  $vars['path'] = base_path() . path_to_theme() .'/';
  $vars['user'] = $user;

  // Fixup the $head_title and $title vars to display better.
  $title = drupal_get_title();
  $headers = drupal_set_header();

  // wrap taxonomy listing pages in quotes and prefix with topic
  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    $title = t('Kategori') .' &#8220;'. $title .'&#8221;';
  }
  // if this is a 403 and they aren't logged in, tell them they need to log in
  else if (strpos($headers, 'HTTP/1.1 403 Forbidden') && !$user->uid) {
    $title = t('Please login to continue');
  }

  $vars['title'] = $title;

  if (!drupal_is_front_page()) {
    $vars['head_title'] = $title .' | '. $vars['site_name'];
    if ($vars['site_slogan'] != '') {
      $vars['head_title'] .= ' &ndash; '. $vars['site_slogan'];
    }
  }

  // determine layout
  // 3 columns
  if ($vars['layout'] == 'both') {
    $vars['left_classes'] = 'col-left span-4';
    $vars['right_classes'] = 'col-right span-8 last';
    $vars['center_classes'] = 'col-center span-12';
    $vars['body_classes'] .= ' col-3 ';
  }
  // 2 columns
  else if ($vars['layout'] != 'none') {
    // left column & center
    if ($vars['layout'] == 'left') {
      $vars['left_classes'] = 'col-left span-4';
      $vars['center_classes'] = 'col-center span-20 last';
    }
    // right column & center
    else if ($vars['layout'] == 'right') {
      $vars['right_classes'] = 'col-right span-8 last';
      $vars['center_classes'] = 'col-center span-16';
    }
    $vars['body_classes'] .= ' col-2 ';
  }
  // 1 column
  else {

    $vars['center_classes'] = 'col-center span-24';
    $vars['body_classes'] .= ' col-1 ';
  }

  $vars['meta'] = '';
  // SEO optimization, add in the node's teaser, or if on the homepage, the mission statement
  // as a description of the page that appears in search engines
  if ($vars['is_front'] && $vars['mission'] != '') {
    $vars['meta'] .= '<meta name="description" content="'. majalahversi_trim_text($vars['mission']) .'" />'."\n";
  }
  else if (isset($vars['node']->teaser) && $vars['node']->teaser != '') {
    $vars['meta'] .= '<meta name="description" content="'. majalahversi_trim_text($vars['node']->teaser) .'" />'."\n";
  }
  else if (isset($vars['node']->body) && $vars['node']->body != '') {
    $vars['meta'] .= '<meta name="description" content="'. majalahversi_trim_text($vars['node']->body) .'" />'."\n";
  }
  // SEO optimization, if the node has tags, use these as keywords for the page
  if (isset($vars['node']->taxonomy)) {
    $keywords = array();
    foreach ($vars['node']->taxonomy as $term) {
      $keywords[] = $term->name;
    }
    $vars['meta'] .= '<meta name="keywords" content="'. implode(',', $keywords) .'" />'."\n";
  }

  // SEO optimization, avoid duplicate titles in search indexes for pager pages
  if (isset($_GET['page']) || isset($_GET['sort'])) {
    $vars['meta'] .= '<meta name="robots" content="noindex,follow" />'. "\n";
  }

  /* I like to embed the Google search in various places, uncomment to make use of this
  // setup search for custom placement
  $search = module_invoke('google_cse', 'block', 'view', '0');
  $vars['search'] = $search['content'];
  */

  /* to remove specific CSS files from modules use this trick
  // Remove stylesheets
  $css = $vars['css'];
  unset($css['all']['module']['sites/all/modules/contrib/plus1/plus1.css']);
  $vars['styles'] = drupal_get_css($css);
  */
  if (module_exists('path')) {
    $path_alias = drupal_get_path_alias($_GET['q']);
    $base_path = base_path();
    $alias_parts = explode('/', $path_alias);
    $first_part = $alias_parts[0];
    $last = array_reverse($alias_parts);
    $last_part = $last[0];
    if ($last_part != "edit") {
      $vars['section_title'] = $first_part;
    }
    if (isset($vars['node'])) {
      $vars['title'] = $vars['section_title'];
      $title = explode('-', $vars['title']);
      $vars['title'] = implode(' ', $title);
    }
  }
}

/**
 * Intercept node template variables
 *
 * @param $vars
 *   A sequential array of variables passed to the theme function.
 *
function phptemplate_preprocess_node(&$vars) {
  $node = $vars['node']; // for easy reference
  // for easy variable adding for different node types
  switch ($node->type) {
    case 'page':
      break;
  }

}
*/
/**
 * Intercept comment template variables
 *
 * @param $vars
 *   A sequential array of variables passed to the theme function.
 */
function phptemplate_preprocess_comment(&$vars) {
  static $comment_count = 1; // keep track the # of comments rendered

  // if the author of the node comments as well, highlight that comment
  $node = node_load($vars['comment']->nid);
  if ($vars['comment']->uid == $node->uid) {
    $vars['author_comment'] = TRUE;
  }
  // only show links for users that can administer links
  if (!user_access('administer comments')) {
    $vars['links'] = '';
  }
  // if subjects in comments are turned off, don't show the title then
  if (!variable_get('comment_subject_field', 1)) {
    $vars['title'] = '';
  }
/*
  // if user has no picture, add in a filler
  if (theme_get_setting('toggle_comment_user_picture') && empty($vars['comment']->picture)) {
    $vars['picture'] = '<div class="no-picture">&nbsp;</div>';
  }
*/
  $vars['comment_count'] = $comment_count++;
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function phptemplate_preprocess_block(&$vars, $hook) {
  $block = $vars['block'];

  // Special classes for blocks.
  $classes = array('block');
  $classes[] = 'block-' . $block->module;
  $classes[] = 'region-' . $vars['block_zebra'];
  $classes[] = $vars['zebra'];
  $classes[] = 'region-count-' . $vars['block_id'];
  $classes[] = 'count-' . $vars['id'];

  $vars['edit_links_array'] = array();
  $vars['edit_links'] = '';

  if (user_access('administer blocks')) {
    include_once './' . drupal_get_path('theme', 'majalahversi') . '/template.block-editing.inc';
    phptemplate_preprocess_block_editing($vars, $hook);
    $classes[] = 'with-block-editing';
  }

  // Render block classes.
  $vars['classes'] = implode(' ', $classes);
}


/**
 * Intercept box template variables
 *
 * @param $vars
 *   A sequential array of variables passed to the theme function.
 */
function phptemplate_preprocess_box(&$vars) {
  // rename to more common text
  if (strpos($vars['title'], 'Post new comment') === 0) {
    $vars['title'] = 'Add your comment';
  }
}

/**
 * Override, remove "not verified", confusing
 *
 * Format a username.
 *
 * @param $object
 *   The user object to format, usually returned from user_load().
 * @return
 *   A string containing an HTML link to the user's page if the passed object
 *   suggests that this is a site user. Otherwise, only the username is returned.
 */
function majalahversi_username($object) {
  if ($object->uid && $object->name) {
    // Shorten the name when it is too long or it will break many tables.
    if (drupal_strlen($object->name) > 20) {
      $name = drupal_substr($object->name, 0, 15) .'...';
    }
    else {
      $name = $object->name;
    }

    if (user_access('access user profiles')) {
      $output = l($name, 'user/'. $object->uid, array('attributes' => array('title' => t('View user profile.'))));
    }
    else {
      $output = check_plain($name);
    }
  }
  else if ($object->name) {
    // Sometimes modules display content composed by people who are
    // not registered members of the site (e.g. mailing list or news
    // aggregator modules). This clause enables modules to display
    // the true author of the content.
    if (!empty($object->homepage)) {
      $output = l($object->name, $object->homepage, array('attributes' => array('rel' => 'nofollow')));
    }
    else {
      $output = check_plain($object->name);
    }
  }
  else {
    $output = variable_get('anonymous', t('Anonymous'));
  }

  return $output;
}

/**
 * Override, make sure Drupal doesn't return empty <P>
 *
 * Return a themed help message.
 *
 * @return a string containing the helptext for the current page.
 */
function majalahversi_help() {
  $help = menu_get_active_help();
  // Drupal sometimes returns empty <p></p> so strip tags to check if empty
  if (strlen(strip_tags($help)) > 1) {
    return '<div class="help">'. $help .'</div>';
  }
}

/**
 * Override, use a better default breadcrumb separator.
 *
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function majalahversi_breadcrumb($breadcrumb) {
  if (count($breadcrumb) > 1) {
    $breadcrumb[] = drupal_get_title();
    return '<div class="breadcrumb">'. implode(' &rsaquo; ', $breadcrumb) .'</div>';
  }
}

/**
 * Rewrite of theme_form_element() to suppress ":" if the title ends with a punctuation mark.
 */
function majalahversi_form_element($element, $value) {
  $args = func_get_args();
  return preg_replace('@([.!?]):\s*(</label>)@i', '$1$2', call_user_func_array('theme_form_element', $args));
}

/**
 * Set status messages to use majalahversi CSS classes.
 */
function majalahversi_status_messages($display = NULL) {
  $output = '';
  foreach (drupal_get_messages($display) as $type => $messages) {
    // majalahversi can either call this success or notice
    if ($type == 'status') {
      $type = 'success';
    }
    $output .= "<div class=\"messages $type\">\n";
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>'. $message ."</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}

/**
 * Override comment wrapper to show you must login to comment.
 */
function majalahversi_comment_wrapper($content, $node) {
  global $user;
  $output = '';

  if ($node = menu_get_object()) {
    if ($node->type != 'forum') {
      $count = $node->comment_count .' '. format_plural($node->comment_count, 'comment', 'comments');
      $count = ($count > 0) ? $count : 'No comments';
      $output .= '<h3 id="comment-number">'. $count .'</h3>';
    }
  }

  $output .= '<div id="comments">';
  $msg = '';
  if (!user_access('post comments')) {
    $dest = 'destination='. $_GET['q'] .'#comment-form';
    $msg = '<div id="messages"><div class="error-wrapper"><div class="messages error">'. t('Please <a href="!register">register</a> or <a href="!login">login</a> to post a comment.', array('!register' => url("user/register", array('query' => $dest)), '!login' => url('user', array('query' => $dest)))) .'</div></div></div>';
  }
  $output .= $content;
  $output .= $msg;

  return $output .'</div>';
}

/**
 * Override, use better icons, source: http://drupal.org/node/102743#comment-664157
 *
 * Format the icon for each individual topic.
 *
 * @ingroup themeable
 */
function majalahversi_forum_icon($new_posts, $num_posts = 0, $comment_mode = 0, $sticky = 0) {
  // because we are using a theme() instead of copying the forum-icon.tpl.php into the theme
  // we need to add in the logic that is in preprocess_forum_icon() since this isn't available
  if ($num_posts > variable_get('forum_hot_topic', 15)) {
    $icon = $new_posts ? 'hot-new' : 'hot';
  }
  else {
    $icon = $new_posts ? 'new' : 'default';
  }

  if ($comment_mode == COMMENT_NODE_READ_ONLY || $comment_mode == COMMENT_NODE_DISABLED) {
    $icon = 'closed';
  }

  if ($sticky == 1) {
    $icon = 'sticky';
  }

  $output = theme('image', path_to_theme() . "/images/icons/forum-$icon.png");

  if ($new_posts) {
    $output = "<a name=\"new\">$output</a>";
  }

  return $output;
}

/**
 * Override, remove previous/next links for forum topics
 *
 * Makes forums look better and is great for performance
 * More: http://www.sysarchitects.com/node/70
 */
function majalahversi_forum_topic_navigation($node) {
  return '';
}

/**
 * Trim a post to a certain number of characters, removing all HTML.
 */
function majalahversi_trim_text($text, $length = 150) {
  // remove any HTML or line breaks so these don't appear in the text
  $text = trim(str_replace(array("\n", "\r"), ' ', strip_tags($text)));
  $text = trim(substr($text, 0, $length));
  $lastchar = substr($text, -1, 1);
  // check to see if the last character in the title is a non-alphanumeric character, except for ? or !
  // if it is strip it off so you don't get strange looking titles
  if (preg_match('/[^0-9A-Za-z\!\?]/', $lastchar)) {
    $text = substr($text, 0, -1);
  }
  // ? and ! are ok to end a title with since they make sense
  if ($lastchar != '!' && $lastchar != '?') {
    $text .= '...';
  }
  return $text;
}

/**
* Override or insert PHPTemplate variables into the node template.
*/

function majalahversi_preprocess_node(&$vars) {
  $node = $vars['node'];
  if ($node->type != 'page') {
    $vars['date'] = format_date($node->created, 'custom', 'j M Y');
  } else {
    $vars['date'] = '';
  }
  // If we have any terms...
  if ($node->taxonomy) {
    // Let's iterate through each term.
    foreach ($node->taxonomy as $term) {
      // We will build a new array where there will be as many
      // nested arrays as there are vocabularies
      // The key for each nested array is the vocabulary ID.
      $vocabulary[$term->vid]['taxonomy_term_'. $term->tid]  = array(
        'title' => $term->name,
        'href' => taxonomy_term_path($term),
        'attributes' => array(
          'rel' => 'tag',
          'title' => strip_tags($term->description),
        ),
      );
    }
    switch ($node->type)
    {
      case 'artikel':
        $vocab = $vocabulary[4];
      break;
      case 'makassar':
        $vocab = $vocabulary[19];
      break;
      case 'keliling':
        $vocab = $vocabulary[21];
      break;
      case 'perusahaan':
        $vocab = $vocabulary[18];
      break;
      case 'lowongan':
        $vocab = $vocabulary[26];
      break;
      case 'agenda':
        $vocab = $vocabulary[9];
      break;
      case 'iklan':
        $vocab = $vocabulary[10];
      break;
      case 'galeri':
        $vocab = $vocabulary[16];
      break;
      case 'karikatur':
        $vocab = $vocabulary[25];
      break;
      case 'kontributor':
        $vocab = $vocabulary[14];
      break;
      case 'layananpublik':
        $vocab = $vocabulary[24];
      break;
      case 'regulasi':
        $vocab = $vocabulary[23];
      break;
      default:
        $vocab = $vocabulary[4];
      break;
    }
    $vars['tags']= theme('links',$vocabulary[15], array('class'=>'links inline'));
    $vars['categories']= theme('links',$vocab, array('class'=>'links inline'));
    $vars['terms']= $vars['categories'];

  }
  if ($node->field_penulis) {
    foreach ($node->field_penulis as $author) {
      $vars['authors'] = $author['view'];
    }
  }
  if ($node->type == 'kontributor' && $node->taxonomy) {
    foreach ($node->taxonomy as $k => $value) {
      $k = $k;
      switch ($k)
      {
        case '43':
          $kontribusi = 'Kolom';
        break;
        case '44':
          $kontribusi = 'Karikatur';
        break;
        default:
          $kontribusi = 'Artikel';
        break;
      }
      $vars['kontribusi'] = $kontribusi;
    }
  }
  // we like to display teasers on the node view pages in a different style,
  // but only if they were NOT set to "show summary on full view" (which seems
  // backward, but the implication with that checkbox is that the teaser is
  // PART of the node's body, instead of an actual summary of the entire
  // node's body). if a node's unbuilt body starts with <!--break-->, then
  // a teaser has been manually set, and "show summary" is not checked.
  if ($vars['page'] == TRUE) { // only do this on full page views.
    $node = node_load($vars['nid']); // we reload the node because
    // by the time it gets here <!--break--> has already been filtered out.
    // this if logic stolen from node.module's node_teaser_include_verify().
    if (strpos($node->body, '<!--break-->') === 0) {
      $vars['style_teaser_differently'] = TRUE;
      $vars['teaser'] = check_markup($node->teaser, $node->format, FALSE);
    }
  }
}

