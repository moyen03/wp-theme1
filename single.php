<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscore-moyen
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//			the_post_navigation();
			?>
			<nav class="navigation post-navigation" role="navigation">
				<div class="post-nav-box clear">
					<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'my-simone' ); ?></h1>
					<div class="nav-links">
						<?php
						previous_post_link( '<div class="nav-previous"><div class="nav-indicator">' . _x( 'Previous Post:', 'Previous post', 'my-simone' ) . '</div><h1>%link</h1></div>', '%title' );
						next_post_link(     '<div class="nav-next"><div class="nav-indicator">' . _x( 'Next Post:', 'Next post', 'my-simone' ) . '</div><h1>%link</h1></div>', '%title' );
						?>
					</div><!-- .nav-links -->
				</div><!-- .post-nav-box -->
			</nav><!-- .navigation -->

				<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
