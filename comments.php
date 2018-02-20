<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


?>
<div class="comments">
	<?php if (post_password_required()) : ?>
	<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'TelkomEdu' ); ?></p>
</div>

	<?php return; endif; ?>

<?php if (have_comments()) : ?>

	<h2><?php comments_number(); ?></h2>

	<ul>
		<?php wp_list_comments('type=comment&callback=edu_comments');?>
	</ul>

<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p><?php _e( 'Comments are closed here.', 'TelkomEdu' ); ?></p>

<?php endif; ?>

<?php comment_form(); ?>

</div>