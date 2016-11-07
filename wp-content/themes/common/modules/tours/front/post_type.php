<?php

add_action('init', function() {

    register_post_type( 'tours',
        array(
            'labels' => array(
                'name' => __( 'Tours' ),
                'singular_name' => __( 'Tour' ),
                'add_new' => _x('Add New', 'tours'),
                'add_new_item' => __("Add New Tour"),
                'edit_item' => __("Edit Tour"),
                'new_item' => __("New Tour"),
                'view_item' => __("View Tour"),
                'search_items' => __("Search Tours"),
                'not_found' =>  __('No tours found'),
                'not_found_in_trash' => __('No tours found in Trash'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'revisions',
            ),
            /*
            'show_ui' => true,
            'publicly_queryable' => true,
            'query_var' => true,*/
        )
    );
});

function is_event() {
    return strpos($_SERVER['REQUEST_URI'], '/tours') !== false;
}