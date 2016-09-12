<?php
/*
Plugin Name: Visual Composer remove CSS3 animations
Plugin URI:
Description: Removes animations for iOS (Safari / Chrome)
Version: 2014.10.28
Author: Jason Davis
Author URI: http://profiles.wordpress.org/batgeek/
License: GPL2
*/
 
add_action('wp_footer', function()
{
?>
<script type="text/javascript">
/*
 * Tiny mobile detection script, courtesy of
 * https://github.com/markdalgleish/stellar.js/issues/37
 */
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
 
/*
 * Overwrite original vc_waypoints function
 */
function vc_waypoints()
{
    if (typeof jQuery.fn.waypoint !== 'undefined')
    {
        jQuery('.wpb_animate_when_almost_visible:not(.wpb_start_animation)').waypoint(function()
        {
            /* For iOS, we will remove the animation by just unsetting the wpb_animate_when_almost_visible class */
            if (isMobile.iOS())
                jQuery(this).removeClass('wpb_animate_when_almost_visible');
            else
                jQuery(this).addClass('wpb_start_animation');
        },
        {
            offset: '85%'
        });
    }
}
</script>
<?php
}, 100);
