<?php
/*
Plugin Name: Unique Customer ID
Plugin URI: https://github.com/ShoboySnr/unique-customer-id-wpmu
Description: Display unique customer ID for logged in customers
Version: 1.0.0
Author: Damilare Shobowale
Contributors: Damilare Shobowale
Author URI: https://github.com/ShoboySnr/unique-customer-id-wpmu
License: GPL2
*/

add_shortcode('display_customer_id', 'display_customer_id', 10, 2);
function display_customer_id($attr = '', $content = '') {
    // check if the user is logged in else return empty string
    if(!is_user_logged_in()) return '';
    
    $user_id = get_current_user_id();
    
    return generate_unique_user_id($user_id);
}

function generate_unique_user_id($user_id = 0) {
    if(!empty($user_id)) return sprintf('UID%s', str_pad($user_id, 10, '0', STR_PAD_LEFT));
}