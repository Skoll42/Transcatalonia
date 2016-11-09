<?php
$current_post_id = get_the_ID();
$args = [
    'post_type' => 'tours',
    'orderby'   => 'menu_order',
    'order'     => 'ASC',
];
$tours_query = new WP_Query($args);
?>
<ul class="nav nav-tabs">
<?php while ($tours_query->have_posts()) : $tours_query->the_post(); ?>
    <?php
    $id = get_the_ID();
    $link = get_the_permalink();
    $title = get_the_title();
    $excerpt = get_the_excerpt();
    $thumbnail = get_the_post_thumbnail();
    $thumbnail_url = get_the_post_thumbnail_url();
    $is_active = $current_post_id == $id;
    ?>
    <li <?php echo ($is_active ? 'class="active"' : ''); ?>>
        <a href="<?php echo $is_active ? "javascript:void(0);" : $link; ?>">
            <img src="<?php echo $thumbnail_url; ?>">
            <div class="place-info">
                <div class="place"><?php echo $title; ?></div>
                <div class="excerpt"><?php echo $excerpt; ?></div>
                <div class="price"><?php echo 'от ' . get_lowest_tour_price($id) . ' $'; ?></div>
            </div>
        </a>
    </li>
<?php endwhile; ?>
</ul>