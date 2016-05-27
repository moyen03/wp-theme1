<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package underscore-moyen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="index-box">
	<header class="entry-header clear">
		<?php
		// Display a thumb tack in the top right hand corner if this post is sticky
		if (is_sticky()) {
			echo '<i class="fa fa-thumb-tack sticky-post"></i>';
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

		<footer class="entry-footer continue-reading">
			<?php

			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php underscore_moyen_posted_on(); ?>

					<?php
					if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
						echo '<span class="comments-link">';
						/* translators: %s: post title */
						comments_popup_link( __( 'Leave a Comment', 'underscore-moyen' ), __( '1 Comment', 'underscore-moyen' ), __( ' % Comment', 'underscore-moyen' ) );
						echo '</span>';
					} ?>
					<?php
					edit_post_link(
						sprintf(
						/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'underscore-moyen' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</div><!-- .entry-meta -->
				<?php
			endif; ?>
		</footer><!-- .entry-footer -->
	</div> <!-- .index-box -->
</article><!-- #post-## -->
