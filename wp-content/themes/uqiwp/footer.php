<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uqiwp
 */

?>

	</div><!-- #content -->
	<?php 
		/**
		 * uqiwp_before_footer hook
		 */
		do_action( 'uqiwp_before_footer' );
	?>

	<footer class="uqiwp-footer">
		<!-- Widgets -->
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-6 foo-colume-1">
					<?php dynamic_sidebar( 'footer-widget-1' ); ?>
				</div>
				<div class="col-md-2 col-sm-6 foo-colume-2">
					<?php dynamic_sidebar( 'footer-widget-2' ); ?>
				</div>
				<div class="col-md-1 col-sm-6 foo-colume-3">
					<?php dynamic_sidebar( 'footer-widget-3' ); ?>
				</div>
				<div class="col-md-2 col-sm-6 foo-colume-4">
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				</div>
			</div>
		</div>
		<!-- Copyright -->
		<div class="container footer-bottom">
			<div class="row">
				<div class="col-md-7">
					<?php dynamic_sidebar( 'copyright-widget-1' ); ?>
				</div>
				<div class="col-md-5 copy-right-content">
					<?php dynamic_sidebar( 'copyright-widget-2' ); ?>
				</div>
			</div>
		</div>
	</footer>

	<?php  
		/**
		 * uqiwp_after_footer hook
		 */
		do_action( 'uqiwp_after_footer' );
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
