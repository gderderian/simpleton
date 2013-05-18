<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo(charset); ?>"  />

<title><?php bloginfo(name); ?> <?php wp_title(); ?></title>
	
<link rel="stylesheet" type="text/css" media='screen' href="<?php bloginfo('stylesheet_url'); ?>" />
<link rev="canonical" type="text/html" href="<?php $bitlyLink = shorturl(get_permalink($post->ID)); echo "$bitlyLink" ?>" />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?ver=1.4.2'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/tipsy/javascripts/jquery.tipsy.js'></script>
<script type="text/javascript" src="http://tweet-it.s3.amazonaws.com/tweet-it.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/tipsy/stylesheets/tipsy.css" type="text/css" />

<?php // Include Anything Here (with the wp_head function) that Wordpres and the plugins want to stick in ?>
<?php wp_head(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#tweetpost a").tweetIt();
	})
</script>

<script type='text/javascript'>
	$(function() {
		$('#fbtip').tipsy({fade: true, gravity: 'n'});
		$('#twittip').tipsy({fade: true, gravity: 'n'});
		$('#rsstip').tipsy({fade: true, gravity: 'n'});
	});
</script>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>"/>
<link rel="alternate" type="application/atom+xml" title="Atom Feed" href="<?php bloginfo('atom_url'); ?>"/>

<link rel="shortcut icon" href="<?php echo get_option('faviconurl'); ?>"/>

<script type="text/css" media="screen">
<?php echo get_option('customcode_css'); ?>
</script>

<?php echo get_option('customcode_header'); ?>