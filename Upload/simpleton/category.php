<html>
<head>
<?php include(TEMPLATEPATH.'/scripts.php'); ?>
</head>

<body>

<div id="pagewrapper">
<?php include(TEMPLATEPATH.'/header.php'); ?>

<div id="postsidebar">
<div id="leftposts">

<div id="authorbox">
<div id="catgtitle">Latest Posts From <?php single_cat_title(); ?></div>
</div>
<?php include(TEMPLATEPATH.'/posts.php'); ?>
</div>

<div id="rightsidebar">
<?php include(TEMPLATEPATH.'/sidebar.php'); ?>
</div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>

</div>

</div>
</body>

</html>
