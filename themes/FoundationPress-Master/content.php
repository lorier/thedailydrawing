<?php
/**
* The default template for displaying content. Used for both index/archive/search.
*
* @subpackage FoundationPress
* @since FoundationPress 1.0
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2 class="day-number entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2><h2 class="date-of-drawing"><?php FoundationPress_entry_meta(); ?></h2>
	</header>
	<div class="inner-container">
		<?php the_content(__('Continue reading...', 'FoundationPress')); ?>
	</div>
	<footer>
		<div class="comment-categories">
			<div><a href="<?php comments_link(); ?>"><span class="comments">Comments </span><?php comments_number( '', '<span class="number">1</span>', '<span class="number">%</span>' ); ?></a></div>
			<?php /**ditching tags for categories*/?>
			<div class="categories-group"><?php
					$categories = get_the_category();
					$separator = ' ';
					$output = '';
					if($categories){
						foreach($categories as $category) {
								if ($category->cat_name == 'Uncategorized'){} else {
									$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
								}
							}
						if ($output == ''){}
							else
							{
								/**need to add code to match pluralization of Categories to number of results*/
								echo ('<span class="categories">&nbsp;||&nbsp;&nbsp;Categories:&#160;&#160;</span>');
								echo trim($output, $separator);
						}
					}
			?></div>
		</div>
	</footer>
</article>
<!-- <div class="post-connector"></div>
-->
<?php
global $postCount;
++$postCount;
?>