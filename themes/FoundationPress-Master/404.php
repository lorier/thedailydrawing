<?php get_header(); ?>
<section class="container" role="document">
    <div class="row">
    <div class="page-banner fourofour">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</div>
<!-- Row for main content area -->
	<div class="small-12 large-9 columns" role="main">
	
		<article class="main">
			<header>
				<h2 class="entry-title"><?php _e('Whoops!', 'FoundationPress'); ?></h2>
			</header>
			<div class="inner-container">
				<div class="error">
					<p class="bottom"><?php _e('The page you are looking for might have been abducted, had its name changed by the government witness protection program, or is temporarily on furlough.', 'FoundationPress'); ?></p>
				</div>
				<p><?php _e('Please try the following:', 'FoundationPress'); ?></p>
				<ul> 
					<li><?php printf(__('Return to the <a href="%s">home page</a>', 'FoundationPress'), home_url()); ?></li>
					<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'FoundationPress'); ?></li>
				</ul>
					<br/>
				<br/>
				<br/>
			</div>
		</article>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>