<?php

$themename = "SimpletonWP";
$shortname = "swp";

$showhide = array("Show","Hide");

$options = array (
 
array( "name" => $themename." Options",
	"type" => "title"),	
	
array( "type" => "close"),

array( "name" => "Social Network Settings",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Facebook Account URL",
	"desc" => "Enter the <b>URL</b> of a Faebook Page, Profile or Group to link to the icon on the header of all pages on the site. If you don't wish to display the icon, leave it blank.",
	"id" => "fburl_global",
	"type" => "text",
	"std" => "http://www.facebook.com/facebook"),
	
array( "name" => "Facebook Tooltip Text",
	"desc" => "Enter the text you'd like to be displayed when visitors hover over the Facebook icon in the header of your site.",
	"id" => "fbtooltip_global",
	"type" => "text",
	"std" => "Like Us on Facebook"),
	
array( "name" => "Twitter Account Username",
	"desc" => "Enter the <b>username</b> of a Twitter to link to the icon on the header of all pages on the site. If you don't wish to display the icon, leave it blank. ",
	"id" => "twitterurl_global",
	"type" => "text",
	"std" => "twitter"),
	
array( "name" => "Twitter Tooltip Text",
	"desc" => "Enter the text you'd like to be displayed when visitors hover over the Twitter icon in the header of your site.",
	"id" => "twittertooltip_global",
	"type" => "text",
	"std" => "Follow us on Twitter"),
	
array( "name" => "RSS Tooltip Text",
	"desc" => "Enter the text you'd like to be displayed when visitors hover over the RSS Feed icon in the header of your site.",
	"id" => "rssfeedtooltip_global",
	"type" => "text",
	"std" => "Subscribe to our RSS feed!"),

array( "type" => "close"),

array( "name" => "Post, Page & Theme Footer",
	"type" => "section"),
array( "type" => "open"),

array( 	"name" => "Post Information Box",
	"desc" => "Select whether to show or hide the bottom post information box which contains the post author name and bio, the posts tags and other sharing tools.",
	"id" => "footer_showboxonposts",
	"std" => "Hide or Show Post Info Box:",
	"type" => "select",
	"options" => $showhide),
	
array( 	"name" => "Page Information Box",
	"desc" => "Select whether to show or hide the bottom page information box which contains the post author name and bio, the pages tags and other sharing tools.",
	"id" => "footer_showboxonpages",
	"std" => "Hide or Show Page Info Box:",
	"type" => "select",
	"options" => $showhide),
	
array( 	"name" => "Post/Page Info Box Connect Text",
	"desc" => "Enter the text to be displayed above the Twitter, Facebook and RSS icons in the post/page information box. This can be text like 'Connect With Me Online' or 'Follow this author.'.",
	"id" => "connecttext_footer",
	"type" => "text",
	"std" => "Connect With Me Online"),
	
array( "name" => "Footer Text",
	"desc" => "Enter the text you'd like to be displayed under the three bottom sidebars.",
	"id" => "lower_footertext",
	"type" => "text",
	"std" => "&copy 2010"),
	
array( "name" => "Custom Favicon",
	"desc" => "The favicon is the small 16x16 icon that display up in your browsers address bar. There is already a default one, but you're welcomed to change it to anything you'd like right here.",
	"id" => "faviconurl",
	"type" => "text",
	"std" =>  get_bloginfo('template_directory') . "/images/favicon.ico"),

array( "type" => "close"),

array( "name" => "Custom Code",
	"type" => "section"),
array( "type" => "open"),
	
array( "name" => "Custom CSS",
	"desc" => "You're able to add any custom CSS to the theme in this box. However, if you looking to override any existing theme styling, you can manually edit the stylesheet or add an '!important' declaration to your code.",
	"id" => "customcode_css",
	"type" => "textarea",
	"std" => ""),
	
array( "name" => "Custom Header Code",
	"desc" => "You're able to add any custom code to the theme in this box. It will be automatically placed in the header and is great for code like the Google Analytics tracking script.",
	"id" => "customcode_header",
	"type" => "textarea",
	"std" => ""),
	
array( "name" => "Custom 404 Page Message",
	"desc" => "Enter the text here that you want to place on your 404 (Page Not Found) error page.",
	"id" => "customcode_fourofour",
	"type" => "textarea",
	"std" => "The page you are looking for could not be found. Please check the URL and try again, or, you can also perform a search for what you're trying to find in the search box above. Thank you."),
	
array( "name" => "Bit.ly Username",
	"desc" => "Enter your Bit.ly username to create short links on posts and pages. If you don't have a <b>free</b> bit.ly account, get one by <a href='http://bit.ly/a/sign_up'>clicking here</a> and then enter your new username here.",
	"id" => "bitly_username",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Bit.ly API Key",
	"desc" => "Enter your Bit.ly API key here. To get one, <a href='http://bit.ly/a/your_api_key'>click here</a> after you've created a Bit.ly account.",
	"id" => "bitly_apikey",
	"type" => "text",
	"std" => ""),

array( "type" => "close"),
 
);


function mytheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=controlpanel.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) { 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=controlpanel.php&reset=true");
die;
 
}
}
 
add_menu_page('Simpleton Theme Settings', 'Simpleton Settings', 'administrator', basename(__FILE__), 'mytheme_admin', 'http://www.nextgenwebmedia.com/simpletonmenuicon.png');
}

function mytheme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/controlpanel/cpcss.css", false, "1.0", "all");
wp_enqueue_script("spltn_script", $file_dir."/controlpanel/cpscript.js", false, "1.0");

}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="spltn_wrap">
 
<div class="spltn_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>

<div id="headerimage"><img src="<?php bloginfo('template_directory'); ?>/controlpanel/cpaneloptionsheader.png"></div>

 
<?php break;
 
case 'text':
?>

<div class="spltn_input spltn_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="spltn_input spltn_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="spltn_input spltn_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="spltn_input spltn_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="spltn_section">
<div class="spltn_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="spltn_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<div id="footertext" style="font-size:10px;">Simpleton's theme settings page was developed from Rohan Mehta's <a href="http://net.tutsplus.com/tutorials/wordpress/how-to-create-a-better-wordpress-options-panel/">"Better WordPress Options Panel"</a> tutorial.</div>
</div> 
<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>