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

<div id="posttitle"><div id="fourofourtext"><?php the_title(); ?></h2></div></div>

<div id="postcontent">
<?php the_content(); ?>
</div>

</div> <!-- close the original post div -->

<?php endwhile; else: ?>

<!-- Tell WP that if there arent't any posts, give an error message -->
<div id="fourofourcontainer">

<div id="posttitle"><div id="fourofourtext">Page Not Found</h2></div></div>

<div id="postcontent" style="padding-bottom: 10px;">
<?php echo get_option('customcode_fourofour'); ?>
</div>


</div>

<!-- End The Loop and all IFs -->
<?php endif; ?>

</div>

<div id="rightsidebar">
<?php include(TEMPLATEPATH.'/sidebar.php'); ?>
</div>

<?php comments_template(); ?>

<?php include(TEMPLATEPATH.'/footer.php'); ?>

</div>

</div>
</body>

</html>
