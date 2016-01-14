	</div>
</section>
<div class="footer-wrap">
	<footer class="row">
		<?php /* dynamic_sidebar("Footer");  */?>
		<section class="large-3 medium-3 columns">
			<h5>What the Heck Is This?</h5>
			<p>On June 12, 2013, I made a promise to the world via Instagram to do a drawing a day for one year. These are they, plus some.<a href="<?php echo bloginfo('url'); ?>/about" > Read More&nbsp;></a></p>

		</section>
		<section class="large-3 medium-3 columns">
			<h5>Technical Nonsense</h5>
			<p>I built this site with <a href="http://foundation.zurb.com/" target="_blank" title="Foundation 5">Foundation 5</a> for <a href="http://wordpress.org/" title="WordPress" target="_blank">WordPress</a>, using a little <a href="http://sass-lang.com/" title="SASS" target="_blank">SASS</a> to wrangle the styles.</p>
		</section>
		<section class="large-3 medium-3 columns">
			<h5>Mailing List</h5>
			<?php
				if( function_exists( 'mc4wp_form' ) ) {
				    mc4wp_form();
				}?>

		</section>
		<section id="other-sites-buttons" class="large-3 medium-3 columns">
			<ul>
				<li><a target="_blank" href="https://www.facebook.com/thedailydrawing"><img width="40" height="40" src="<?php echo get_template_directory_uri(); ?>/assets/footer_facebook.png" alt="Facebook" title="Facebook"/></a></li>
				<li><a target="_blank" href="http://www.twitter.com/thedailydrawing"><img width="40" height="40" src="<?php echo get_template_directory_uri(); ?>/assets/footer_twitter.png" alt="Twitter" title="Twitter"/></a></li>
				<li><a target="_blank" href="http://instagram.com/thedailydrawing"><img width="40" height="40" src="<?php echo get_template_directory_uri(); ?>/assets/footer_instagram.png" alt="Instagram" title="Instagram"/></a></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><img width="40" height="40" src="<?php echo get_template_directory_uri(); ?>/assets/footer_rss.png" alt="RSS Feed" title="RSS Feed" /></a></li>
			</ul>
		</section>
	</footer>
	<div class="row">
		<section id="legal-line" class="large-12 columns">
		<h6>Obligatory Legal Line</h6>
		<p>&copy;2015 Lorie Ransom. All Rights Reserved.</p>
		</section>
	</div>
	
</div>
<a class="exit-off-canvas"></a>
</div>
</div>
<?php wp_footer(); ?>
<!-- <script type="text/javascript" src="/js/retina/retina.min.js"/></script> -->
 <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-52111927-1', 'auto');
	  ga('send', 'pageview');
	</script>
</body>
</html>







