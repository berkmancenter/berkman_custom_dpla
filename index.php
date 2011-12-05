<?php get_header(); ?>
<div id="contentwrapper">
	<?php if (is_front_page()) : ?>        
	<div class="anythingSlider">        
      	<div class="wrapper">
            <?php include (TEMPLATEPATH . '/slider.php'); ?> 
        </div>          
	</div> 
    <div id="frontwidgets">
    	<?php include (TEMPLATEPATH . '/frontleftwidget.php'); ?>
    	<?php include (TEMPLATEPATH . '/frontrightwidget.php'); ?>
    </div>
 <?php else : ?>
    
	<div id="content">
    	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<div class="entry">
                	<?php if ( has_post_thumbnail() )the_post_thumbnail(array( 125,125 ),  array( 'alt' => get_the_title(), 'title' => get_the_title(), 'class' => 'thumby' )); ?>
                	<h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <?php $subtitle = get_post_meta($post->ID, 'subtitle', true); if ($subtitle) { ?><div id="subt"> <?php echo $subtitle; ?> </div> <?php } ?>
	 				<?php the_excerpt() ?>
                    <?php if ( has_post_thumbnail() ): ?><div style="clear: both"></div><?php endif; ?>
				</div>
                <a class="more-link" href="<?php the_permalink() ?>" >&raquo;</a>				
		</div>
            
		<?php endwhile; ?>

		<?php include('wp-pagenavi.php'); if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

	<?php else : ?>

		
		<p class="center">You don't have any posts yet.</p>
		

	<?php endif; ?>	
</div>
<?php get_sidebar(); ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>
