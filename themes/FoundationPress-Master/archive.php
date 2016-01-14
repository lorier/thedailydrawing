<?php get_header(); ?>
<section class="container" role="document">
    <div class="row">
    <div class="page-banner blog">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</div>
 <!-- Row for main content area -->
	<div class="small-12 large-9 columns" role="main">
	<h3>Currently Browsing: <?php single_cat_title();  single_month_title(' ');  ?> </h3>
	<?php if ( have_posts() ) : ?>
		<?php $pageName = 'ddnew'; ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php $pageName = 'ddnew';
			if ( (get_post_type($post) == 'dailies') && (locate_template('content-' . $pageName . '.php') != '')  )
			{
				// yep, load the page template
				get_template_part('content', $pageName, get_post_format());
				
			} else {
				// nope, load the original content template
				get_template_part( 'content', get_post_format() );			}
			?>
			<div class="post-connector"></div>	
		<?php endwhile; ?>
		
	<?php endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<nav id="post-nav">
			<?php echo paginate_links( array(
				'prev_text' => 'Newer',
				'next_text' => 'Older',
				'mid_size' => 1)
			); ?>
	</nav>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>