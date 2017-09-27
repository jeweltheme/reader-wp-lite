<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reader-Wp-Lite
 */

?>
</div><!-- /.wrapper -->
	   <footer class="site-footer text-center">
        <div class="copyright">

          &copy;<?php echo date('Y'); echo esc_html__(' | Developed With Love by','reader-wp-lite');?>

                <?php
                  $footer_url= get_theme_mod( 'footer_url' );
                  if(!empty($footer_url)){ ?>
                    <a href="<?php echo esc_url( $footer_url ); ?>">
                <?php } else{ ?>
                    <a href="https://prowptheme.com">
                <?php } ?>

                <?php
                  $footer_user= get_theme_mod( 'footer_user' );
                  if(!empty($footer_user)){
                    echo strip_tags( $footer_user );
                  } else{
                    echo esc_html__('ProWPTheme' , 'reader-wp-lite');
                  } ?>
            </a>

        </div><!-- /.copyright -->
      </footer><!-- /.footer-bottom -->



    <div id="scroll-to-top" class="scroll-to-top">
	    <i class="fa fa-angle-double-up"></i>
	  </div>


</section>
<?php wp_footer(); ?>

</body>
</html>
