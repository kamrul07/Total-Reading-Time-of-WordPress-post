<?php
/*
Plugin Name: Total Reading Time of WP Post
Plugin URI: https://shuvo.info
Description: It is a simple plugin which will show the total reading time of a post.It will calculate the total reading time of a post in the measure of 200 words per minutes.
Version:1.0
Author: Kamrul Hasan
Author URI: https://www.facebook.com/ajob.shuvo
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
	$word_measure = apply_filters("trtwp_word_per_min",get_option('trtwp_reading_per_minute'));
	$total_min_needed = floor($total_words/$word_measure);
	$total_sec_needed = floor($total_words%$word_measure/($word_measure/60));
	$min_title = apply_filters("trtwp_label_of_minutes",__("Minutes","trtwp"));
	$sec_title = apply_filters("trtwp_label_of_seconds",__("Seconds","trtwp"));
	$content .= sprintf("<div class='trt_area'><%s>%s <span class='total-min'>%s %s</span> <span class='total_sec'>%s  %s</span><%s></div>",$tag_of_title,$label_of_title,$total_min_needed,$min_title,$total_sec_needed,$sec_title,$tag_of_title);
	return $content;
	
	
}

//settings page

add_action("admin_menu","trtwp_settings_option");

function trtwp_settings_option(){

	add_options_page('Reading time setting page', 'Total reading time', 'manage_options', 'trtwp_setting', 'trtwp_options_page');

}

add_action("admin_init","trtwp_settings_options");

function trtwp_settings_options(){
	
	add_settings_section("trtwp_section", __("Reading time setting options","trtwp"),"trtwp_section_callback","trtwp_setting_options");
	add_settings_field("trtwp_reading_per_minute",__("Avarage reading time word per minute","trtwp"),"trtwp_set_reading_per_min","trtwp_setting_options","trtwp_section");
	
	
	register_setting("trtwp_setting_options","trtwp_reading_per_minute",array('sanitize_callback' => 'esc_attr'));
	
}


function trtwp_options_page(){
	
	echo "<form action='options.php' method='post'>
			<h2 class='total_reading_time_page_title' style='font-size:36px'>".__('Total Reading Time of WP Post',"trtwp")."</h2>";
	
				settings_fields( 'trtwp_setting_options' );
				do_settings_sections( 'trtwp_setting_options' );
				submit_button();
	
	echo "</form>";
	
}

function trtwp_section_callback(){

}
function trtwp_set_reading_per_min(){
	
	$reading_per_hour_rate = get_option('trtwp_reading_per_minute');
	printf("<input type='text' id='%s' value='%s' name='%s' /> ","trtwp_reading_per_minute",$reading_per_hour_rate,"trtwp_reading_per_minute");
}