<?php
/*
The comments page for Bones
*/

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="alert alert-info"><?php _e("This post is password protected. Enter the password to view comments.","aws-bootstrap"); ?></div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<?php if ( ! empty($comments_by_type['comment']) ) : ?>
	<h3 id="comments"><?php comments_number('<span>' . __("No","aws-bootstrap") . '</span> ' . __("Responses","aws-bootstrap") . '', '<span>' . __("One","aws-bootstrap") . '</span> ' . __("Response","aws-bootstrap") . '', '<span>%</span> ' . __("Responses","aws-bootstrap") );?> <?php _e("to","aws-bootstrap"); ?> &#8220;<?php the_title(); ?>&#8221;</h3>

	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link( __("Older comments","aws-bootstrap") ) ?></li>
	  		<li><?php next_comments_link( __("Newer comments","aws-bootstrap") ) ?></li>
	 	</ul>
	</nav>
	
	<ol class="commentlist">
		<?php wp_list_comments('type=comment'); ?>
	</ol>
	
	<?php endif; ?>
	
	<?php if ( ! empty($comments_by_type['pings']) ) : ?>
		<h3 id="pings">Trackbacks/Pingbacks</h3>
		
		<ol class="pinglist">
			<?php wp_list_comments('type=pings&callback=list_pings'); ?>
		</ol>
	<?php endif; ?>
	
	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link( __("Older comments","aws-bootstrap") ) ?></li>
	  		<li><?php next_comments_link( __("Newer comments","aws-bootstrap") ) ?></li>
		</ul>
	</nav>
  
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    	<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed 
	?>
	
	<?php
		$suppress_comments_message = of_get_option('suppress_comments_message');

		if (is_page() && $suppress_comments_message) :
	?>
			
		<?php else : ?>
		
			<!-- If comments are closed. -->
			<p class="alert alert-info"><?php _e("Comments are closed","aws-bootstrap"); ?>.</p>
			
		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<section id="respond" class="respond-form">

	<h3 id="comment-form-title"><?php comment_form_title( __("Leave a Reply","aws-bootstrap"), __("Leave a Reply to","aws-bootstrap") . ' %s' ); ?></h3>

	<div id="cancel-comment-reply">
		<p class="small"><?php cancel_comment_reply_link( __("Cancel","aws-bootstrap") ); ?></p>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  	<div class="help">
  		<p><?php _e("You must be","aws-bootstrap"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in","aws-bootstrap"); ?></a> <?php _e("to post a comment","aws-bootstrap"); ?>.</p>
  	</div>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form-vertical" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p class="comments-logged-in-as"><?php _e("Logged in as","aws-bootstrap"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Log out of this account","aws-bootstrap"); ?>"><?php _e("Log out","aws-bootstrap"); ?> &raquo;</a></p>

	<?php else : ?>
	
	<ul id="comment-form-elements" class="clearfix container">
		
		<li>
			<div class="control-group">
			  <label for="author"><?php _e("Name","aws-bootstrap"); ?> <?php if ($req) echo "(required)"; ?></label>
			  <div class="input-prepend">
			  	<span class="add-on"><i class="icon-user"></i></span><input class="span4" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e("Your Name","aws-bootstrap"); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			  </div>
		  	</div>
		</li>
		
		<li>
			<div class="control-group">
			  <label for="email"><?php _e("Mail","aws-bootstrap"); ?> <?php if ($req) echo "(required)"; ?></label>
			  <div class="input-prepend">
			  	<span class="add-on"><i class="icon-envelope"></i></span><input class="span4" type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php _e("Your Email","aws-bootstrap"); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			  	<span class="help-inline">(<?php _e("will not be published","aws-bootstrap"); ?>)</span>
			  </div>
		  	</div>
		</li>
		
		<li>
			<div class="control-group">
			  <label for="url"><?php _e("Website","aws-bootstrap"); ?></label>
			  <div class="input-prepend">
			  <span class="add-on"><i class="icon-home"></i></span><input class="span4" type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php _e("Your Website","aws-bootstrap"); ?>" tabindex="3" />
			  </div>
		  	</div>
		</li>
		
	</ul>

	<?php endif; ?>
	
	<div class="clearfix">
		<div class="input">
			<textarea name="comment" id="comment" placeholder="<?php _e("Your Comment Here…","aws-bootstrap"); ?>" tabindex="4" class="input-block-level"></textarea>
		</div>
	</div>
	
	<div class="form-actions">
	  <input class="btn btn-primary" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e("Submit Comment","aws-bootstrap"); ?>" />
	  <?php comment_id_fields(); ?>
	</div>
	
	<?php 
		//comment_form();
		do_action('comment_form()', $post->ID); 
	
	?>
	
	</form>
	
	<?php endif; // If registration required and not logged in ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?>
