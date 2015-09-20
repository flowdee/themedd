<?php

/**
 * Remove styling from subtitles plugin
 */
if ( class_exists( 'Subtitles' ) && method_exists( 'Subtitles', 'subtitle_styling' ) ) {
    remove_action( 'wp_head', array( Subtitles::getInstance(), 'subtitle_styling' ) );
}

/**
 * Remove subtitles from download grid
 *
 * @since 1.0.0
 */
function trustedd_remove_subtitles() {

    global $post;

    if ( ! class_exists( 'Subtitles' ) ) {
        return;
    }

    if ( isset( $post->post_content ) && has_shortcode( $post->post_content, 'downloads' ) ) {
        remove_filter( 'the_title', array( Subtitles::getInstance(), 'the_subtitle' ), 10, 2 );
    }

}
add_action( 'template_redirect', 'trustedd_remove_subtitles' );

/**
 * Load the header
 *
 * @since 1.0
 */
function trustedd_header() {
    ?>

    <header id="masthead" class="site-header" role="banner">

        <?php do_action( 'trustedd_masthead_start' ); ?>

        <div class="site-header-main">
        <?php do_action( 'trustedd_masthead' ); ?>
        </div>

    </header>

    <?php
}
add_action( 'trustedd_header', 'trustedd_header' );


/**
 * Load our site logo
 *
 * @since 1.0
 */
function trustedd_site_branding() {

	?>

    <div class="site-branding">

        <?php do_action( 'test' ); ?>
        <?php if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>
        <?php else : ?>
            <p class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </p>
        <?php endif;

        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo $description; ?></p>
        <?php endif; ?>
    </div>

	<?php
}
add_action( 'trustedd_masthead', 'trustedd_site_branding' );
