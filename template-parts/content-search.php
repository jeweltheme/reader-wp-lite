<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reader-Wp-Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a style="color:#A6A6A6;" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php reader_wp_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
			<div class="continue-reading pull-left">
                <a href="<?php the_permalink();?>">
                	<?php echo esc_html__('Continue reading ...', 'reader-wp-lite');?>                	
                </a>
            </div>
	</div><!-- .entry-summary -->

	
	
</article><!-- #post-## -->
