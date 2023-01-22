<!-- You can start editing here. -->
<?php if ( comments_open() ) : ?>
	<?php $activ = get_post_meta($post->ID, 'Activado', true); ?>
<?php if(!empty($activ)): ?>
<div id="respond" class="for-form-comentarios">

	<!-- <h3><?php comment_form_title( __('Leave a Reply'), __('Leave a Reply to %s' ) ); ?></h3> -->	
	

	<div id="cancel-comment-reply">
		<small><?php cancel_comment_reply_link() ?></small>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php printf(__('You must be <a href="%s">Logeado </a> to post a comment.'), wp_login_url( get_permalink() )); ?></p>
	<?php else : ?>
		
	<form action="<?php echo site_url(); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p class="col-md-12"><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.'), get_edit_user_link(), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('Log out of this account'); ?>"><?php _e('Log out &raquo;'); ?></a></p>

	<?php else : ?>

	<p class="form-group  col-md-6"><label for="author"><?php _e('Name'); ?> <?php if ($req) _e('*'); ?></label><input type="text" class="form-control input-sm" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
	</p>

	<p class="form-group  col-md-6"><label for="email"><?php _e('Correo'); ?> <?php if ($req) _e('*'); ?></label><input class="form-control input-sm" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
	</p>

	<p class="form-group col-md-12 "><label for="coment" id="labelcomenta">Comentario ttt <?php if ($req) _e('*'); ?></label><textarea class="form-control" name="comment" id="comment" rows="3" cols="40" tabindex="4"></textarea></p>
	<?php endif; ?>

	<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>'), allowed_tags()); ?></small></p>-->

	<p class="form-group col-md-12 "><label for="coment" id="labelcomenta">Comentario<?php if ($req) _e('*'); ?></label><textarea class="form-control input-sm" name="comment" id="comment" rows="3" cols="40" tabindex="4"></textarea></p>

	<p class="form-group col-md-12 "><input class="btn btn-comenta btn-danger" name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment'); ?>" />&nbsp;&nbsp;<strong><small>(*) Campos obligatorios</small></strong>
	<input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" id="comment_post_ID">
	<input type="hidden" name="comment_parent" id="comment_parent" value="0">
	</p>
	<?php do_action('comment_form', $post->ID); ?>
	</form>		

	<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; ?>

<?php endif; // if you delete this the sky will fall on your head ?>


<?php if ( have_comments() ) : ?>
	<!--<h3 id="comments"><?php	//printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number() ),
							//		number_format_i18n( get_comments_number() ), '&#8220;' . get_the_title() . '&#8221;' ); ?></h3>-->

	<!--div class="navigation" style="border: 1px solid green">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="pull-right"><?php next_comments_link() ?></div>
	</div-->

	<ol class="commentlist">
	<?php wp_list_comments();?>	
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="pull-right"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>
 	<p>No hay comentarios para mostrar</p>
	
<?php endif; ?>


