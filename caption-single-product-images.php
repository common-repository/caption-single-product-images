<?php
/**
 * Plugin Name: Caption Single Product Images
 * Plugin URI: https://parishkaar.com/
 * Description: Display caption under product thumbnails on Single Product Pages in the WooCommerce Product Gallery.
 * Version: 1.0
 * Author: Naveen Chand K
 * Author URI: https://www.parishkaar.com
 * Woo: 12345:342928dfsfhsf8429842374wdf4234sfd
 * WC requires at least: 4.4
 * WC tested up to: 5.4.1
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
    /** filter woocommerce single product image thumbnail html 
     *  grab caption for each attachment id 
     *  and then return the html with the caption.
     **/

    add_filter ('woocommerce_single_product_image_thumbnail_html', 'knccspi_thumbnail_html', 10, 2);
    function knccspi_thumbnail_html ($html, $attachment_id) {
        $caption = get_post_field('post_excerpt', $attachment_id);
        if(trim($caption)) {
            $html = str_replace('</div>', '<span class="gtnCaps">' . $caption . '</span></div>', $html);
            
        }
        return $html;
        
    }
    
}