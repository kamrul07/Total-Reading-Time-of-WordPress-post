=== Total Reading Time of wordPress Post ===
Contributors:kamrul0424
Tags: total-reading-time,wp-posts
Requires at least: 4.2
Tested up to: 5.3.2
Requires PHP: 5.4
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

A simple plugin to show the total reading time at the end of the post content.


== Description ==
It is a simple plugin which will show the total reading time of a post.It will calculate the total reading time of a post in the measure of 200 words per minutes.

It is a totally open source project.Here is the <a href="https://themefic.com/modules/beaf/" target="_blank">Github link</a>


### How It works:

Just install the plugin the total reading time will be shown at the bottom of the content.

### Filter lists

# Change the title:

<pre>
add_filter("trtwp_label_of_title","your-function-name");
</pre>

# Change the word count per minute base value(currently it is 200 words per minutes):

<pre>
add_filter("trtwp_word_per_min","your-function-name");
</pre>

# Other filters

<pre>
/*Change the word "Minutes"
add_filter("trtwp_label_of_minutes","your-function-name");


/*Change the word "Seconds"
add_filter("trtwp_label_of_seconds","your-function-name");

/*Change the markup tag.default is "p"
add_filter("trtwp_label_of_seconds","your-function-name");

</pre>


== Frequently Asked Questions ==

= What is the purpose of this simple plugin? =

It is a very simple plugin.I created this for my practicing purpose and thought that it can save some time who need this easy but very cool feature at their post.


== Installation ==
1. Download and unzip the plugin. Upload the unzipped folder to the wp-contents/plugins folder of your WordPress installation.
2. Active the plugin from the WordPress Plugins administration page.
3. OR, Go to WP admin panel, click 'Plugins' -> 'Add new'. In the search input box, type 'Total Reading Time of wordPress Post'.
4. Install and activate the plugin.

== Screenshots ==
1. screenshot-1.png
2. screenshot-2.png
3. screenshot-3.png
4. screenshot-4.png

== Changelog ==
1.0.0
