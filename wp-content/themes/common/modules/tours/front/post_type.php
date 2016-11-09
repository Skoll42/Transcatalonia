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
                'thumbnail',
                'comments'
            )
        )
    );

    register_post_type( 'guides',
        array(
            'labels' => array(
                'name' => __( 'Guides' ),
                'singular_name' => __( 'Guide' ),
                'add_new' => _x('Add New', 'guides'),
                'add_new_item' => __("Add New Guide"),
                'edit_item' => __("Edit Guide"),
                'new_item' => __("New Guide"),
                'view_item' => __("View Guide"),
                'search_items' => __("Search Guides"),
                'not_found' =>  __('No guides found'),
                'not_found_in_trash' => __('No guides found in Trash'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor'
            )
        )
    );
});

function is_event() {
    return strpos($_SERVER['REQUEST_URI'], '/tours') !== false;
}