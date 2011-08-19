<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
        <div class="entry">
            <?php if ( has_post_thumbnail() )the_post_thumbnail(array( 650,999 ),  array( 'alt' => get_the_title(), 'title' => get_the_title(), 'class' => 'singlethumb' )); ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

                /* translators: used between list items, there is a space after the comma */
                $tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
                if ( '' != $tag_list ) {
                    $utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
                } elseif ( '' != $categories_list ) {
                    $utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
                } else {
                    $utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
                }

                printf(
                    $utility_text,
                    $categories_list,
                    $tag_list,
                    esc_url( get_permalink() ),
                    the_title_attribute( 'echo=0' ),
                    get_the_author(),
                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
                );
            ?>
            <?php $subtitle = get_post_meta($post->ID, 'subtitle', true); if ($subtitle) { ?><div id="subt"> <?php echo $subtitle; ?> </div> <?php } ?>
            <?php the_content('read more'); ?>

            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            <?php comments_template(); ?>
        </div>
    </div>
<?php endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
