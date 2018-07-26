<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package synapse
 */
?>

	</div><!-- #content -->

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
            <span class="footer_credit_line">
	    		<?php printf( __( 'Designed by %1$s.', 'synapse' ), '<a target= "blank" href="'.esc_url("https://inkhive.com").'" rel="nofollow">InkHive</a>' ); ?>
            </span>
			<span class="sep"></span>
            <span class="footer_custom_text">
    			<?php echo ( get_theme_mod('synapse_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','synapse')) : esc_html( get_theme_mod('synapse_footer_text') ); ?>
            </span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
