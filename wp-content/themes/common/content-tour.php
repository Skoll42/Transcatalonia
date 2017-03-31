<?php
    $link = get_the_permalink();
    $title = get_the_title();
    $excerpt = get_the_excerpt();
    $thumbnail = get_the_post_thumbnail();
    $thumbnail_url = get_the_post_thumbnail_url();
    $duration = get_field('duration');
?>

<div class="excursion">
    <div class="container">
        <div class="row">
            <div class="modal fade" id="order-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="order-popup-header">
                        <div class="order-image"></div>
                        <div class="order-info">
                            <div class="order-title"></div>
                            <div class="order-excerpt"></div>
                            <div class="order-duration"></div>
                        </div>
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="218" title="Order tour"]'); ?>
                </div>
            </div>
            <div class="col-xs-3 col-sm-4">
                <div class="tabs-left">
                    <?php get_template_part('block', 'tours'); ?>
                </div>
            </div>
            <div class="col-xs-9 col-sm-8">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="excursion-body">
                            <div class="main-image">
                                <img src="<?php echo $thumbnail_url; ?>">
                            </div>
                            <div class="excursion-content">
                                <div class="place">
                                    <span class="name"><?php echo $title; ?></span>
                                    <span class="excerpt"><?php echo $excerpt; ?></span>
                                </div>
                                <a class="order-button" href="#"
                                   data-toggle="modal"
                                   data-target="#order-popup"
                                   data-thumbnail="<?php if ($thumbnail_url) : echo $thumbnail_url; endif; ?>"
                                   data-excerpt="<?php echo $excerpt; ?>"
                                   data-duration="<?php echo $duration; ?>"
                                   data-title="<?php echo $title; ?>">Заказать тур</a>
                                <?php get_template_part('block', 'prices'); ?>
                                <div class="duration">Продолжительность: <?php echo $duration; ?></div>
                                <div class="tourists-amount"><?php echo 'Группа: ' . get_group_range(get_the_ID()) . ' человек'; ?></div>
                                <?php the_content(); ?>
                                <a class="order-button" href="#"
                                   data-toggle="modal"
                                   data-target="#order-popup"
                                   data-link="<?php echo $link; ?>"
                                   data-thumbnail="<?php if ($thumbnail_url) : echo $thumbnail_url; endif; ?>"
                                   data-excerpt="<?php echo $excerpt; ?>"
                                   data-duration="<?php echo $duration; ?>"
                                   data-title="<?php echo $title; ?>">Заказать тур</a>
                                <div class="clearfix"></div>

                                <?php comments_template( '', true ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popup slider -->
<div class="modal fade excursion-slider" id="slider-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div id="popup-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox"></div>
            <a class="left carousel-control" href="#popup-carousel" role="button" data-slide="prev">
                <span class="left-arrow"></span>
            </a>
            <a class="right carousel-control" href="#popup-carousel" role="button" data-slide="next">
                <span class="right-arrow"></span>
            </a>
        </div>
    </div>
</div>
