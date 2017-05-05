<ul class="nav nav-tabs">
    <li class="active">
        <a href="#<?php the_ID(); ?>" data-toggle="tab" aria-expanded="true">
            <?php the_post_thumbnail(); ?>
            <div class="place-info">
                <div class="place"><?php the_field('tab_company_name'); ?></div>
                <div class="excerpt"><?php the_title(); ?></div>
            </div>
        </a>
    </li>
    <?php
        $args = [
            'post_type' => 'guides'
        ];
        $guides_query = new WP_Query($args);
    ?>
    <?php while ($guides_query->have_posts()) : $guides_query->the_post();
        $avatar = wp_get_attachment_image_src(get_field('avatar'), 'catalonia-avatar');
    ?>
        <li>
            <a href="#<?php the_ID(); ?>" data-toggle="tab" aria-expanded="true">
                <?php if(is_array($avatar) && !empty($avatar)) : ?>
                    <img src="<?php echo $avatar[0]; ?>">
                <?php endif; ?>
                <div class="place-info">
                    <div class="place"><?php the_title(); ?></div>
                    <div class="excerpt"><?php the_field('position'); ?></div>
                </div>
            </a>
        </li>
    <?php endwhile; ?>
    <?php catalonia_rewind_posts($guides_query); ?>
    <?php wp_reset_postdata(); ?>
</ul>