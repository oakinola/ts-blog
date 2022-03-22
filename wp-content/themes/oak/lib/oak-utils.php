<?php
/**
 * This is the oak_utils class by Olatunji Akinola.
 * LAST UPDATED : 20-06-2021
 *              : 09-10-2021
 */


/**
 * Get the ID of a YouTube Video 
 **/
function helpwp_youtube_id($url){
    /*
     * type1: http://www.youtube.com/watch?v=9Jr6OtgiOIw
     * type2: http://www.youtube.com/watch?v=9Jr6OtgiOIw&feature=related
     * type3: http://youtu.be/9Jr6OtgiOIw
     */
    $vid_id = "";
    $flag = false;
    if(isset($url) && !empty($url)) {
        /*case1 and 2*/
        $parts = explode("?", $url);
        if(isset($parts) && !empty($parts) && is_array($parts) && count($parts)>1){
            $params = explode("&", $parts[1]);
            if(isset($params) && !empty($params) && is_array($params)){
                foreach($params as $param){
                    $kv = explode("=", $param);
                    if(isset($kv) && !empty($kv) && is_array($kv) && count($kv)>1){
                        if($kv[0]=='v'){
                            $vid_id = $kv[1];
                            $flag = true;
                            break;
                        }
                    }
                }
            }
        }
        
        /*case 3*/
        if(!$flag){
            $needle = "youtu.be/";
            $pos = null;
            $pos = strpos($url, $needle);
            if ($pos !== false) {
                $start = $pos + strlen($needle);
                $vid_id = substr($url, $start, 11);
                $flag = true;
            }
        }
    }
    return $vid_id;
}

function oak_comment_parent_link( $args = array() ) {
	echo oak_get_comment_parent_link( $args );
}

function oak_get_comment_parent_link( $args = array() ) {

	$link = '';

	$defaults = array(
		'text'   => '%s', // Defaults to comment author.
		'depth'  => 2,    // At what level should the link show.
		'before' => '',   // String to output before link.
		'after'  => ''    // String to output after link.
	);

	$args = wp_parse_args( $args, $defaults );

	if ( $args['depth'] <= $GLOBALS['comment_depth'] ) {

		$parent = get_comment()->comment_parent;

		if ( 0 < $parent ) {

			$url  = esc_url( get_comment_link( $parent ) );
			$text = sprintf( $args['text'], get_comment_author( $parent ) );

			$link = sprintf( '%s<a class="comment-parent-link" href="%s">%s</a>%s', $args['before'], $url, $text, $args['after'] );
		}
	}

	return $link;
}

/** Answers by returning the comment-reply-URL for a comment. */
function oak_get_comment_reply_url() {
    $commentParent = get_comment()->comment_ID;
    $reply_url = get_permalink() . '?replytocom=' . get_comment()->comment_ID . '#respond';
    return $reply_url;
}

/*
function oak_format_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>

    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="media d-block d-md-flex mt-4">
            <div class="media-body text-center text-md-left ml-md-3 ml-0">
            <?php oak_comment_parent_link(
                    array(
                        'depth'  => 3,
                        'text'   => __( 'In reply to %s', 'extant' ),
                        'before' => '<div class="comment-parent">',
                        'after'  => '</div>'
                    )
                ); ?>
                <p class="font-weight-bold my-0">

                <?php printf(__('%s'), get_comment_author_link()); ?> <em> commented on</em> 
                <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a>
                <!--?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?-->
                   <a href="<?php echo oak_get_comment_reply_url() ?>" class="pull-right ml-1">
                        <i class="fas fa-reply"></i>
                    </a>
                </p>
            
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><php _e('Your comment is awaiting moderation.') ?></em><br />
                <?php endif; ?>
            
                <?php comment_text(); ?> 
            </div>
        </div> 
<?php } 
*/

