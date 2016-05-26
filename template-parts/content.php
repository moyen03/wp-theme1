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
	<header class="entry-header">
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
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'underscore-moyen' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscore-moyen' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php underscore_moyen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
