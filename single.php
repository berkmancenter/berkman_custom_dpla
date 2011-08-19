<?php get_header(); ?>
<div id="contentwrapper" class="<?php the_category_unlinked(); ?>">
<div id="content">
<?php get_template_part('content'); ?>

</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
