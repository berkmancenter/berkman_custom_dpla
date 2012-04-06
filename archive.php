<?php get_header(); ?>

<div id="contentwrapper">
	<div id="content">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>


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

        <?php include(TEMPLATEPATH . '/../egesto/wp-pagenavi.php'); if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>

	<?php endif; ?>

	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
