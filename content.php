<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
        <div class="entry">
            <?php if ( has_post_thumbnail() )the_post_thumbnail(array( 650,999 ),  array( 'alt' => get_the_title(), 'title' => get_the_title(), 'class' => 'singlethumb' )); ?>
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

                /* translators: used between list items, there is a space after the comma */
                $tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
                if ( '' != $tag_list ) {
                    $utility_text = __( 'Posted by <a href="%6$s">%5$s</a> on %7$s in %1$s and tagged %2$s.', 'twentyeleven' );
                } elseif ( '' != $categories_list ) {
                    $utility_text = __( 'Posted by <a href="%6$s">%5$s</a> on %7$s in %1$s.', 'twentyeleven' );
                } else {
                    $utility_text = __( 'Posted by <a href="%6$s">%5$s</a> on %7$s', 'twentyeleven' );
                }

                if (!in_array(get_post_type( get_the_ID() ), array('page', 'category-page'))): ?>
                <div class="tagline">
                <?php 
                    printf(
                        $utility_text,
                        $categories_list,
                        $tag_list,
                        esc_url( get_permalink() ),
                        the_title_attribute( 'echo=0' ),
                        get_the_author(),
                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                        get_the_date()
                    );
                ?>
                </div>
            <?php endif; ?>
            <?php $subtitle = get_post_meta($post->ID, 'subtitle', true); if ($subtitle) { ?><div id="subt"> <?php echo $subtitle; ?> </div> <?php } ?>
            <?php the_content('read more'); ?>

            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            <?php if (!in_array(get_post_type( get_the_ID() ), array('page', 'category-page'))) { comments_template(); } ?>
        </div>
    </div>
<?php endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
