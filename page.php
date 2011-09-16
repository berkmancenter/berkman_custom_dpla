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
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">	
			<div class="entry">
            	<?php if ( has_post_thumbnail() )the_post_thumbnail(array( 650,999 ),  array( 'alt' => get_the_title(), 'title' => get_the_title(), 'class' => 'singlethumb' )); ?>
                <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <?php $subtitle = get_post_meta($post->ID, 'subtitle', true); if ($subtitle) { ?><div id="subt"> <?php echo wp_kses($subtitle, array('br' => array())); ?> </div> <?php } ?>
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>
	<?php get_sidebar(); ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