/*
    This method represents the default comments display html used on all oak themes
*/
function oak_default_formatted_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <article class="comment-body">
            <div class="comment-avatar"><?php echo get_avatar($comment,$size='60', $default='' ); ?></div>
            <div class="comment-details">
                <div class="comment-author-info">
                    <div class="comment-author vcard" <a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a></div>
                    <div class="comment-metadata">
                        <small><?php printf(__('%1$s, %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
                    </div>
                </div>
                <div class="clear"></div>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.') ?></em>
                    <br />
                <?php endif; ?>

                <div class="comment-text">	
                    <?php comment_text(); ?>
                </div>

                <div class="reply">
                    <a href="<?php echo oak_get_comment_reply_url() ?>" class="btn oak-btn oak-btn-filled oak-btn-rounded pull-right ml-1">
                     Reply <i class="fas fa-reply"></i>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
    </article>
<?php }


function oak_move_comment_form_below( $fields ) { 
    $comment_field = $fields['comment']; 
    unset( $fields['comment'] ); 
    unset( $fields['cookies'] );
    $fields['comment'] = $comment_field; 
    return $fields; 
} 
add_filter( 'comment_form_fields', 'oak_move_comment_form_below' ); 
 
// Add placeholder for Name and Email
function oak_modify_comment_form_fields($fields){
    $fields['author'] =  ' <div class="md-form md-outline mt-3 ps-1"> ' .
                '<label for="author">Your Name</label></div>' .
                '<input type="text" id="author" placeholder="Your Name (No Keywords)" name="author" size="30" value="" required="required" class="form-control">';
    $fields['email'] = '<div class="md-form md-outline mt-3 ps-1">
                            <label for="form-email">E-mail</label></div>
                            <input type="email" id="form-email" placeholder="your-real-email@example.com" name="email" value="" required="required" class="form-control">';
    return $fields;
}
add_filter('comment_form_default_fields','oak_modify_comment_form_fields');


add_action( 'phpmailer_init', 'oak_send_smtp_email' );
function oak_send_smtp_email( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = SMTP_HOST;
    $phpmailer->SMTPAuth   = SMTP_AUTH;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->Username   = SMTP_USERNAME;
    $phpmailer->Password   = SMTP_PASSWORD;
    $phpmailer->From       = SMTP_FROM;
    $phpmailer->FromName   = SMTP_FROMNAME;
}

function oak_get_youtube_watch_url_prefix() {
    return "https://www.youtube.com/watch?v=";
}

function oak_get_youtube_embed_url_prefix() {
    return "https://www.youtube.com/embed/";
}

function facebook_page_like_count ( $url ) {
    
    $api = file_get_contents( 'http://graph.facebook.com/?id=' . $url );
    
    $count = json_decode( $api );
    
    return $count->like;
};

function facebook_like_share_count ( $url ) {
    
    $api = file_get_contents( 'http://graph.facebook.com/?id=' . $url );
    
    $count = json_decode( $api );
    
    return $count->shares;
};


function oak_custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'oak_custom_excerpt_length', 999 );

function oak_excerpt_more($more) {
    global $post;
    // return '<a href="' . get_permalink($post->ID) . '">Read More</a>';
    return ' <a class="btn oak-btn-more" href="'. get_permalink($post->ID) .'">... </a>';   
}
add_filter('excerpt_more', 'oak_excerpt_more');

//popular posts stuff...
function oak_set_post_views($postID) {
    $count_key = 'oak_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count=='') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function oak_track_post_views ($post_id) {
    if ( !is_single() ) { return; }
    if ( empty ( $postId) ) {
        global $post;
        $postId = $post->ID;
    }
    oak_set_post_views($postId);
}
add_action( 'wp_head', 'oak_track_post_views');

