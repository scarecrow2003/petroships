<?php if(have_posts()) : ?>
    <div class="items-wrapper">
    <?php while(have_posts()) : the_post(); global $post; ?>
        <div <?php post_class() ?>>

            <?php if(has_post_thumbnail() && get_post_format() != 'image' && siteorigin_setting('display_featured_image')) : ?>
                <div class="featured-image">
                    <a href="<?php echo get_post_meta($post->ID, 'url_link', true); ?>">
                        <?php the_post_thumbnail(null, array('class' => 'main-image desktop')) ?>
                        <?php the_post_thumbnail('post-thumbnail-mobile', array('class' => 'main-image mobile')) ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
    </div>
<?php endif; ?>