<?php
// Create Social Profile Field

/*-----------------------------------------------------------*/
/*   Add User Social Links (functions.php)
    /*-----------------------------------------------------------*/
function blogietech_add_user_social_links($user_contact)
{

    /* Add user contact methods */
    $user_contact['facebook']  = __('Facebook Link', 'blogietech');
    $user_contact['twitter']   = __('Twitter Link', 'blogietech');
    $user_contact['linkedin']  = __('LinkedIn Link', 'blogietech');
    $user_contact['github']    = __('Github Link', 'blogietech');
    $user_contact['instagram'] = __('Instagram Link', 'blogietech');
    return $user_contact;
}
add_filter('user_contactmethods', 'blogietech_add_user_social_links');

function blogietech_get_user_social_links()
{
    $return  = '<ul class="flex">';

    if (!empty(get_the_author_meta('facebook'))) {
        $return .= '<li><a href="' . get_the_author_meta('facebook') . '" title="Facebook" target="_blank" id="facebook"><i class="fab fa-facebook"></i></a></li>';
    }
    if (!empty(get_the_author_meta('twitter'))) {
        $return .= '<li><a href="' . get_the_author_meta('twitter') . '" title="Twitter" target="_blank" id="twitter"><i class="fab fa-twitter"></i></a></li>';
    }
    if (!empty(get_the_author_meta('linkedin'))) {
        $return .= '<li><a href="' . get_the_author_meta('linkedin') . '" title="LinkedIn" target="_blank" id="linkedin"><i class="fab fa-linkedin"></i></a></li>';
    }
    if (!empty(get_the_author_meta('github'))) {
        $return .= '<li><a href="' . get_the_author_meta('github') . '" title="Github" target="_blank" id="github"><i class="fab fa-github"></i></a></li>';
    }
    if (!empty(get_the_author_meta('instagram'))) {
        $return .= '<li><a href="' . get_the_author_meta('instagram') . '" title="Instagram" target="_blank" id="instagram"><i class="fab fa-instagram"></i></a></li>';
    }

    $return .= '</ul>';

    return $return;
}




/*-----------------------------------------------------*/
/*  Author Social Links Shortcode (functions.php)
    /*-----------------------------------------------------*/

add_shortcode('author-social-links', 'blogietech_author_social_links_shortcode');
/**
 * this the shortcode [author-social-links]
 */
function blogietech_author_social_links_shortcode()
{
    // return blogietech_get_user_social_links();
}
