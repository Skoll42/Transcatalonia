<?php get_header(); ?>

<?php if (have_posts()): the_post(); ?>

<?php include('block-video.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php get_footer(); ?>

