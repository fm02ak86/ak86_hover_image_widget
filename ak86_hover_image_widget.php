<?php
/*
* Plugin Name: Image Hover Widget
* Plugin URI: https://ak86.eu
* Description: Show a different image when hovering over the original one
* Version: 1.0
* Author: Filip Marin
*/

if(!defined('ABSPATH')) {
    die('You shall not pass.');
}

//Check for elementor installation
add_action('init', function() {
    if (in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        // Elementor is active, do nothing or continue with your plugin's functionality
    } else {
        // Elementor is not active, deactivate the plugin
        deactivate_plugins(plugin_basename(__FILE__));
        // Display message to the user
        add_action('admin_notices', function () {
            ?>
            <div class="notice notice-error">
                <p>Das Plugin '<?php echo plugin_basename(__FILE__); ?>' konnte nicht aktiviert werden, da das Plugin 'Elementor' nicht aktiv ist.</p>
            </div>
            <?php
        });
    }
});

const AKEL_HOVER_IMAGE_WIDGET_DIR = WP_PLUGIN_DIR . '/ak86_hover_image_widget';
const AKEL_HOVER_IMAGE_WIDGET_URL = WP_PLUGIN_URL . '/ak86_hover_image_widget';

use AKEL_Hover_Image_Widget\Includes\Base;

require_once AKEL_HOVER_IMAGE_WIDGET_DIR . '/includes/base.php';

new Base();