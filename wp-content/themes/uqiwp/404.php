<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package uqiwp
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<?php 
						/**
						 * uqiwp_before_main_content hook
						 */
						do_action( 'uqiwp_before_main_content' );
					?>
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'uqiwp' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'uqiwp' ); ?></p>

							<!--<?php get_search_form(); ?>-->
						</div><!-- .page-content -->
					</section><!-- .error-404 -->

					<?php  
						/**
						 * uqiwp_after_main_content hook
						 */
						do_action( 'uqiwp_after_main_content' );
					?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</div>

<?php
get_footer();
