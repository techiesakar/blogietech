<?php
// Create Social Profile Field

/*-----------------------------------------------------------*/
/*   Add User Social Links (functions.php)
    /*-----------------------------------------------------------*/
function blogietech_add_user_social_links($user_contact)
{

    /* Add user contact methods */
    echo '<h4 style="text-align: center;"><i>Username Only</i></h4>';
    $user_contact['facebook']  = __('Facebook', 'blogietech');
    $user_contact['twitter']   = __('Twitter', 'blogietech');
    $user_contact['linkedin']  = __('LinkedIn', 'blogietech');
    $user_contact['github']    = __('Github', 'blogietech');
    $user_contact['instagram'] = __('Instagram', 'blogietech');
    return $user_contact;
}
add_filter('user_contactmethods', 'blogietech_add_user_social_links');

function blogietech_get_user_social_links()
{
    $return  = '<ul style="list-style: none;" class="flex">';

    if (!empty(get_the_author_meta('facebook'))) {
        $return .= '<li><a href="https://www.facebook.com/' . get_the_author_meta('facebook') . '" title="Facebook" target="_blank" id="facebook"><i class="icon icon-facebook"></i></a></li>';
    }
    if (!empty(get_the_author_meta('twitter'))) {
        $return .= '<li><a href="https://twitter.com/' . get_the_author_meta('twitter') . '" title="Twitter" target="_blank" id="twitter"><i class="icon icon-twitter"></i></a></li>';
    }
    if (!empty(get_the_author_meta('linkedin'))) {
        $return .= '<li><a href="https://www.linkedin.com/in/' . get_the_author_meta('linkedin') . '" title="LinkedIn" target="_blank" id="linkedin"><i class="icon icon-linkedin"></i></a></li>';
    }
    if (!empty(get_the_author_meta('github'))) {
        $return .= '<li><a href="https://github.com/' . get_the_author_meta('github') . '" title="Github" target="_blank" id="github"><i class="icon icon-github"></i></a></li>';
    }
    if (!empty(get_the_author_meta('instagram'))) {
        $return .= '<li><a href="https://instagram.com/' . get_the_author_meta('instagram') . '" title="Instagram" target="_blank" id="instagram"><i class="icon icon-instagram"></i></a></li>';
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
    return blogietech_get_user_social_links();
}
