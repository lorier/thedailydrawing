<?php
/*
Template Name: Shop outlinks
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
					<div class="shop-grid row" >
						<div class="large-4 medium-6 columns" >
							<div class="active panel" >
								<a target="_blank" href="http://society6.com/thedailydrawing/collection/the-daily-drawing-comics">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/society_6_sample.jpg" alt=""/> 
									</a>
								<div class="info">
									<h4>Comic Prints and More</h4>
									<p>Get high quality art prints of the The Daily Drawing comic panels. You can also buy wearables and other items like pillows and mugs.</p>
									<a class="button" target="_blank" href="http://society6.com/thedailydrawing/collection/the-daily-drawing-comics">Shop on Society6</a>
							</div>
							</div>
						</div>
						<div class="large-4 medium-6 columns" >
							<div class="active panel" >
							<a target="_blank" href="http://www.zazzle.com/thedailydrawing?rf=238488292045149371">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/umbrelope_baby_bib.jpg" alt=""/> 
									</a>
								<div class="info">
									<h4>Baby and Kids</h4>
									<p>A few of my vintage pieces especially for babies and kids! Available items include kids' tees, baby rompers, bibs and more.</p>
									<a class="button" target="_blank" href="http://www.zazzle.com/thedailydrawing?rf=238488292045149371">Shop on Zazzle</a>
								</div>
							</div>
						</div>
						<div class="large-4 medium-6 columns" >
							<div class="etsy panel" >
									<div class="external-shop-logo">
									 	<img src="<?php echo get_template_directory_uri(); ?>/assets/Etsy_logo.png">	
									 </div> 
								<div class="info">
									
									<h4>Original Art</h4>
									<h6 class="coming-soon">Coming Soon!</h6>
									<p>I'll be selling my originals through Etsy soon. Hang tight!</p>
								</div>
 									
							</div>
						</div>
					</div>
					<div style="clear:left"></div>

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