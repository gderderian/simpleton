<div id="header">

<div id="logo">
<a href="<?php bloginfo('url'); ?>" alt="<?php bloginfo('name'); ?> Home" title="<?php bloginfo('name'); ?> Home" >
<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" title="<?php bloginfo('name'); ?>">
</a>
</div>

<div id="subscribe">
<div id="rsstip" title="<?php echo get_option('rssfeedtooltip_global'); ?>"><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/socialicons/rss.png" title="<?php echo get_option('rssfeedtooltip_global'); ?>" /></a></div>

<?php if (get_option('twitterurl_global')) : ?>
<div id="twittip" title="<?php echo get_option('twittertooltip_global'); ?>"><a href="http://www.twitter.com/<?php echo get_option('twitterurl_global'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/socialicons/twitter.png" title="<?php echo get_option('twittertooltip_global'); ?>" /></a></div>
<?php endif; ?>

<?php if (get_option('fburl_global')) : ?>
<div id="fbtip" title="<?php echo get_option('fbtooltip_global'); ?>"><a href="<?php echo get_option('fburl_global'); ?>" ><img src="<?php bloginfo('template_directory'); ?>/images/socialicons/facebook.png" title="<?php echo get_option('fbtooltip_global'); ?>" /></a></div>
<?php endif; ?>

</div>

<div id="search">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="Search" />
</form>
</div>

<div id="topnavi">
<?php simpleton_navmenu(); ?>
</div>

</div> 