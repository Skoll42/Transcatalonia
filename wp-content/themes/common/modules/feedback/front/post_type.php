<?php

add_action('init', function() {

    register_post_type( 'feedback',
        array(
            'labels' => array(
                'name' => __( 'Feedback' ),
                'singular_name' => __( 'Feedback' ),
                'add_new' => _x('Add New', 'feedback'),
                'add_new_item' => __("Add New Feedback"),
                'edit_item' => __("Edit Feedback"),
                'new_item' => __("New Feedback"),
                'view_item' => __("View Feedback"),
                'search_items' => __("Search Feedback"),
                'not_found' =>  __('No feedback found'),
                'not_found_in_trash' => __('No feedback found in Trash'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'thumbnail',
            )
        )
    );
});