/** Displays the post count **/
function oak_get_post_views($postID){
    $count_key = 'oak_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/* see the number of posts using SQL...
	SELECT wp_postmeta.*, wp_posts.post_title, wp_posts.post_type FROM `wp_postmeta`, `wp_posts` WHERE meta_key = 'oats_post_views_count'
	and wp_postmeta.post_id = wp_posts.id order by meta_value desc;
*/

function oak_get_default_featured_image() {
    return get_template_directory_uri() . '/assets/img/default-blog-image.jpg';
}

function oak_get_featured_image_for_post($post) {
    $featuredImage = oak_get_default_featured_image();
    if ( empty($post->ID) || ! has_post_thumbnail($post->ID)) {
        return $featuredImage;
    }

    return get_the_post_thumbnail_url($post, 'post-thumbnail'); 
}

function oak_get_default_person_image() {
    return content_url() . '/uploads/person-silhouette.png';
}

function oak_current_page() {    
    return get_post_field( 'post_name', get_post() );    
}

function oak_get_post_type_letter() {
    $postType = get_post_type();
    if ($postType == "oak_proverbs") {
        return "P"; // proverbs
    }   elseif ($postType == "oak_media_post") {
        return "V"; //video post
    } else {
        return "B";//blog post
    }
}

function oak_get_post_categories_as_string ($post_id = false) {
    $categories = get_the_category($post_id);//$post->ID
    $category_list = '';
    foreach($categories as $category){
        $category_list .= $category->cat_name . ' ';
    }
    return $category_list;
}

// used for tracking error messages
function oak_errors(){
    static $oak_error; // Will hold global variable safely
    return isset($oak_error) ? $oak_error : ($oak_error = new WP_Error(null, null, null));
}

// displays error messages from form submissions
function oak_errors_retrieve() {
    $oak_error_string = '';
    if ($codes = oak_errors()->get_error_codes()) {
        $oak_error_string = '<div class="form-error">';
        // Loop error codes and display errors
        foreach($codes as $code) {
            $message = oak_errors()->get_error_message($code);
            $oak_error_string .= '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
        }
        $oak_error_string .= '</div>';
        return $oak_error_string;
    }   
}

// displays error messages from form submissions
function oak_errors_show_errors() {
    if ($codes = oak_errors()->get_error_codes()) {
        echo '<div class="form-error">';
        // Loop error codes and display errors
        foreach($codes as $code){
            $message = oak_errors()->get_error_message($code);
            echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
        }
        echo '</div>';
    }   
}

function oak_send_email_to_admin() {
    $return_url = home_url( ) . '/contact';
    if ( !empty( $_POST['_wp_http_referer'] ) ) {
        $return_url = esc_url_raw( wp_unslash( $_POST['_wp_http_referer'] ) );
    }

    process_course_registration();
    process_newsletter_subscription();
    process_contact_form();

    //if we get here, some generic error has occurred!
    wp_safe_redirect(
        esc_url_raw (
            add_query_arg( 'error_message', 'We could not process your request properly. Please try later', $return_url )
        )
    );
    exit();
}
add_action( 'admin_post_nopriv_contact_form', 'oak_send_email_to_admin' );
add_action( 'admin_post_contact_form', 'oak_send_email_to_admin' );
add_action( 'admin_post_nopriv_subscribe_form', 'oak_send_email_to_admin' );
add_action( 'admin_post_subscribe_form', 'oak_send_email_to_admin' );
add_action( 'admin_post_nopriv_registration_form', 'oak_send_email_to_admin' );
add_action( 'admin_post_registration_form', 'oak_send_email_to_admin' );


function process_contact_form() {

    $return_url = home_url( ) . '/contact';
    if ( !empty( $_POST['_wp_http_referer'] ) ) {
        $return_url = esc_url_raw( wp_unslash( $_POST['_wp_http_referer'] ) );
    } 
    
    if (! isset( $_POST[ 'contact_form_nonce' ] ) || ! wp_verify_nonce(sanitize_key( $_POST['contact_form_nonce']), 'contact-form-nonce') ) {
        return;
    }

    if (isset($_POST['email']) ) {
        $email = sanitize_email( wp_unslash($_POST['email'] ) );
        if (!is_email($email)) {
            oak_errors()->add( 'invalid_email',  __('Please enter a valid email address') );
        }
    } else {
        oak_errors()->add( 'invalid_email',  __('Please enter an email address') );
    }

    if (!empty($_POST['fullname'])) {
        $name = sanitize_text_field(wp_unslash($_POST['fullname'] ) );
    } else {
        oak_errors()->add( 'empty_fullname',  __('Please enter your full name') );
    }            

    if (!empty($_POST['mobile'])) {
        $mobile = sanitize_text_field(wp_unslash($_POST['mobile'] ) ); 
    } else {
        oak_errors()->add( 'empty_mobile',  __('Please enter your mobile number') );
    }

    $reason = sanitize_text_field(wp_unslash($_POST['reason'] ) ); 
    if ($reason == 0) {
        oak_errors()->add( 'invalid_reason',  __('Please select a reason from the list') );
    }

    if (!empty($_POST['message'])) {
        $message = sanitize_text_field(wp_unslash($_POST['message'] ) ); // ...
    } else {
        //$error->add( 'empty_message', 'Please enter a message' );
        oak_errors()->add( 'empty_message',  __('Please enter a message') );
    }

    // Send the result
    if (empty(oak_errors()->errors)) {

        $headers = array('Content-Type: text/html; charset=UTF-8');
        //$name = $firstname . " " . $lastname;
        $to_client = $email;
        $subject_client = "Hi " . $name . ", Thank you for contacting us!";
        $body_client = '
            <h2>Dear ' . $name . ',</h2><br>
            <p>Thank you for sending in your query/request. We will endeavour to contact you as soon as possible</p>
            <p>Please go ahead and browse our site to see if there are any other ways we can be of assistance.</p>
            <p>Thank you and do have a nice day.</p>
            <p>Kind Regards,</p>
            <p>Jenavi Adisa</p> ';                

        $to_site_admin = "jenaviaseroma@gmail.com";
        $subject_site_admin = "Contact form filled in from " .get_bloginfo('name');
        $body_site_admin = "Hello! <br> You were contacted by " . $name . ",  their email address is " . $email . ". ";
        $body_site_admin .= "<br>The option they chose for contacting you is " . $reason . " ";
        $body_site_admin .= "<br>Their mobile number is " . $mobile . ". Here's the message they sent <br><br> " . $message;

        if (wp_mail($to_site_admin, $subject_site_admin, $body_site_admin, $headers)) {
            if (wp_mail($to_client, $subject_client, $body_client, $headers)) {
                wp_safe_redirect(
                    esc_url_raw (
                        add_query_arg( 'success_message', 'Thank you for contacting me. I shall be in touch shortly', $return_url )
                    )
                );
                exit;
            } else {
                wp_safe_redirect(
                    esc_url_raw(
                        add_query_arg( 'error_message', 'We could not process your request properly. Please try later', $return_url )
                    )
                );
                exit;
            }
        } else {
            wp_safe_redirect(
                esc_url_raw(
                    add_query_arg( 'error_message', 'Something went wrong while processing your request. Please try later', $return_url )
                )
            );
            exit;
        }
    } else {
        wp_safe_redirect(
            esc_url_raw(
                add_query_arg( 'oak_errors', oak_errors()->errors, $return_url )
            )                
        );
        exit;
    }
}

function process_newsletter_subscription() {
    $return_url = home_url( ) . '/contact';
    if ( !empty( $_POST['_wp_http_referer'] ) ) {
        $return_url = esc_url_raw( wp_unslash( $_POST['_wp_http_referer'] ) );
    } 
    
    if (! isset( $_POST[ 'subscribe_form_nonce' ] ) ||  ! wp_verify_nonce(sanitize_key( $_POST['subscribe_form_nonce']), 'subscribe-form-nonce') )  {
        return;
    }
 
    if (isset($_POST['email']) ) {
        $email = sanitize_email( wp_unslash($_POST['email'] ) );
        if (!is_email($email)) {
            oak_errors()->add( 'invalid_email',  __('Please enter a valid email address') );
        }
    } else {
        oak_errors()->add( 'invalid_email',  __('Please enter an email address') );
    }
    
    // Send the result
    if (empty(oak_errors()->errors)) {

        $headers = array('Content-Type: text/html; charset=UTF-8');
        //$name = $firstname . " " . $lastname;
        $to_client = $email;
        $subject_client = "Your subscription is now live!";
        $body_client = '<p>Thank you for subscribing to my newsletter. I will be in touch soon.</p>
            <p>Regards</p>
            <p>Jenavi Adisa</p> ';                

        $to_site_admin = "jenaviaseroma@gmail.com";
        $subject_site_admin = "New Subscription received from " .get_bloginfo('name');
        $body_site_admin = "You have received a new subscription from email address " . $email . ". ";

        if (wp_mail($to_site_admin, $subject_site_admin, $body_site_admin, $headers)) {
            if (wp_mail($to_client, $subject_client, $body_client, $headers)) {
                wp_safe_redirect(
                    esc_url_raw (
                        add_query_arg( 'subscribe_success_message', 'Thank you for subscribing. I shall be in touch shortly', $return_url )
                    )
                );
                exit;
            } else {
                //oak_errors()->add('client_email_failed', __('Failed to send the email to client. Please try later'));
                wp_safe_redirect(
                    esc_url_raw(
                        add_query_arg( 'subscribe_error_message', 'We could not subscribe you just yet. Please try later', $return_url )
                    )
                );
                exit;
            }
        } else {
            //oak_errors()->add('email_failed', __('Failed to send the email. Please try later'));
            wp_safe_redirect(
                esc_url_raw(
                    add_query_arg( 'subscribe_error_message', 'Something went wrong while processing your request. Please try later', $return_url )
                )
            );
            exit;
        }
    } else {
        wp_safe_redirect(
            esc_url_raw(
                add_query_arg( 'subscribe_oak_errors', oak_errors()->errors, $return_url )
            )                
        );
        exit;
    }
}