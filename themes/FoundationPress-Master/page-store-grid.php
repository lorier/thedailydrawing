<?php
/*
Template Name: Shop Grid
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
		
		<div class="inner-container page-store">
			<div class="row">
				<div class="large-12 columns">
					<?php the_content(); 
						//shortcodes in admin govern the panels. see functions.php
					?>

					<?php
					//get the slug to add to pagination urls
					$post = get_post(isset($post_id));
					$pageSlug = $post->post_name;
					?>
				</div>
			</div>
		</div>
		
	</div>
	</article>
	<?php endwhile; // End the loop ?>
		
<?php get_footer(); ?>