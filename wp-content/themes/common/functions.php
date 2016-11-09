<?php

function bt_include_php_files_from_dir($path, $recursive = false)
{
    if (is_dir($path)) {
        $dir = new \DirectoryIterator($path);

        foreach ($dir as $file) {
            if ($file->isDot()) continue; // Skip . and ..

            if ($recursive && $file->isDir()) {
                bt_include_php_files_from_dir($file->getPath().'/'.$file->getFilename(), $recursive);
            }

            if ($file->isFile()) {
                $file_extension = pathinfo($file->getFilename(), PATHINFO_EXTENSION);

                if ($file_extension === 'php') {
                    include_once $file->getPath().'/'.$file->getBasename();
                }
            }

        }
    }
}

function bt_register_widgets_from_dir($path)
{
    if (is_dir($path)) {
        $dir = new \DirectoryIterator($path);

        foreach ($dir as $file) {
            if ($file->isDot()) continue; // Skip . and ..

            if ($file->isFile()) {
                $file_extension = pathinfo($file->getFilename(), PATHINFO_EXTENSION);

                if ($file_extension === 'php') {
                    include_once $file->getPath().'/'.$file->getBasename();
                    $widget_class = sprintf('%s_Widget', $file->getBasename('.' . $file_extension));

                    add_action('widgets_init', function() use ($widget_class) {
                        register_widget($widget_class);
                    });
                }
            }

        }
    }
}


define('NIX_THEME_DIR', __DIR__);
define('NIX_THEME_PLUGINS_DIR', NIX_THEME_DIR . '/plugins');
define('NIX_THEME_MODULES_DIR', NIX_THEME_DIR . '/modules');

bt_include_php_files_from_dir(NIX_THEME_PLUGINS_DIR, true);

if (is_admin()) {
    foreach (glob(NIX_THEME_MODULES_DIR . '/*/admin', GLOB_ONLYDIR) as $folder) {
        bt_include_php_files_from_dir($folder);
    }
}

foreach (glob(NIX_THEME_MODULES_DIR . '/*/front', GLOB_ONLYDIR) as $folder) {
    bt_include_php_files_from_dir($folder);
}

foreach (glob(NIX_THEME_MODULES_DIR . '/*/widgets', GLOB_ONLYDIR) as $folder) {
    bt_register_widgets_from_dir($folder);
}




function nix_get_rev() {
    $rev_file = APP_PATH . 'rev.txt';
    return file_exists($rev_file) ? trim(file_get_contents($rev_file)) : time();
}


add_theme_support( 'post-thumbnails' );


//add_filter('nav_menu_css_class', function($classes, $item, $args, $depth) {
//    if (is_single() && strpos($item->url, '/news/') !== false) {
//        $classes[] = 'current-menu-item';
//    }
//    return $classes;
//}, 10, 4);

add_filter('previous_posts_link_attributes', function($attr) {
    return $attr . 'class="prev" ';
});

add_filter('next_posts_link_attributes', function($attr) {
    return $attr . 'class="next" ';
});

add_filter('nav_menu_css_class', function($classes, $item, $args, $depth) {
    if (in_array('menu-item-has-children', $classes)) {
        $classes[] = 'dropdown';
    }
    return $classes;
}, 10, 4);

add_filter('nav_menu_item_args', function($args, $item, $depth) {
    $args->link_after = '';
    if (in_array('menu-item-has-children', $item->classes)) {
        $args->link_after = ' <span class="caret"></span>';
    }
    return $args;
}, 10, 3);

class Tct_Walker_Nav_Menu extends Walker_Nav_Menu {
    public $search_form = '<div class="main-search">
											<a href="#" class="search-button"></a>
											<input type="search" name="search-field" placeholder="Искать...">
											<a href="#" class="cancel-button"></a>
										</div>';

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu dropdown-menu\">\n";
	}

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}


add_filter('wpcf7_form_class_attr', function($class) {
    $class .= ' form-member';
    return $class;
});



add_filter('nav_menu_link_attributes', function($atts, $item, $args, $depth) {
    if (in_array('menu-item-has-children', $item->classes)) {
        $atts['href'] = '#';
        $atts['class'] = 'dropdown-toggle';
        $atts['data-toggle'] = 'dropdown';
        $atts['role'] = 'button';
        $atts['aria-haspopup'] = 'true';
        $atts['aria-expanded'] = 'false';
    }
    return $atts;
}, 10, 4);

add_action( 'init', function() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
    register_nav_menu('footer-links',__( 'Footer Links' ));
} );

add_action('wp_enqueue_scripts', function () {

    if (is_page('about')) {
        wp_enqueue_script('template-about', get_stylesheet_directory_uri() . '/js/template-about.js', array('jquery'), nix_get_rev(), true);
    }
    if (is_home()) {
        wp_enqueue_script('pagination', get_stylesheet_directory_uri() . '/js/load-more.js', array('jquery'), true);
    }
});

function get_lowest_tour_price($id) {
    $lowest = 0;
    if ($id) {
        $prices = get_field('prices', $id);
        if (!empty($prices)) {
            $lowest = $prices[0]['price'];
            foreach ($prices as $price) {
                if($price['price'] < $lowest) {
                    $lowest = $price['price'];
                }
            }
        }

    }
    return $lowest;
}

function get_group_range($id) {
    $lowest = 1;
    $highest = 1;
    if ($id) {
        $prices = get_field('prices', $id);
        if (!empty($prices)) {
            $lowest = $prices[0]['number_of_tourists'];
            $highest = $prices[0]['number_of_tourists'];
            foreach ($prices as $price) {
                if($price['number_of_tourists'] < $lowest) {
                    $lowest = $price['number_of_tourists'];
                }

                if($price['number_of_tourists'] > $highest) {
                    $highest = $price['number_of_tourists'];
                }
            }
        }
    }
    return $lowest == $highest ? $lowest : $lowest . '-' . $highest;
}

function paging_nav() {
    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
        return;
    }

    $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

    // Set up paginated links.
    $links = paginate_links( array(
        'type' => 'array',
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $GLOBALS['wp_query']->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => __( '&larr;', 'itera' ),
        'next_text' => __( '&rarr;', 'itera' ),
    ) );

    if ( $links ) :
        $lis = '';
        $count = count($links);
        $i = 1;
        foreach ($links as $link) {
            $class_active = (strpos($link, '<span') === 0 && strpos($link, 'dots') === false) ? ' class="active"' : '';
            $id_last = ($i == $count) ? ' id="post-link-next"' : '';
            $lis .= '<li'. $class_active . $id_last . '>' . $link . '</li>';
            $i++;
        }

        ?>
        <ul class="pagination">
            <?php echo $lis; ?>
        </ul>
        <?php
    endif;
}


global $catalonia_have_posts_fix;
$catalonia_have_posts_fix = array();

function catalonia_have_posts($query = null) {
    global $catalonia_have_posts_fix;
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }
    $unique = md5($query->request);
    if (isset($catalonia_have_posts_fix[$unique]) && $catalonia_have_posts_fix[$unique] == true) {
        return false;
    }

    $have_posts = $query->have_posts();
    if (!$have_posts) {
        $catalonia_have_posts_fix[$unique] = true;
    }
    return $have_posts;
}

function catalonia_rewind_posts($query = null){
    global $catalonia_have_posts_fix;
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }
    $unique = md5($query->request);
    if (isset($catalonia_have_posts_fix[$unique]) && $catalonia_have_posts_fix[$unique] == true){
        unset($catalonia_have_posts_fix[$unique]);
    }
    $query->rewind_posts();
}

