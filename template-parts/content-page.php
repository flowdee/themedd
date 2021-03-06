<?php
/**
 * The template used for displaying page content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php themedd_post_thumbnail(); ?>

	<div class="entry-content">

		<?php do_action( 'themedd_entry_content_start' ); ?>

		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'themedd' ),
				'after'  => '</div>',
			) );
		?>

		<?php do_action( 'themedd_entry_content_end' ); ?>

	</div>
</article>
