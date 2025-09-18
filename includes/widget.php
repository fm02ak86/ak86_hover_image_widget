<?php
namespace AKEL_Hover_Image_Widget\Includes;

use Elementor\Widget_Base;

class Widget extends  Widget_Base
{
    public function get_name()
    {
        return 'ak86_hover_image_widget';
    }

    public function get_title()
    {
        return 'AK86 Hover Image';
    }

    public function get_icon()
    {
        return 'eicon-image-rollover';
    }

    public function get_categories()
    {
        return ['ak86-widget-category'];
    }

    public function get_keywords()
    {
        return ['ak', 'ak86', 'image', 'hover'];
    }

    protected function register_controls()
    {

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        yoyoyo
        <?php
    }
}