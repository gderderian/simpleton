<?php 

// Specify that this theme uses the WP thumbnail feature and we'll say how big the default thumbnail is
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 185, 185 );

// Specify that this theme supports Wordpress 3.0's new menu system (awesome!) and make a menu
add_theme_support( 'nav-menus' );

if (function_exists('register_nav_menus')) {
	register_nav_menus( array(
			'mainmenu' => __( 'Top Navigation Menu', 'simpleton' ),
	) );
}

// Create a new function for the Simpleton menu and also make a fallback in case the theme is not installed on a WP 3.0 site
function simpleton_navmenu() {

if ( function_exists( 'wp_nav_menu' ) )
	wp_nav_menu( 'menu_class=toppagenavi&fallback_cb=simpleton_navmenu_fallback&theme_location=mainmenu' );
else
	simpleton_navmenu_fallback();
}

function simpleton_navmenu_fallback() {
    wp_page_menu( 'show_home=1&menu_class=toppagenavi&sort_column=menu_order' );
}

// Tell Wordpress that this theme supports a sidebar and register one
if ( function_exists('register_sidebar') )
    register_sidebar(array(
    	'name' => 'Home Page Right Sidebar',
        'before_widget' => '<div class="rightsidebarwidget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="rightsidebartitle">',
        'after_title' => '</div>',
    ));
    
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Individual Post/Page Right Sidebar',
		'before_widget' => '<div class="rightsidebarwidget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="rightsidebartitle">',
		'after_title' => '</div>',
));


}
    
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Lower Left Sidebar',
		'before_widget' => '<div id="lowerleftwidget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="lowerlefttitle">',
		'after_title' => '</div>',
));


}

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Lower Middle Sidebar',
		'before_widget' => '<div id="lowermiddlewidget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="lowermiddletitle">',
		'after_title' => '</div>',
));


}

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Lower Right Sidebar',
		'before_widget' => '<div id="lowerrightwidget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="lowerrighttitle">',
		'after_title' => '</div>',
));

}


// Let Wordpress know to not jump the page to the "jumpline" in posts and just to go the beginning
function remove_more_jump_link($link) { 
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// Make Our Own Comments Function

function simpleton_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="indivcommentbox">
     <div id="indivcomment" class="comid-<?php comment_ID(); ?>" >
      <div id="rightmeta">
      <div id="commenteravatar">
         <?php echo get_avatar($comment,$size='80',$default='<path_to_url>' ); ?>

      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <?php _e('<div id="comments-awaitingmoderation">Awaiting Moderation</div>') ?>
         <br />
      <?php endif; ?>

      <div id="commentmeta">
      <div id="commentername"><?php printf(__('%s'), get_comment_author_link()) ?></div>
      <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
	</div>
	  <div id="commentbody">
      <?php comment_text() ?>
      </div>

      <div id="commentsreplylink">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }
        
// Include All of The Functions For Our Theme Options Page

require_once(TEMPLATEPATH . '/controlpanel/controlpanel.php');
        
// Create A Custom Function To Grab Bit.ly Links For Our Posts
       
function shorturl($url) {

$blusername = get_option('bitly_username');
$blkey = get_option('bitly_apikey');
$data = file_get_contents("http://api.bit.ly/shorten?version=2.0.1&format=xml&longUrl=".$url."&login=".$blusername."&apiKey=".$blkey);
$xml = new SimpleXMLElement($data);
$shortlink = $xml->results->nodeKeyVal->shortUrl;

return $shortlink;

}

?>