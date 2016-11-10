<?php
/*
Template Name: Feedback Page
*/
?>

<?php get_header(); ?>
<div class="feedback">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="moments-slider">
                    <div class="slider-title">Фрагменты с разных сайтов и соцсетей</div>
                    <div id="moments-carousel" class="carousel slide" data-ride="carousel">
                        <?php
                            $args = [
                                'post_type' => 'feedback',
                                'posts_per_page' => -1
                            ];
                            $feedback_query = new WP_Query($args);
                            $curPostNum = 0;
                        ?>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php if($feedback_query->have_posts()) : ?>
                                <?php while ($feedback_query->have_posts()) : $feedback_query->the_post(); $curPostNum++; ?>
                                    <div class="item <?php if($curPostNum == 1) : ?>active<?php endif; ?>">
                                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="slider image" />
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <?php wp_reset_query($feedback_query); ?>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#moments-carousel" role="button" data-slide="prev">
                            <span class="left-arrow"></span>
                        </a>
                        <a class="right carousel-control" href="#moments-carousel" role="button" data-slide="next">
                            <span class="right-arrow"></span>
                        </a>
                    </div>
                    <div class="line-divider"></div>
                    <div class="reviews">Отзывы</div>
                    <div class="reviews-list">
                        <?php comments_template( '', true ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
