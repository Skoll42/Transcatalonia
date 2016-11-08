<?php get_header(); ?>

<?php global $wp_query; if ( $wp_query->have_posts() ) : ?>
    <div class="blog">
        <div class="container">
            <div class="row">
                <?php get_template_part('infinite-item'); ?>
            </div>
            <div class="col-xs-12 text-center">
                <?php paging_nav(); ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="container">
        <div class="row">
            <h2 class="nothing-found">Nothing found!</h2>
        </div>
    </div>
<?php endif;?>

<?php get_footer(); ?>
