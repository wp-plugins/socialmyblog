<?php 
	/*
	Plugin Name: Social My Blog
	Description: A simple and easily adjustable social plugin for your blog to help you reach more visitors, includes facebook, google+, twitter, pinterest and more.
	Version: 1.0.0
	Author: Gavin Moore
	License: GPL2
	*/
	
	/*  
		Copyright 2011  Gavin Moore  (email : gmoorealb@yahoo.ca)
	
	    This program is free software; you can redistribute it and/or modify
	    it under the terms of the GNU General Public License, version 2, as 
	    published by the Free Software Foundation.
	
	    This program is distributed in the hope that it will be useful,
	    but WITHOUT ANY WARRANTY; without even the implied warranty of
	    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	    GNU General Public License for more details.
	
	    You should have received a copy of the GNU General Public License
	    along with this program; if not, write to the Free Software
	    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/
	
	//Add plugin options page to settings tab
	
	
	function add_css() {
		echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/socialmyblog-media/style.css" />' . "\n";
	}
	
	
	//Adds Social Javascript
	function add_social_js() { ?>
		
		<div id="fb-root"></div>
		<script>
			//facebook JS SDK
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
 	
		  	//Twitter JS SDK
		  	!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
		  	
		  	//Stumbleupon JS SDK
		  	(function() { 
				var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true; 
				li.src = 'https://platform.stumbleupon.com/1/widgets.js'; 
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s); 
			})();
			
			//Pintrest JS SDK
			(function() {
			    window.PinIt = window.PinIt || { loaded:false };
			    if (window.PinIt.loaded) return;
			    window.PinIt.loaded = true;
			    function async_load(){
			        var s = document.createElement("script");
			        s.type = "text/javascript";
			        s.async = true;
			        s.src = "http://assets.pinterest.com/js/pinit.js";
			        var x = document.getElementsByTagName("script")[0];
			        x.parentNode.insertBefore(s, x);
			    }
			    if (window.attachEvent)
			        window.attachEvent("onload", async_load);
			    else
			        window.addEventListener("load", async_load, false);
			})();
		</script>
		<script type="text/javascript" ;="" src="http://apis.google.com/js/plusone.js"></script> 
		<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
	<?php }
	
	
	//Adds Social Media Buttons to posts & pages
	function add_social_buttons($content) {
		$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		
		$social .= '<div id="socialmyblog-buttons">';
		
		//Facebook Button
		$social .= '<div class="socialmyblog-button"><div class="fb-like" data-send="true" data-layout="button_count" data-show-faces="false"></div></div>';
		
		//Twitter Send
		$social .= '<div class="socialmyblog-button"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a></div>';
		
		//Google+ Button
		$social .= '<div class="socialmyblog-button googleplus"><g:plusone size="medium"></g:plusone></div>';
		
		//Linkedin Button
		$social .= '<div class="socialmyblog-button"><script type="IN/Share" data-counter="right"></script></div>';
		
		//Stumbleupon Button
		$social .= '<div class="socialmyblog-button stumble"><su:badge layout="1"></su:badge></div>';
		
		//Pintrest Button
		$social .= '<div class="socialmyblog-button pintrest"><a href="http://pinterest.com/pin/create/button/?url='. urlencode(get_permalink($post->ID)).'&media='.$pinterestimage[0].'&description='. get_the_title() .'" class="pin-it-button" count-layout="horizontal">Pin It</a></div>';
		
		$social .= '</div>';
		
		return $content . $social;
		
		
	}
	
	//Include Widget
	include('socialmyblog-widget.php');
	
	//Add buttons to single pages
	add_action("wp", "load_social");
	
	function load_social() {
		if(is_single() && !is_admin()) {
			add_action('wp_footer','add_social_js');
	        add_filter('the_content','add_social_buttons');
		}
		if(!is_admin()) {
			add_action('wp_head','add_css');
		}
	}
	
	function easy_social_admin() {
		include('socialmyblog-admin.php');
	}
	
	function easy_admin_actions() {
	    add_options_page('Social My Blog Settings', 'Social My Blog Settings', 'manage_options', 'bk-socialmyblog', 'easy_social_admin');
	}
	
	add_action('admin_menu', 'easy_admin_actions');

	
?>