<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
				<div class="entry">
                	<?php if ( has_post_thumbnail() )the_post_thumbnail(array( 125,125 ),  array( 'alt' => get_the_title(), 'title' => get_the_title(), 'class' => 'thumby' )); ?>
                	<h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <?php $subtitle = get_post_meta($post->ID, 'subtitle', true); if ($subtitle) { ?><div id="subt"> <?php echo wp_kses($subtitle, array('br' => array())); ?> </div> <?php } ?>
					<?php the_excerpt() ?>
				</div>
                <a class="more-link" href="<?php the_permalink() ?>" >&raquo;</a>				
		</div>
<?php endwhile; endif; ?>
<?php include(TEMPLATEPATH . '/../egesto/wp-pagenavi.php'); if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
