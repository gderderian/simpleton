<html>
<head>
<?php include(TEMPLATEPATH.'/scripts.php'); ?>
</head>

<body>

<div id="pagewrapper">
<?php include(TEMPLATEPATH.'/header.php'); ?>

<div id="postsidebar">
<div id="leftposts">
<!-- Start the loop of posts -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Style Posts In A Certain Category Differently -->
<?php if ( in_category('3') ) { ?>
           <div id="post-quote">
<?php } else { ?>
           <div id="post">
<?php } ?>

<div id="posttitle"><?php the_title(); ?></h2></div>

<!-- Show some simple metadata like who the post was written by, if there are any comments on it, and when it was written -->
<div id="postmeta">Written By <?php the_author_posts_link() ?> on <?php the_time('F jS, Y') ?> <? if (comments_open()) { echo "| "; comments_popup_link('No Comments Yet', '1 Comment', '% Comments'); } ?></div>

<!-- Display the content of the post in a div box called "postcontent" and put in a link that says "Read More..." -->
<div id="postcontent">
<?php the_content(); ?>
</div>

</div> <!-- close the original post div -->

<?php endwhile; else: ?>

<!-- Tell WP that if there arent't any posts, give an error message -->
<p>Oh no! It looks like no posts matched the query you were looking for. Please try again.</p>

<!-- End The Loop and all IFs -->
<?php endif; ?>

</div>

<div id="rightsidebar">
<?php get_sidebar('pagepost'); ?>
</div>

<?php if ( get_option('footer_showboxonpages') == "Show" ) { include(TEMPLATEPATH.'/pagebottom.php'); } ?>

<?php comments_template(); ?>

<?php include(TEMPLATEPATH.'/footer.php'); ?>

</div>

</div>
</body>

</html>
