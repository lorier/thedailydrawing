<?php
/*
Template Name: Shop Single
*/
get_header(); ?>
<section class="container" role="document">
   <div class="row">
		<div class="page-banner shop">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</div>
	<div class="small-12 large-12 columns" role="main">
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<div class="row">
			<div class="large-8 medium-6 columns">
				<figure>
					<?php echo get_the_post_thumbnail(); ?> 
				</figure>
			</div>
			<div class="large-4 medium-6 columns">
				<header>
				<h2 class="entry-title"><?php the_title(); ?></h2>
			</header>
			
			<div class="entry-content page-store">
				<?php	the_content(); ?>

				<?php
			//get the slug to add to pagination urls
			$post = get_post(isset($post_id)); 
			$pageSlug = $post->post_name;
			
			?>
			</div>
			</div>
		</div>
			
			
		</article>
	<?php endwhile; // End the loop ?>
	
	</div>
		
<?php get_footer(); ?>