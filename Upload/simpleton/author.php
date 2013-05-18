<?php
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>
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
<div id="authorimg"><?php echo get_avatar( $curauth->user_email, '80' ); ?></div>
<div id="authorpostsby">Posts By  <?php if ( empty($curauth->user_url) ) { echo ''; } else { echo "<a href='"; echo "$curauth->user_url"; echo "' >"; echo $curauth->display_name; echo "</a>"; } ?></div>
<div id="authordescription"><?php echo $curauth->description; ?></div>
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
