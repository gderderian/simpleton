<!-- Start the loop of posts -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Style Posts In A Certain Category Differently -->
<?php if ( in_category('9999999999') ) { ?>
           <div id="post-quote">
<?php } else { ?>
           <div id="post">
<?php } ?>

 <!-- Tell WP That If The Post Has A Thumbnail, Display It In The "leftthumb" div. Otherwise, do nothing and don't display that div -->
<?php
if ( has_post_thumbnail() ) { ?>
			<div id="leftthumb">
			<?php the_post_thumbnail(); ?>
			</div>
<?php } else { ?>

<?php }
?>

<!-- Tell WP again that if the post has a thumbnail, push the contents to the right in the "rightpostdata" div -->
<?php
if ( has_post_thumbnail() ) { ?>
<div id="rightpostdata">
<?php } else { ?>
<?php }
?>
<div id="postcategory">In <?php the_category(', '); ?></div>
 
<div id="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>

<!-- Show some simple metadata like who the post was written by, if there are any comments on it, and when it was written -->
<div id="postmeta">Written By <?php the_author_posts_link() ?> on <?php the_time('F jS, Y') ?> | <?php comments_popup_link('No Comments Yet >>', '1 Comment >>', '% Comments >>'); ?>
</div>

<!-- Display the content of the post in a div box called "postcontent" and put in a link that says "Read More..." -->
<div id="postcontent">
<?php the_content( 'Read More... ' , $strip_teaser, $more_file ); ?>
</div>

<!-- Tell WP that if the post has a thumbnail, end the div box for it here -->
<?php
if ( has_post_thumbnail() ) { ?>
</div>
<?php } else { ?>
<?php }
?>

</div> <!-- close the original post div -->

<?php wp_pagenavi(); ?>

<?php endwhile; else: ?>

<!-- Tell WP if there arent't any posts to display the next line -->
<p>Oh no! It looks like no posts matched the query you were looking for. Please try again.</p>

<!-- End The Loop and all IFs -->
<?php endif; ?>