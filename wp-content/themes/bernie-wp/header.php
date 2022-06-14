<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="The Bernie Grant Arts Centre is a £15 million purpose-built multi-arts centre, which includes a 274-seat auditorium, studio/rehearsal space, café/bar, enterprise centre and open spaces. It is located next to the Town Hall in Tottenham, North London.">
    <title><?php bloginfo('name'); ?><?php if(!is_front_page()) {echo ' | ';} ?><?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W9GDPPC');</script>
<!-- End Google Tag Manager -->

    <?php wp_head(); ?>
	<script
type='text/javascript'
src='https://tickets.berniegrantcentre.co.uk/clientname/website/scripts/resizeiframe.js'>
</script>
  </head>
<body class="<?php echo join(' ', get_body_class()); ?> <?=(is_page() && !get_page_template_slug() ? get_field('color_scheme') : '');?>">

  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W9GDPPC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <header class="cd-header is-visible">
        <div class="nav-wrapper">
            <div class="cd-logo">
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/bgac-logo.png">
            </a>
                <div class="organisation-name">
                    <p>Bernie Grants Arts Centre</p>
                </div>
            </div>
            <nav>
                    <?php
                      $defaults = array(
                        'theme_location' => 'primary',
                        'menu'=> 'primary-nav',
                        'container'=> '',
                        'container_class' => '',
                        'container_id'=> '',
                        'menu_class'=> '',
                        'menu_id'=> '',
                        'echo'=> true,
                        'items_wrap'=> '%3$s',
                        'depth'=> 1,
                        'walker' => new Nav_Walker_Nav_Menu()
                      );
                    ?>


                    <ul class="cd-secondary-nav">
                    <?php wp_nav_menu( $defaults ); ?>
                    <li><a href="<?=get_permalink(get_field('my_account_page', 'options'));?>" class="btn btn-sm btn-lightgrey"><span><i class="i-user-o"></i></span></a></li>
                    <li><a href="<?=get_permalink(get_field('basket_page', 'options'));?>" class="btn btn-sm btn-lightgrey"><span><i class="i-cart" aria-hidden="true"></i></span></a></li>
                </ul>
            </nav>
            <!-- cd-nav -->
            <a class="cd-primary-nav-trigger" href="#0">
            <span class="cd-menu-text">Menu</span><span class="cd-menu-icon"></span>
        </a>
        </div>
        <!-- cd-primary-nav-trigger -->
    </header>
    <nav>
        <ul class="cd-primary-nav">
            <?php
              $defaults = array(
                'theme_location'  => 'primary',
                'menu'=> 'primary-nav',
                'container'=> '',
                'container_class' => '',
                'container_id'=> '',
                'menu_class'=> '',
                'menu_id'=> '',
                'echo'=> true,
                'items_wrap'=> '%3$s',
                'depth'=> 1,
                'walker' => new Nav_Walker_Nav_Menu()
              );
            ?>
            <?php wp_nav_menu( $defaults ); ?>
            <li class="mobile-menu-icons mobile-menu-icon"><a href="<?=get_permalink(get_field('my_account_page', 'options'));?>" class="btn btn-sm btn-lightgrey"><span><i class="i-user-o"></i></span></a></li>
            <li class="mobile-menu-icon"><a href="<?=get_permalink(get_field('basket_page', 'options'));?>" class="btn btn-sm btn-lightgrey" id="cart-button"><span class="mobile-menu-icons"><i class="i-cart" aria-hidden="true"></i></span></a></li>
        </ul>
    </nav>

    <main class="body-wrapper">
