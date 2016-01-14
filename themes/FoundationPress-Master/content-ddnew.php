<?php
/**
* The default template for displaying content. Used for index/archive/search.
*
* @subpackage FoundationPress
* @since FoundationPress 1.0
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-container">
		<figure>
			<?php 
			if ( has_post_thumbnail() ) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
				//adding rel="lightbox-0" to get responsive lightbox plugin to work
				echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="lightbox-0">';
				echo get_the_post_thumbnail(); 
				echo '</a>';
			}
			?>
			<?php //echo get_the_post_thumbnail(); ?>
		</figure>
		<?php if(get_post(get_post_thumbnail_id())->post_excerpt){
				echo '<figcaption>'.get_post(get_post_thumbnail_id())->post_excerpt.'</figcaption>';
		}?>
		<header>
			<h1 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
		</header>
		<h2 class="day-date"><span class="inline-date"><?php FoundationPress_entry_meta(); ?></span>&nbsp;
		<time class="date-of-drawing"><?php
			$day = get_post_meta( get_the_ID(), '_day', true );
			// check if the custom field has a value
			if( ! empty( $day) ) {
			echo $day.'&nbsp;&nbsp;||&nbsp;';
		} ?>
		</time>
		<?php $categories = get_the_category();
		$separator = ', ';
		$output = '';
		if($categories){
			$output = 'Category: ';
			foreach($categories as $category) {
					if ($category->cat_name == 'Uncategorized'){
						$output .= '';
					} else {
						$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) .'">'.$category->cat_name.'</a>'.$separator;
					}
				}
			if ($output == ''){}
				else
				{
					echo trim($output, $separator);
				}
		}else{
			echo 'Category: None ';
		}
		?>
		</h2>
		<?php the_content(__('Continue reading...', 'FoundationPress')); ?>
	</div>
	<footer>
		<div class="comment-categories"><a href="<?php comments_link(); ?>"><span class="comments">Comments </span><?php comments_number( '', '<span class="number">1</span>', '<span class="comments">Comments: </span><span class="number">%</span>' ); ?></a></div>
		<?php /**ditching tags for categories*/?>
	</footer>
</article>
<?php
global $postCount;
++$postCount;
?>
