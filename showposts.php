<?php


/**
 * @package showposts
 * @version 1.0
 */

/*
 Plugin Name: show posts
 Plugin URI:
 Description: another pointless plugin
 Author: Ariel s
 Version: 1.00.00
 Author URI: https://github.com/purple-potato
 */
function sp() {
    global $wpdb;
    
    /*$fiveposts = $wpdb->get_results('SELECT post_title FROM $wpdb->posts');
     foreach($fiveposts as $fivepost) {
     echo $fivepost->post_title;
     }*/
    $fivesdrafts = $wpdb->get_results("
	SELECT ID, post_title, guid 
	FROM $wpdb->posts
    
	 
		
	");
    $i;

    foreach($fivesdrafts as $fivesdraft) {
        if($i <= 5) {
            echo "<a href=\"" . get_permalink($fivesdraft->ID) . "\">";
            echo $fivesdraft->post_title . "</a>";
            echo "<br>";
            $i ++;
        }
    }
}

function mt_add_pages() {
    add_menu_page("show_posts", "show posts", "administrator", "show_posts", "sp");
}
add_action('admin_menu', 'mt_add_pages');

?>