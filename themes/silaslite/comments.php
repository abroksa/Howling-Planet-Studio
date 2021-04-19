<?php
if ( post_password_required() ) {
	return;
}
$fields =  array(
    'author' => '<div class="row"><div class="col-sm-6"><input type="text" name="author" id="name" class="input-form" placeholder="'.esc_attr__('Your name *', 'silaslite').'" /></div>',
    'email'  => '<div class="col-sm-6"><input type="text" name="email" id="email" class="input-form" placeholder="'.esc_attr__('Your email *', 'silaslite').'"/></div>',
    'website'=>'<div class="col-sm-12"><input type="text" name="url" id="url" class="input-form" placeholder="'.esc_attr__('Website URL', 'silaslite').'"/></div></div>'

);
$custom_comment_form = array(
    'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field'         => '<textarea name="comment" id="message" class="textarea-form" placeholder="'.esc_attr__('Your comment ...', 'silaslite').'"  rows="1"></textarea>',
    'logged_in_as'          => '<p class="logged-in-as">' . esc_html__('Logged in as', 'silaslite') .' <a href="'.admin_url('profile.php').'">'. $user_identity .'</a> <a href="'. wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) .'">'. esc_html__('Log out?', 'silaslite'). '</a></p>',
    'cancel_reply_link'     => esc_html__( 'Cancel' , 'silaslite' ),
    'comment_notes_before'  => '',
    'comment_notes_after'   => '',
    'title_reply'           => esc_html__('Leave a Reply', 'silaslite'),
    'label_submit'          => esc_html__( 'Post Comment' , 'silaslite' ),
    'id_submit'             => 'comment_submit',
);?>
<?php if ( have_comments() ) : ?>
<div id="comments" class="comments-area">
    <?php if ( comments_open() ) : ?>
        <h3 class="comments-title"><?php comments_number( null, esc_html__('1 Comment', 'silaslite'), '% ' . esc_html__('Comments', 'silaslite') ); ?></h3>
   	<?php endif; ?>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'silaslite' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'silaslite' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'silaslite' ) ); ?></div>
	</nav>
	<?php endif; ?>    
	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 100,
                'callback'	  => 'silaslite_custom_comment'
			) );
		?>
	</ol>    
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'silaslite' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'silaslite' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'silaslite' ) ); ?></div>
	</nav>
	<?php endif; ?>    
	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'silaslite' ); ?></p>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php comment_form($custom_comment_form); ?>