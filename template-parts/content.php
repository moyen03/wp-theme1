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
		<?php
		if (has_post_thumbnail()) {
			echo '<div class="small-index-thumbnail clear">';
			echo '<a href="' . get_permalink() . '" title="' . __('Please Click To Read More', 'underscore-moyen') . get_the_title() . '" rel="bookmark">';
			echo the_post_thumbnail('index-thumb');
			echo '</a>';
			echo '</div>';
		}
		?>
	<header class="entry-header clear">
		<?php
		$categories_list = get_the_category_list( esc_html__( ', ', 'underscore-moyen' ) );
		if ( $categories_list && underscore_moyen_categorized_blog() ) {
		printf( $categories_list ); // WPCS: XSS OK.
		}

		if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

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
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

		<footer class="entry-footer continue-reading">
			<?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'underscore-moyen') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
		</footer><!-- .entry-footer -->
	</div> <!-- .index-box -->
</article><!-- #post-## -->
