<?php
global $wp_query;
while ( catalonia_have_posts($wp_query) ) :
    $wp_query->the_post();
    ?>
    <div class="column post-infinite-item">
        <article>
            <a class="blog-post-entry" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="blog image" />
                <div class="info-block">
                    <div class="blog-title"><?php the_title(); ?></div>
                    <div class="blog-info">
                        <span class="date"><?php echo get_the_date('j F Y'); ?></span>
                        <!-- span class="comments"> | 4 комментария</span-->
                    </div>
                    <div class="blog-excerpt"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read-button">Читать</a>
                </div>
            </a>
        </article>
    </div>
<?php endwhile; ?>