<?php
    /*
    Plugin Name: Sticky Cheese Gallery
    Plugin URI: http://wordpress.org/extend/plugins/sticky-cheese-gallery/
    Description: Sticks a nice looking thumbnail gallery to your post content.
    Version: 0.0.1
    Author: Mark de Jong
    Author URI: http://www.markdejong.com/
    License: GPLv2
    */
    
    /*
	License Information

    Sticky Cheese Gallery
    Copyright (C) 2013 Mark de Jong (mdejong83@gmail.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    */

//if ( is_admin() )
//    require_once dirname( __FILE__ ) . '/admin-manager.php';

function scg_admin_actions() {
    add_options_page('Sticky Cheese', 'Sticky Cheese Gallery', 'administrator', 'scg_display_main', 'scg_admin');
}
add_action('admin_menu','scg_admin_actions');

function scg_admin() {
    include('admin-manager.php');
}

function scg_add_image_size() {
    add_image_size('scg_thumbnail', 160, 200, true);
}
add_action('admin_init','scg_add_image_size');

function scg_showgallery() {
    //Connect to DB
    global $wpdb, $post;
    //$scg_db = new wpdb(get_option('scg_dbuser'),get_option('scg_dbpwd'),get_option('scg_dbname'),get_option('scg_dbhost'));
    //$scg_db = new wpdb(YOURLS_DB_USER, YOURLS_DB_PASS, YOURLS_DB_NAME, YOURLS_DB_HOST);
    //$attachments = $wpdb->get_results();
    
    
    //var_dump($attachments);
    
    $output = '';
    //for($i=1; $i<$max_nr; $i++){
        //Get a random thumb
        //$thumb_count = 0;
        //while($thumb_count == 0) {
        //    $thumb_id = rand(0,30);
            //$thumb_count = $wpdb->get_results("SELECT COUNT(*) FROM posts WHERE post_status=publish"); //ID=$thumb_id AND
            //$attachments = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_parent=".$post->ID." AND post_status = 'inherit' AND post_type = 'attachment' ORDER BY post_date DESC LIMIT ".get_option('scg_thumbs_nr'));
        //}
        
        add_action('','');
        
        $attachments = get_posts(array(
            "post_parent"       =>  $post->ID,
            "post_type"         =>  'attachment',
            "orderby"           =>  'post_date',
            "post_status"       =>  'inherit',
            "posts_per_page"    =>  get_option('scg_thumbs_nr'),
            "post_mime_type"    =>  'image'
        ));
        foreach($attachments as $img) {
            //var_dump($img);
            $output .= '<pre>';
            $output .= $img->guid .'<br/>';
            $output .= $img->post_title;
            $output .= '</pre>';
            $output .= wp_get_attachment_image($img->ID, 'scg_thumbnail');
        }
        
        //Get thumb url, title and caption
        //$thumb_url      = $scg_db->get_var("SELECT guid FROM posts WHERE ID=$thumb_id");
        //$thumb_title    = $scg_db->get_var("SELECT post_title FROM posts WHERE ID=$thumb_id");
        //$thumb_caption  = $scg_db->get_var("SELECT post_excerpt FROM posts WHERE ID=$thumb_id");
        
    //}
    return $output;
}










