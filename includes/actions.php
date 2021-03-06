<?php

/**
 * Loads the secondary menu into the secondary menu.
 *
 * @since 1.0.3
 */
function themedd_secondary_navigation_menu() {
	
	// Load the secondary navigation.
	if ( has_nav_menu( 'secondary' ) ) {
		add_action( 'themedd_secondary_menu', 'themedd_secondary_navigation' );
	}

}
add_action( 'template_redirect', 'themedd_secondary_navigation_menu', 5 );

/**
 * Show the date and author in the header on single posts
 *
 * @since 1.0.0
 */
function themedd_show_posted_on() {

	if ( is_singular( 'post' ) ) {
		themedd_posted_on();
	}

}
add_action( 'themedd_page_header_wrapper_start', 'themedd_show_posted_on' );

/**
 * Show the featured image on the themedd_article_start hook.
 * This allows us to remove the featured image dynamically where needed.
 *
 * @since 1.0.0
 */
function themedd_show_post_thumbnail() {
	themedd_post_thumbnail();
}
add_action( 'themedd_article_start', 'themedd_show_post_thumbnail' );

/**
 * Show the entry footer info (Categories and tags + edit link).
 *
 * @since 1.0.0
 */
function themedd_show_entry_footer() {

	if ( is_singular( 'post' ) ) {
		themedd_entry_footer();
	}

}
add_action( 'themedd_entry_content_end', 'themedd_show_entry_footer' );

/**
 * Load the biography template after the entry content on a single post.
 *
 * @since 1.0.0
 */
function themedd_show_author_biography() {

	if ( is_singular( 'post' ) && '' !== get_the_author_meta( 'description' ) ) {
		get_template_part( 'template-parts/biography' );
	}

}
add_action( 'themedd_entry_content_end', 'themedd_show_author_biography' );
