<?php 
$postURL = urlencode(get_the_permalink());
$postTitle = urlencode(get_the_title());
$postIMG = urlencode(get_the_post_thumbnail_url());

$facebookURL = 'https://www.facebook.com/sharer.php?u=';
$twitterURL = 'https://twitter.com/share?url=';
$linkedinURL = "https://www.linkedin.com/sharing/share-offsite/?url=";
$pinterestURL = "https://pinterest.com/pin/create/bookmarklet/?media=";
?>
<div class="social-share-container">
    <a target="popup" href="<?php echo $facebookURL . $postURL; ?>" class="sharebtn facebook-btn" onclick="window.open('<?php echo $facebookURL . $postURL; ?>','popup','width=600,height=600'); return false;">
        <i class="icon icon-facebook"></i>
        <span class="facebook-share-btn-text">Share</span>
    </a>
    <a target="popup" href="<?php echo $twitterURL . $postURL . '&text' . '=' . $postTitle; ?>" class="sharebtn twitter-btn" onclick="window.open('<?php echo $twitterURL . $postURL . '&text' . '=' . $postTitle; ?>','popup','width=600,height=600'); return false;">
        <i class="icon icon-twitter"></i>
        <span class="twitter-tweet-btn-text">Tweet</span>
    </a>
    <a target="popup" href="<?php echo $linkedinURL . $postURL?>" class="sharebtn linkedin-btn" onclick="window.open('<?php echo $linkedinURL . $postURL?>','popup','width=600,height=600'); return false;">

        <i class="icon icon-linkedin"></i>
    </a>
    <a target="popup" href="<?php echo $pinterestURL . $postIMG . '&url=' . $postURL . '&description=' . $postTitle; ?>" class="sharebtn pinterest-btn" onclick="window.open('<?php echo $pinterestURL . $postIMG . '&url=' . $postURL . '&description=' . $postTitle; ?>','popup','width=600,height=600'); return false;">
        <i class="icon icon-pinterest-circled"></i>
    </a>
</div>