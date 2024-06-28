<header id="masthead" class="uqiwp-header uqiwp-inline-menu">
		<nav id="site-navigation" class="uqiwp-navbar">
		    <div class="container">
			   <div class="tranlate-language">+ ENGLISH</div>
				<div class="uqiwp-menu-wrap">
					<div class="uqiwp-brand-wrap">
						<?php  
							/**
							 * uqiwp_before_logo hook
							 */
							do_action( 'uqiwp_before_logo' );
						?>
						<a class="uqiwp-navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php uqiwp_custom_logo(); ?>
						</a>
						<?php  
							/**
							 * uqiwp_after_logo hook
							 */
							do_action( 'uqiwp_after_logo' );
						?>
						<span class="uqiwp-navbar-toggler js-show-nav">
							<i class="fas fa-bars"></i>
						</span>
					</div>
					<?php
						if( has_nav_menu( 'primary' ) ) :
							wp_nav_menu( array(
								'theme_location'	=> 'primary',
								'container'			=> false,
								'menu_class'		=> 'uqiwp-main-menu uqiwp-inline-menu',
								'menu_id'			=> false,
							) );
						endif;
					?>
				</div>
		    </div>
		</nav>
	</header><!-- #masthead -->