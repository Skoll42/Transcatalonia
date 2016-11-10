<?php
/*
Template Name: Search Page
*/
get_header();
$filter = (!empty($_GET['filter']) ? $_GET['filter'] : 'tours');
global $wp_query;
$wp_query->set('post_type', $filter);
$wp_query->get_posts();
?>

<div class="search">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="search-body">
                    <form method="get" class="search-section" action="<?php echo esc_url( home_url( '/' ) ) ?>">
                        <a href="javascript:void(0);" class="search-button"></a>
                        <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="Ключевое слово">
                        <a href="javascript:void(0);" class="cancel-button"></a>
                        <div class="clearfix"></div>
                        <div class="divider"></div>
                        <div class="filter">
                            <div class="filter-title">Поиск ведется в разделе:</div>
                            <div class="filter-item">
                                <input type="radio" id="excursion-filter" name="filter" value="tours" <?php echo ($filter == 'tours' ? 'checked' : ''); ?>>
                                <label for="excursion-filter">Экскурсии</label>
                                <div class="check"></div>
                            </div>
                            <div class="filter-item">
                                <input type="radio" id="blog-filter" name="filter" value="post" <?php echo ($filter == 'post' ? 'checked' : ''); ?>>
                                <label for="blog-filter">Блог</label>
                                <div class="check"></div>
                            </div>
                        </div>
                    </form>
                    <div class="filter">
                        <div class="search-items">
                            <?php if($wp_query->have_posts()) : ?>
                                <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                    <div class="item">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                        <div class="search-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </div>
                                        <div class="search-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                    <div class="item-divider"></div>
                                    <?php endwhile; ?>
                            <?php else: ?>
                                <div class="no-results">
                                    По вашему запросу не было найдено результатов.
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>