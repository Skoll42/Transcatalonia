<?php get_header();?>

<?php if ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'tour' ); ?>
<?php endif; ?>

<?php get_footer(); ?>