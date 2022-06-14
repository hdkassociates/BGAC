<?php
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
// POST TYPES
// include_once('functions/post-types/case-studies.php');
// include_once('functions/post-types/jobs.php');
// include_once('functions/post-types/news.php');
// include_once('functions/post-types/indicators.php');
include_once('functions/post-types/see.php');
include_once('functions/post-types/do.php');
include_once('functions/post-types/visit.php');
include_once('functions/post-types/explore.php');
include_once('functions/post-types/hire.php');
include_once('functions/post-types/sidebar.php');
include_once('functions/MailChimp.php' );
include_once('functions/restclient.php' );

// TAXONOMIES
include_once('functions/taxonomies/see-category.php');
include_once('functions/taxonomies/do-category.php');
include_once('functions/taxonomies/visit-category.php');
include_once('functions/taxonomies/explore-category.php');
// include_once('functions/taxonomies/dress-category.php');
// include_once('functions/taxonomies/dress-shape.php');
// include_once('functions/taxonomies/dress-fabric.php');


// NAV-WALKERS
include_once('functions/nav-walkers/wp_bootstrap_navwalker.php');

// PLUGINS
include_once('functions/plugins/contact-form/form.php' );

// WIDGETS
// include_once('functions/widgets/sidebar-button.php' );
// include_once('functions/widgets/about-widget.php' );

// CUSTOM FIELDS
// include_once('functions/custom-fields/all-custom-fields.php');


// SOCIAL
// include_once('functions/social/aggregator.php');

// OPTION PAGES
// include_once('functions/options/social-wall.php');

// COMPOSER
// require_once __DIR__.'/vendor/autoload.php';

// DEFINE ACF
// define( 'ACF_LITE' , true );

// STYLES
include_once('functions/custom-functions/register-styles.php' );

// SCRIPTS
include_once('functions/custom-functions/register-scripts.php' );

// WORDPRESS FUNCTIONS
include_once('functions/custom-functions/basic-wp-functions.php' );
include_once('functions/custom-functions/custom-theme-functions.php' );

// CUSTOM AJAX FUNCTIONS (handled in footer.js)





?>
