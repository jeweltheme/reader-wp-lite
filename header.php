<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reader-Wp-Lite
 */

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php if ( is_single() ) { body_class( 'media single' ); } else { body_class(); } ?>>


    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fa fa-bars"></i>
    </button>

    <div id="theSidebar" class="sidebar media-left vertical_nav">



      <nav class="navbar" role="navigation">



        <div class="navbar-header">

          <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
              <?php the_custom_logo(); ?>
          <?php else : ?>
              <h1 class="site-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
                  <?php bloginfo( 'name' ); ?>
                </a>
              </h1>
          <?php endif; ?>
          <p class="site-description"><?php bloginfo( 'description' ); ?></p>

        </div>



        <div id="navbar" class="side-nav">
            <?php
                 $args = array(
                        'theme_location'  => 'primary',
                        'depth'           => 2,
                        'container'       => false,
                        'container_class' => 'mastnav fullheight',
                        'menu_class'      => 'nav navbar-nav',
                        'fallback_cb'     => 'BootstrapNavMenuWalker::fallback',
                        'walker'          => new BootstrapNavMenuWalker()
                      );
                wp_nav_menu($args);
              ?>

        </div><!--/.navbar-collapse -->



          <?php
             if ( is_active_sidebar( 'blog-sidebar' ) ){
              dynamic_sidebar( 'blog-sidebar' );
             }
           ?>

		    </nav>

      <?php
        $twitter    = get_theme_mod( 'twitter' );
        $skype      = get_theme_mod( 'skype' );
        $instagram  = get_theme_mod( 'instagram' );
        $dribble    = get_theme_mod( 'dribble' );
        $vimeo      = get_theme_mod( 'vimeo' );
        $facebook   = get_theme_mod( 'facebook' );

        if( $twitter || $skype || $instagram || $dribble || $vimeo || $facebook ) {
      ?>
      <div class="widget widget_social theia_sticky">
        <div class="widget-details">

          <?php if(!empty($twitter)){ ?><a href="https://www.twitter.com/<?php echo esc_html( $twitter ); ?>"><i class="icon ti-twitter"></i><?php } ?></a>
          <?php if(!empty($skype)){ ?><a href="https://www.skype.com/<?php echo esc_html( $skype ) ; ?>"><i class="icon ti-skype"></i><?php } ?></a>
          <?php if(!empty($instagram)){ ?><a href="https://www.instagram.com/<?php echo esc_html( $instagram ); ?>"><i class="icon ti-instagram"></i><?php } ?></a>
          <?php if(!empty($dribble)){ ?><a href="https://www.dribbble.com/<?php echo esc_html( $dribble ); ?>"><i class="icon ti-dribbble"></i><?php } ?></a>
          <?php if(!empty($vimeo)){ ?><a href="https://www.vimeo.com/<?php echo esc_html( $vimeo ); ?>"><i class="icon ti-vimeo"></i><?php } ?></a>
          <?php if(!empty($facebook)){ ?><a href="https://www.facebook.com/<?php echo esc_html( $facebook );?>"><i class="icon ti-facebook"></i><?php } ?></a>

        </div><!-- /.widget-details -->
      </div><!-- /.widget -->

      <?php } ?>

    </div><!-- /.sidebar -->



