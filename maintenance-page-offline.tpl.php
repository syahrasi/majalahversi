<?php
$head_title = 'majalahversi.com :: Site-offline';


// If your  theme is set to display the site name, uncomment this line and replace the value:
$site_name = 'Majalah Versi';

// If your  theme is set to *not* display the site name, uncomment this line:
//unset($site_name);

// If your theme is set to display the site slogan, uncomment this line and replace the value:
//$site_slogan = 'Makassar yang sebenarnya';

// If your theme is set to *not* display the site slogan, uncomment this line:
unset($site_slogan);

// Main message.  Note HTML markup.
$content = '<p>The site is currently not available due to technical problems. Please try again later. Thank you for your understanding.</p><hr /><p>If you are the maintainer of this site, please check your database settings.</p>';
?>
<?php // $Id: page.tpl.php,v 1.15.4.7 2008/12/23 03:40:02 designerbrent Exp $ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>">
<head>
	<title><?php print $head_title ?></title>
	<meta http-equiv="content-language" content="<?php print $language->language ?>" />
	<?php print $meta; ?>
  <?php print $head; ?>
  <?php print $styles; ?>
  <!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php print $path; ?>blueprint/blueprint/ie.css" type="text/css" media="screen, projection">
  	<link href="<?php print $path; ?>css/ie.css" rel="stylesheet"  type="text/css"  media="screen, projection" />
  <![endif]-->
  <!--[if lte IE 6]>
  	<link href="<?php print $path; ?>css/ie6.css" rel="stylesheet"  type="text/css"  media="screen, projection" />
  <![endif]-->
</head>
<body class="<?php print $body_classes; ?>">
<div id="container" class="container">
  <div id="header" class="floatleft">
    <div id="top-bar" class="floatleft">
      <div id="user-info" class="span-8">
        <?php  if($user->uid){ ?>
          Logged in as: <?php print l($user->name,'user/'.$user->uid); ?> |
        <?php print l("logout","logout"); ?>
        <?php } else { ?>
          <a href='<?php print base_path(); ?>user' class="popups-form-reload" title="Klik untuk login">Login</a> |
          <a href='<?php print base_path(); ?>user/register' class="popups-form-reload" title="Klik untuk daftar">Register</a>
        <?php } ?>
      </div>
      <div id="feedbox" class="floatright">
        <?php if($feed_icons): ?>
          <?php print $feed_icons; ?>
        <?php else: ?>
          <a href="/feed" class="feed-icon"><img src="/misc/feed.png" alt="Syndicate content" title="" height="16" width="16"></a>
        <?php endif ;?>
      </div>
      <?php if (isset($secondary_links)) : ?>
        <div id="top-menu" class="span-16 last"><?php print theme('links', $secondary_links, array('id' => 'subnav', 'class' => 'links')) ?></div>
      <?php endif; ?>
    </div>
    <div id="logo-title" class="floatleft">
      <?php if ($logo): ?>
        <div id="logo" class="span-16">
          <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>" alt="<?php print $site_name; ?>"><h1><?php print $site_name; ?></h1></a>
        </div>
      <?php endif; ?>
    </div>
    <div id="header-image" class="floatleft"></div>
  </div>
  <?php if(!$title == ''): ?>
    <div id="section" class="floatleft"><?php print '<h2>'. $title .'</h2>'; ?></div>
  <?php endif ?>
    <div id="center" class="span-24">
    <?php if ($content): ?>
      <div id="content-content">
        <?php print $content; ?>
      </div> <!-- /content-content -->
    <?php endif ?>
  </div>
</div>
</body>
</html>
