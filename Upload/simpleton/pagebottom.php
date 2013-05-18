<div id="bottomposttools">
<div id="sharepost">
<div id="sharepost-title">Share This Page:</div>

<ul id="sharingicons">
<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?> on <?php bloginfo('name'); ?>" title="Share on Facebook"><img src="<?php bloginfo('template_directory'); ?>/images/sharingicons/facebook.png" /></a></li>
<li><div id="tweetpost"><a href="http://twitter.com/home?status=Checking out <?php the_title(); ?> on <?php bloginfo('name'); ?>: <?php the_permalink(); ?>" title="Share on Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/sharingicons/twitter.png" /></a></div></li>
<li><a href="http://digg.com/submit?phase=2&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" title="Digg This Entry"><img src="<?php bloginfo('template_directory'); ?>/images/sharingicons/digg.png" /></a></li>
<li><a href="http://www.google.com/buzz/post?url=<?php the_permalink(); ?>" title="Post to Google Buzz"><img src="<?php bloginfo('template_directory'); ?>/images/sharingicons/google.png" /></a></li>
<li><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" title="Submit To Stunbleupon"><img src="<?php bloginfo('template_directory'); ?>/images/sharingicons/stumbleupon.png" /></a></li>
<li><a href="http://delicious.com/save?v=5&noui&jump=close&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" title="Bookmark on Delicious"><img src="<?php bloginfo('template_directory'); ?>/images/sharingicons/delicious.png" /></a></li>
</ul>

<br>
<div id="followustext"><?php echo get_option('connecttext_footer'); ?></div>
<br>
<ul id="connectwithusicons">
<?php if (get_option('fburl_global')) : ?><li><a href="<?php echo get_option('fburl_global'); ?>" title="Become a Fan on Facebook"><img src="<?php bloginfo('template_directory'); ?>/images/sharingicons/facebook.png" /></a></li><?php endif; ?>
<?php if (get_option('twitterurl_global')) : ?><li><a href="http://www.twitter.com/<?php echo get_option('twitterurl_global'); ?>" title="Follow Me on Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/sharingicons/twitter.png" /></a></li><?php endif; ?>
<li><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe To My Blog's RSS Feed"><img src="<?php bloginfo('template_directory'); ?>/images/sharingicons/rss.png" /></a></li>
</ul>

<div id="shorturltitle">Copy This Page's Short URL</div>
<input type="text" id="bitlypostlink" name="bitlypostlink" value="<?php $bitlyLink = shorturl(get_permalink($post->ID)); echo "$bitlyLink" ?>" />

</div>

<div id="postfooterright">
<div id="aboutauthorbox">
<div id="authorinfo-moreabout"> More About <?php the_author_posts_link(); ?>:</div>
<div id="authorinfo-photo"><?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '75' ); }?></div>
<div id="authorinfo-desc"><?php $curauth = get_userdata($post->post_author); if ( empty($curauth->description) ) { echo 'The author of this post does not yet have a biography available.'; } else { echo "$curauth->description"; } ?></div>
</div>





</div>


</div>

</div>