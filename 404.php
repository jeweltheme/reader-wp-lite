<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Reader-Wp-Lite
 */

get_header(); ?>

			<div class="container main-content media-body wrapper">

				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'reader-wp-lite' ); ?></h1>
				</header><!-- .page-header -->

				
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'reader-wp-lite' ); ?></p>

				<?php get_search_form(); ?>

			</div><!-- .page-content -->
			

<?php
get_footer();
