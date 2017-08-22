<!DOCTYPE html>
<html lang= "ja">
<head>
  <meta charset="UTF-8">
  <title>
    <?php
      global $page, $paged;
      bloginfo( 'name' );
      wp_title( '|', true, 'left' );
      $site_description = get_bloginfo( 'description', 'display' );
      if ( $site_description && ( is_home() || is_front_page() ) )
          echo "";
      if ( $paged >= 2 || $page >= 2 )
          echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
      ?>
  </title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="株式会社○○">
  <meta name="copyright" content="Copyright &copy; ○○ Corp . All rights reserved.">
  <meta property="og:title" content="株式会社○○" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="images/og.png" />
  <meta property="og:description" content="" />
  <meta property="og:site_name" content="株式会社○○" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/ico" href="/images/favicon.png" />
  <link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />
  <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosansjapanese.css">
  <link href="<?php bloginfo('template_url'); ?>/css/slick.css" rel="stylesheet">
  <link href="<?php bloginfo('template_url'); ?>/css/slick-theme.css" rel="stylesheet">
  <link href="<?php bloginfo('template_url'); ?>/css/jquery.maximage.min.css" rel="stylesheet">
  <link href="<?php bloginfo('template_url'); ?>/css/jquery-ui.structure.min.css" rel="stylesheet">
  <link href="<?php bloginfo('template_url'); ?>/css/validation.css" rel="stylesheet">
  <link href="<?php bloginfo('template_url'); ?>/css/base.css" rel="stylesheet">
  <link href="<?php bloginfo('template_url'); ?>/css/style-imamura.css" rel="stylesheet">
  <link href="<?php bloginfo('template_url'); ?>/css/style-imamura-tb.css" rel="stylesheet" media="screen and (max-width:960px)">
  <link href="<?php bloginfo('template_url'); ?>/css/style-imamura-sp.css" rel="stylesheet" media="screen and (max-width:600px)">
  <link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet">
  <link href="<?php bloginfo('template_url'); ?>/css/style-tb.css" rel="stylesheet" media="screen and (max-width:960px)">
  <link href="<?php bloginfo('template_url'); ?>/css/style-sp.css" rel="stylesheet" media="screen and (max-width:600px)">
  <link rel="canonical" href="<?php echo the_permalink();?>/" />
</head>
<body>
<?php if ( is_home() ) : ?>
<header class="wrap">
<?php else: ?>
<header class="detail-header wrap">
<?php endif; ?>
  <div class="inner clearfix">
    <div class="header-top clearfix">
      <h1 class="header-logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/common/logo.png" alt="airport tourism"></a></h1>
      <?php if ( is_home() || is_page('plan-list') ) : ?>
      <div class="sp-search-btn">
      <img src="<?php bloginfo('template_url'); ?>/images/common/icon-search.png" alt="airport tourism">
      <div class="search-toggle">
        <span>toggle1</span>
        <span>toggle2</span>
      </div>
      </div>
      <?php else: ?>
      <?php endif; ?>
    </div>
    <nav class="global-nav">
      <ul class="clearfix">
        <li class="nav-home"><a href="<?php bloginfo('url'); ?>"><span>ホーム</span></a></li>
        <li class="nav-recommend"><a href="<?php bloginfo('url'); ?>"><span>おすすめプラン</span></a></li>
        <li class="nav-plan"><a href="<?php bloginfo('url'); ?>/plan-list"><span>プラン一覧</span></a></li>
        <li class="nav-car"><a href="<?php bloginfo('url'); ?>/vehicle"><span>車両紹介</span></a></li>
        <li class="nav-contact"><a href="<?php bloginfo('url'); ?>/contact-index"><span>お問い合わせ</span></a></li>
      </ul>
    </nav>
  </div>
</header>
