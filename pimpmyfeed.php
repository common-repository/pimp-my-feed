<?php
/*
Plugin Name: Pimp my Feed
Plugin URI: http://www.pierre-markuse.de/pimp-my-feed-wordpress-plugin/
Description: Pimp up your feed with additional information before and after your posts. Very easy to use. Useful for copyright notices, disclaimers, ads...
Version: 0.1.1
License: GPLv3
Author: Pierre Markuse
Author URI: http://www.pierre-markuse.de/
Min WP Version: 1.5
Max WP Version: 2.5.1
*/

include 'conf.php';

$before = get_option('before');
$behind = get_option('behind');

add_filter('the_content', 'add_messages');

function add_messages( $content ) {
	global $before;
	global $behind;    
     if( is_feed() ) {
        return $before.$content.$behind;
          } else {
        return $content;
    }
}
?>