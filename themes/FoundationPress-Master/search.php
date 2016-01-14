<?php get_header(); ?>
<section class="container" role="document">
            <div class="row">
	<div class="small-12 large-9 columns" role="main">
	
		<h2><?php _e('Search Results for', 'FoundationPress'); ?> "<?php echo get_search_query(); ?>"</h2>
	<article>
	<?php
		global $wp_query;
		$total_results = $wp_query->found_posts;
		echo $total_results;
	?>
	
	<?php if ( have_posts() ) : 
	add_action('template_redirect', 'redirect_single_post');
function redirect_single_post() {
    if (is_search()) {
        global $wp_query;
        if ($wp_query->post_count == 1 && $wp_query->max_num_pages == 1) {
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
            exit;
        }
    }
}
?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php echo get_the_title(); ?> 
			<?php /* get_template_part( 'content', get_post_format() );  */?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif;?>
	</article>
					

	<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer &rarr;', 'FoundationPress' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>


