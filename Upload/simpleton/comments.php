<!-- You can start editing here. -->
<div id="comments">
<?php if ( have_comments() ) : ?>
	<div id="commentnumber"><div id="number"><?php comments_number('No Comments Yet', 'One Comment So Far', '% Comments So Far' );?></div></div>
	<ul id="commentlist">
	<?php wp_list_comments('avatar_size=80&reply_text=Reply To This Comment&callback=simpleton_comments'); ?>
	</ul>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

	<div id="commentpagenavi">
	<?php previous_comments_link('<div id="prevcomments"><< View Older Comments</div>'); ?>
	<?php next_comments_link('<div id="nextcomments">View Newer Comments >></div>'); ?>
	</div>

	<div id="commentformbody">

	<div id="leavereplymessage"><?php comment_form_title( "Leave A Reply", "Leave A Reply to %s's Comment" ); ?></div>

	<div id="commentreply-cancellink">
		<?php cancel_comment_reply_link("You're replying to a specific comment above. Click here to cancel your reply to that comment."); ?>
	</div>

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( $user_ID ) : ?>

			<div id="comments-loggedinas">You're logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. You can leave a comment below or <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log Out">log out.</a></div>

		<?php else : ?>

			<div id="commentreply-name"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"></div>

			<div id="commentreply-email"><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"></div>

			<div id="commentreply-url"><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"></div>

		<?php endif; ?>

		<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

		<div id="commentreply-commentbody"><textarea name="comment" id="comment" tabindex="4"></textarea></div>

		<div id="submit"><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		<?php comment_id_fields(); ?></div>
		
		<?php do_action('comment_form', $post->ID); ?>

		</form>
	<?php endif; // If registration required and not logged in ?>
	</div>
<?php endif; // if you delete this the sky will fall on your head ?>

</div>

