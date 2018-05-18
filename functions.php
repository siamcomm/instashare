
function instashare_buttons($content) {
	if (is_singular() || is_home()) {
		// Post or Page information
		$instashare = '';
		$instashareUrl = get_permalink();
		$instashareTitle = str_replace( ' ', '%20', get_the_title() );
		if (has_post_thumbnail( $post->ID ) ) {
			$instashareThumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		} else {
			$instashareThumb = null;
		}
		
		// Social Sharing URLs
		$twitterUrl = 	'http://twitter.com/share?text=' . $instashareTitle . '&amp;url=' . $instashareUrl;
		$facebookUrl = 	'https://www.facebook.com/dialog/share?app_id=123794477631813&ampdisplay=popup&amp;u=' . $instashareUrl . '&amp;t=' . $instashareTitle;
		$linkedInUrl = 	'https://www.linkedin.com/shareArticle?mini=true&amp;url=' . $instashareUrl . '&amp;title=' . $instashareTitle;
		$googleUrl = 	'https://plus.google.com/share?url=' . $instashareUrl;
		$pinterestUrl = 'https://pinterest.com/pin/create/button/?url=' . $instashareUrl . '&amp;media=' . $instashareThumb[0] . '&amp;description=' . $instashareTitle;
		
		// Social sharing sservices - we can add more here later if you want
		$bufferUrl = 	'https://bufferapp.com/add?url=' . $instashareUrl . '&amp;text=' . $instashareTitle;
		
		$instashare .= '<!-- InstaShare social sharing -->';
		$instashare .= '<div class="instashare-social">';
		$instashare .= '<a class="instashare-link instashare-twitter" href="'. $twitterUrl .'" target="_blank">Twitter</a>';
		$instashare .= '<a class="instashare-link instashare-facebook" href="'.$facebookUrl.'" target="_blank" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\');return false;">Facebook</a>';
		$instashare .= '<a class="instashare-link instashare-linkedin" href="'.$linkedInUrl.'" target="_blank">LinkedIn</a>';
		$instashare .= '<a class="instashare-link instashare-google" href="'.$googleUrl.'" target="_blank">Google+</a>';
		$instashare .= '<a class="instashare-link instashare-pinterest" href="'.$pinterestUrl.'" data-pin-custom="true" target="_blank">Pin It</a>';
		$instashare .= '<a class="instashare-link instashare-buffer" href="'.$bufferUrl.'" target="_blank">Buffer</a>';
		$instashare .= '</div>';
		
		$content .= $instashare;
		
		return $content;
	} else {
		return $content;
	}
};
add_filter( 'the_content', 'instashare_buttons' );
