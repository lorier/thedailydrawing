<?php
/*
Template Name: Illustration
*/
get_header(); ?>
<div class="illustration-banner"><h2 class="entry-title"><?php the_title(); ?></h2></div>

<section class="container" role="document">
    <div class="row">
	<div class="small-12 large-12 columns" role="main">
		<?php /* Start loop */ ?>
		<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
		
				<div class="row" id="illus-grid">
						<?php the_content(); 
							//shortcodes in admin govern the panels. see functions.php
						?>

						<?php
						//get the slug to add to pagination urls
						$post = get_post(isset($post_id));
						$pageSlug = $post->post_name;
						?>
				</div>
		</article>
	</div>
	<?php endwhile; // End the loop ?>
	<div class="row">
	<div class="large-8 large-offset-2 small-offset-1 small-10 columns">
		<br/>
		<div class="contact panel">
			<h4>Like what you see? <a href="mailto:lorie@thedailydrawing.com">Hire me!</a>
			</h4>
		</div>
	</div>
</div>

<?php get_footer(); ?>
	