<?php
/*
Plugin Name: Total Reading Time of wordPress Post
Plugin URI: https://shuvo.info
Description: It is a simple plugin which will show the total reading time of a post.It will calculate the total reading time of a post in the measure of 200 words per minutes.
Version:1.0
Author: Kamrul Hasan
Author URI: https://shuvo.info
License: GPLv2 or later
Text Domain:trtwp
Domain Path: /languages/
*/
	
	function trtwp_load_textdomain() {
		load_plugin_textdomain( 'trtwp', false, dirname( __FILE__ ) . "/languages" );
	}
	
	add_action( "plugins_loaded", 'trtwp_load_textdomain' );

add_filter("the_content","trtwp_total_reading_time");
function trtwp_total_reading_time($content){
	
	$striped_words = strip_tags($content);
	$total_words = str_word_count($striped_words);
	$label_of_title = apply_filters("trtwp_label_of_title",__("Reading time: ","trtwp"));
	$tag_of_title = apply_filters("trtwp_tag", "p");
	$word_measure = apply_filters("trtwp_word_per_min","200");
	$total_min_needed = floor($total_words/$word_measure);
	$total_sec_needed = floor($total_words%$word_measure/($word_measure/60));
	$min_title = apply_filters("trtwp_label_of_minutes",__("Minutes","trtwp"));
	$sec_title = apply_filters("trtwp_label_of_seconds",__("Seconds","trtwp"));
	$content .= sprintf("<div class='trt_area'><%s>%s <span class='total-min'>%s %s</span> <span class='total_sec'>%s  %s</span><%s></div>",$tag_of_title,$label_of_title,$total_min_needed,$min_title,$total_sec_needed,$sec_title,$tag_of_title);
	return $content;
	
	
}



