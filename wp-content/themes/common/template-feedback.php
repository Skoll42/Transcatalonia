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
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/image-slider-1.png" alt="slider image">
                            </div>
                            <div class="item">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/image-slider-1.png" alt="slider image">
                            </div>
                        </div>

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
