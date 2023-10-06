<?php
/**
 * Displays progressbar
 *
 * @package Blogboost
 */

$show_progressbar = blogboost_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = blogboost_get_option( 'progressbar_position' );
	echo '<div id="blogboost-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;
