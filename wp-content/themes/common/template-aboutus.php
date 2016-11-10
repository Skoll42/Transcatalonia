<?php
/*
Template Name: About us Page
*/
?>

<?php get_header(); ?>
<div class="excursion about">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-4">
                <div class="tabs-left">
                    <?php get_template_part('block', 'about-us-tabs'); ?>
                </div>
            </div>
            <div class="col-xs-9 col-sm-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="<?php the_ID(); ?>">
                        <div class="excursion-body">
                            <div class="excursion-content">
                                <div class="about-title"><?php the_field('about_us_services_title'); ?></div>
                                <?php the_field('about_us_description'); ?>
                                <?php get_template_part('block', 'about-us-services'); ?>
                                <?php the_field('service_summary'); ?>
                                <div class="condition-title"><?php the_field('conditions_title'); ?></div>
                                <?php the_field('conditions'); ?>
                                <div class="payment-title"><?php the_field('payment_title'); ?></div>
                                <?php the_field('payment_description'); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $args = [
                        'post_type' => 'guides'
                    ];
                    $guides_query = new WP_Query($args);
                    ?>
                    <?php while ($guides_query->have_posts()) : $guides_query->the_post(); ?>
                        <div class="tab-pane" id="<?php the_ID(); ?>">
                            <div class="excursion-body">
                                <div class="excursion-content">
                                    <div class="about-title"><?php the_title(); ?></div>
                                    <div class="about-phone"><?php the_field('phone_number'); ?></div>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
