<?php
/*
Template Name: About Page
*/
get_header(); ?>
<section class="container" role="document">
   <div class="row">
   		<div class="page-banner about">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</div>
	<div class="small-12 large-9 columns" role="main">
	
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="inner-container">
				<?php the_content(); ?>
				<br/>
			</div>
			
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
		
	</article>
	<?php endwhile;?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>