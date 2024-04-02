<?php
/** 
 * Plugin Name: Featured Image Display Post
 * Description: This plugin adds a "Thumbnail" column to the post list in the WordPress backend, allowing you to see the featured image of each post at a glance.
 * Author: Meet Raj
 * Author URI: https://meetraj093.wordpress.com/
 * Version: 1.0.0
 * License: GPL2 or later
 * Text Domain: featured-image-display-post
 * Domain Path: /languages
 */

defined('ABSPATH') || exit;
function fe_thumbnail_column($defaults) {
    $thumbnail_column = ['thumbnail' => 'Thumbnail'];
    return $thumbnail_column + $defaults;
}
add_filter('manage_posts_columns', 'fe_thumbnail_column');
function display_thumbnail_column($column_name, $post_ID) {
    if ($column_name === 'thumbnail') {
        if (has_post_thumbnail($post_ID)) {
            echo get_the_post_thumbnail($post_ID, array(50, 50));
        } else {
            echo 'No Thumbnail';
        }
    }
}
add_action('manage_posts_custom_column', 'display_thumbnail_column', 10, 2);
