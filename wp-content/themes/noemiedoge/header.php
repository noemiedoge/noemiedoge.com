<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php noemiedoge_schema_type(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php wp_head(); ?>

  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
  <meta name="msapplication-TileColor" content="#000000">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#000000">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="header" role="banner">
  <div id="logo" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
    <strong>
      <a href="<?php echo esc_url( home_url( '/' ) ) ?>" rel="home" itemprop="url">
        Noémie Doge
      </a>
    </strong>
  </div>

  <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
  <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
  </nav>

</header>

<main class="container-full" id="content" role="main">
