<?php get_header(); ?>
<section class="container" role="document">
<div class="row">
	<div class="page-banner blog">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</div>
	<div class="small-12 large-9 columns" role="main">
	
	<?php while (have_posts()) : the_post(); ?>
			<?php $pageName = 'ddnew';
			if ( (get_post_type($post) == 'dailies') && (locate_template('content-' . $pageName . '.php') != '')  )
			{
				// yep, load the page template
				get_template_part('content', $pageName, get_post_format());
				
			} else {
				// nope, load the original content template
				get_template_part( 'content', get_post_format() );			}
			?>
			<article class="comment-container">
				<div class="inner-container">
					<?php comments_template(); ?> 
				</div>
			</article>
	<?php endwhile;?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>