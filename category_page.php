<?php 
/*
 * Template Name: Category Page
 */
$page_id = get_the_ID();
?>
<?php get_header(); ?>
<div id="contentwrapper" class="<?php the_category_unlinked(); ?>">
	<div id="content">
        <?php get_template_part('content'); ?>
        <?php 
        rewind_posts();
        $args = array('paged' => get_query_var('paged'));
        $master_categories = get_post_custom_values('master_category'); 
        $master_category = $master_categories[0];
        if ($master_category)
            $args['category_name'] = $master_category;
        $post_types = get_post_custom_values('post_type'); 
        $post_type = $post_types[0];
        if ($post_type)
            $args['post_type'] = $post_type;
        query_posts($args);
        ?>
        <?php get_template_part('blog_list'); ?>
        <?php edit_post_link('Edit this entry.', '<p>', '</p>', $page_id); ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
