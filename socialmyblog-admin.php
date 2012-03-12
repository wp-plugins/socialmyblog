<?php 
	if($_POST['socialmyblog_hidden'] == 'Y') {
		//Form data sent
		$twitter = $_POST['socialmyblog_twitter'];
		update_option('socialmyblog_twitter', $twitter);
		
		$facebook = $_POST['socialmyblog_facebook'];
		update_option('socialmyblog_facebook', $facebook);
		
		$googleplus = $_POST['socialmyblog_googleplus'];
		update_option('socialmyblog_googleplus', $googleplus);
		
		$linkedin = $_POST['socialmyblog_linkedin'];
		update_option('socialmyblog_linkedin', $linkedin);

		$youtube = $_POST['socialmyblog_youtube'];
		update_option('socialmyblog_youtube', $youtube);

		$vimeo = $_POST['socialmyblog_vimeo'];
		update_option('socialmyblog_vimeo', $vimeo);
		
		$rss = $_POST['socialmyblog_rss'];
		update_option('socialmyblog_rss', $rss);
		
		?>
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php
	} else {
		//Normal page display
		$twitter = get_option('socialmyblog_twitter');
		$facebook = get_option('socialmyblog_facebook');
		$googleplus = get_option('socialmyblog_googleplus');
		$linkedin = get_option('socialmyblog_linkedin');
		$youtube = get_option('socialmyblog_youtube');
		$vimeo = get_option('socialmyblog_vimeo');
		$rss = get_option('socialmyblog_rss');
	}
	
	
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'Social My Blog Settings', 'socialmyblog_trdom' ) . "</h2>"; ?>

<form name="socialmyblog_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="socialmyblog_hidden" value="Y">
	<?php    echo "<h4>" . __( 'inclue your social media sites bellow. Any left blank will not display in widget', 'socialmyblog_trdom' ) . "</h4>"; ?>
	<p><?php _e("Twitter Username: " ); ?><input type="text" name="socialmyblog_twitter" value="<?php echo $twitter; ?>" size="20"></p>
	<p><?php _e("Facebook URL: " ); ?><input type="text" name="socialmyblog_facebook" value="<?php echo $facebook; ?>" size="40"></p>
	<p><?php _e("Google+ URL: " ); ?><input type="text" name="socialmyblog_googleplus" value="<?php echo $googleplus; ?>" size="40"></p>
	<p><?php _e("Linkedin URL: " ); ?><input type="text" name="socialmyblog_linkedin" value="<?php echo $linkedin; ?>" size="40"></p>
	<p><?php _e("Vimeo URL: " ); ?><input type="text" name="socialmyblog_vimeo" value="<?php echo $vimeo; ?>" size="40"></p>
	<p><?php _e("Youtube URL: " ); ?><input type="text" name="socialmyblog_youtube" value="<?php echo $youtube; ?>" size="40"></p>
	<p><?php _e("RSS Feed: " ); ?><input type="text" name="socialmyblog_rss" value="<?php echo $rss; ?>" size="40"></p>
	<p>if you need help with the rss feed visit <a href="http://codex.wordpress.org/WordPress_Feeds" target="_blank>">here</a></p>


	<p class="submit">
	<input type="submit" name="Submit" value="<?php _e('Update Options', 'socialmyblog_trdom' ) ?>" />
	</p>
</form>
</div>