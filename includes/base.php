<?php
namespace AKEL_Hover_Image_Widget\Includes;

class Base
{
    public function __construct()
    {
        $this->setupHooks();
    }

    private function setupHooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_action('elementor/widgets/register', [$this, 'registerWidget']);
    }

    public function enqueueScripts()
    {
        wp_register_style('akel-hover-image-widget-main-css', AKEL_HOVER_IMAGE_WIDGET_DIR . "/assets/css/main.css");
        wp_enqueue_style('akel-hover-image-widget-main-css');

        wp_register_script('akel-hover-image-widget-main-js', AKEL_HOVER_IMAGE_WIDGET_URL . "/assets/js/main.js");
        wp_enqueue_script('akel-hover-image-widget-main-js');
    }

    public function registerWidget($widgetsManager)
    {
        require_once AKEL_HOVER_IMAGE_WIDGET_DIR . '/includes/widget.php';
        $widgetsManager->register(new Widget());
    }
}