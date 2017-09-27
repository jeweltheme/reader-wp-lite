<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reader-Wp-Lite
 */


?>

        <article id="post-<?php echo get_the_ID();?>">
          <div class="overlay">
             <?php if ( has_post_thumbnail() ) { ?>
              <div class="post-thumbnail single-image">
                <?php the_post_thumbnail('reader_wp_lite_full'); ?>
              </div>
              <?php } ?>
            <div class="post-content">
              <?php reader_wp_lite_post_meta(); ?>
                <?php the_title( sprintf( '<h2 class="post-title">' ), '</h2>' ); ?>
                <div class="entry"><?php the_content();?>
                  <?php
                    wp_link_pages( array(
                      'before' => '<div class="page-links">' . __( 'Pages:', 'reader-wp-lite' ),
                      'after'  => '</div>',
                    ) );
                  ?>
                </div>
            </div><!-- /.post-content -->

          </div><!-- /.overlay -->
        </article><!-- /.post type-post  -->
