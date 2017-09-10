<?php
if ( post_password_required() ) {
	return;
}
?>

<!-- You can start editing here. -->
 

<?php if ( have_comments() ) : ?>

    <h6 id="comments-title">
	    <?php	printf( _n( 'One Comment', '%1$s Comments','cooper', get_comments_number() ), number_format_i18n( get_comments_number() ) ); ?>
	</h6>
	
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<div class="com_list">
	<ul class="commentlist clearafix">
	<?php wp_list_comments('callback=cooper_comment');?>
	</ul>
	</div>

	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		
		<p class="nocomments"><?php esc_attr_e('Comments are closed.','cooper'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
<div class="clearfix"></div>
<div id="respond" class="clearafix">

    <h6 id="reply-title"><?php comment_form_title( esc_attr__('Leave A Comment','cooper') ); ?></h6>

<div id="cancel-comment-reply">
	<small><?php cancel_comment_reply_link() ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<h5 class="sub_title"><?php printf(esc_attr__('You must be <a href="%s">logged in</a> to post a comment.' ,'cooper'), wp_login_url( get_permalink() )); ?></h5>
<?php else : ?>

<form action="<?php echo site_url(); ?>/wp-comments-post.php" method="post" id="commentform" class="contact-form">

<div class="comment-reply-form clearfix">

<?php if ( is_user_logged_in() ) : ?>

<h3 class="sub_title"><?php esc_attr_e('Logged in as ','cooper'); ?> <?php printf(__('<a href="%1$s">%2$s</a>.','cooper'), get_edit_user_link(), $user_identity); ?> <a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>" title="<?php esc_attr_e('Log out of this account','cooper'); ?>"><?php esc_attr_e('Log out &raquo;','cooper'); ?></a></h3>

<?php else : ?>

<form action="#" method="post" id="commentform" class="form-horizontal" name="commentform">

    <div class="comment-form-author control-group">
        <div class="controls">
            <input id="author" name="author" type="text" value="<?php echo esc_attr($comment_author); ?>" size="40"  <?php if ($req) echo esc_attr("aria-required='true'"); ?> />
        </div>
        <label class="control-label" for="author"><?php esc_attr_e('Name', 'cooper');?> </label>
    </div>
	
	<div class="comment-form-email control-group">
        <div class="controls">
            <input id="email" name="email" type="text" value="<?php echo esc_attr($comment_author_email); ?>" size="40" <?php if ($req) echo esc_attr("aria-required='true'"); ?> />
        </div>
        <label class="control-label" for="email"><?php esc_attr_e('Email', 'cooper');?> </label>
    </div>

</form>


<?php endif; ?>

    <div class="comment-form-comment control-group">
        <div class="controls">
            <textarea id="comment" name="comment" cols="50" rows="8" aria-required="true" placeholder="<?php esc_attr_e('Your comment here..','cooper'); ?>">
            </textarea>
        </div>
    </div>
	
    <div class="form-submit">
        <div class="controls">
            <button class="transition button" type="submit" value="<?php esc_attr_e('Add Reply','cooper'); ?>"><?php esc_attr_e('Post Comment','cooper'); ?></button>
             <input type='hidden' name='comment_post_ID' value='30' id='comment_post_ID'> 
			 <input type='hidden' name='comment_parent' id='comment_parent' value="0" />
        </div>
    </div>	

<?php comment_id_fields(); ?>

<?php do_action('comment_form', $post->ID); ?>

</div>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
