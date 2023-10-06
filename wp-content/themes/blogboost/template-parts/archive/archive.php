<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogboost
 * @since Blogboost 1.0.0
 */
if ( absint(blogboost_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}