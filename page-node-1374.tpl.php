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
<a id="feedback-tab" href='<?php print base_path(); ?>contact' class="popups-form-reload" title="Hubungi Kami">Feedback</a>
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
        <?php if($feed_icons) {
          print $feed_icons;
        } else { ?>
        <a href="/feed" class="feed-icon"><img src="/misc/feed.png" alt="Syndicate content" title="" height="16" width="16"></a>
        <?php }?>      
      </div>
      <?php if (isset($secondary_links)) : ?>
        <div id="top-menu" class="span-16 last"><?php print theme('links', $secondary_links, array('id' => 'subnav', 'class' => 'links')) ?></div>
      <?php endif; ?>
    </div>
    <div id="logo-title" class="floatleft">
      <?php if ($logo): ?>
        <div id="logo" class="span-16">
          <!--<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src=" <?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo-image" /></a>-->
          <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>" alt="<?php print $site_name; ?>"><h1><?php print $site_name; ?></h1></a>
        </div>
      <?php endif; ?>
      <?php if ($search_box): ?>
        <div id="search-box" class="span-8 last">
          <?php print $search_box; ?>
        </div> <!-- /#search-box -->
      <?php endif; ?>
    </div>
    <div id="header-image" class="floatleft"></div>
    <?php if ($suckerfishmenu): ?>
      <div id="suckerfishmenu" class="floatleft">
        <?php print $suckerfishmenu; ?>
      </div> <!-- /#suckerfishmenu -->
    <?php endif; ?>
  </div>
  
  <!--
  <?php if ($breadcrumb): ?>
    <div id="breadcrumb" class="floatleft">
      <?php print $breadcrumb; ?>
    </div> <!-- /#breadcrumb -->
  <?php endif; ?> -->
  
  
  <?php if ($featured): ?>
    <div id="featured" class="floatleft">
      <?php print $featured; ?>
    </div> <!-- /#featured -->
  <?php endif; ?>
  
  
  <?php if(!$title == ''): ?>
    <div id="section" class="floatleft"><?php print '<h2>'. $title .'</h2>'; ?></div>
  <?php endif ?>
  
  
  <?php if ($left): ?>
    <div class="<?php print $left_classes; ?>"><?php print $left; ?></div>
  <?php endif ?>
    <div id="center" class="<?php print $center_classes; ?>">
    <?php
      if ($tabs != '') {
        print '<div class="tabs">'. $tabs .'</div>';
      }

      if ($messages != '') {
        print '<div id="messages">'. $messages .'</div>';
      }
      
      /*
      if ($title != '') {
        print '<h2>'. $title .'</h2>';
      } */  

      print $help; // Drupal already wraps this one in a class      
    ?>
    <?php if ($content): ?>
      <div id="content-content" class="page-suara-main">
        <?php print $content; ?>
          <?php if ($content_middle_one): ?>
            <div id="content-middle-one" class="span-8">
          <?php print $content_middle_one; ?>
            </div> <!-- /#content middle -->
          <?php endif; ?>
          <?php if ($content_middle_two): ?>
          <div id="content-middle-two" class="span-8">
            <?php print $content_middle_two; ?>
          </div> <!-- /#content middle -->
          <?php endif; ?>
      </div> <!-- /content-content -->
    <?php endif ?>
  </div>
  <?php if ($right): ?>
    <div id="right" class="<?php print $right_classes; ?>"><?php print $right; ?></div>
  <?php endif ?>
  
  <?php if ($hori_adv_one): ?>
    <div id="hori-adv-one" class="floatleft<?php if(!$is_front) { print " no-bottom-margin"; } ?>">
      <?php print $hori_adv_one; ?>
    </div> <!-- /#horizontal advertisement one -->
  <?php endif; ?>
  
  <?php if ($right_middle): ?>
    <div id="right-middle" class="span-8 last">
      <?php print $right_middle; ?>
    </div> <!-- /#right middle -->
  <?php endif; ?>
  
  <?php if ($hori_adv_two): ?>
    <div id="hori-adv-two" class="floatleft<?php if($is_front) { print " no-bottom-margin"; } ?>">
      <?php print $hori_adv_two; ?>
    </div> <!-- /#horizontal advertisement two -->
  <?php endif; ?>
  
  <?php if ($content_bottom): ?>
    <div id="content-bottom" class="floatleft">
      <?php print $content_bottom; ?>
    </div> <!-- /#content bottom -->
  <?php endif; ?>
  
  <?php if ($hori_adv_three): ?>
    <div id="hori-adv-three" class="floatleft<?php if($is_front) { print " no-bottom-margin"; } ?>">
      <?php print $hori_adv_three; ?>
    </div> <!-- /#horizontal advertisement three -->
  <?php endif; ?>
  
  <?php if ($footer_message | $footer): ?>
    <div id="footer" class="floatleft">
      <?php if ($footer): ?>
        <?php print $footer; ?>
      <?php endif; ?>
      <?php if ($footer_message): ?>
        <div id="footer-message"><?php print $footer_message; ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>  

  <?php print $scripts ?>
  <?php print $closure; ?>

</div>

</body>
</html>
