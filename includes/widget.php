<?php
namespace AKEL_Hover_Image_Widget\Includes;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

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
        $this->contentSection();
        $this->styleSection();
    }

    private function contentSection() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Hover Image Content',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('first_image', [
            'label' => 'First Image',
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->add_control('second_image', [
            'label' => 'Second Image',
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->end_controls_section();
    }

    private function styleSection() {
        $this->start_controls_section(
            'style_section',
            [
                'label' => 'Hover Image Style',
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control('image_width', [
            'label' => 'Width (%)',
            'type' => Controls_Manager::NUMBER
        ]);

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->changeCssAttributes($settings);
        ?>
        <div class="ak86_hover_image_wrapper">
            <div class="ak86_hover_first_image">
                <img
                     src="<?= $settings['first_image']['url'] ?>"
                     alt="<?= $settings['first_image']['alt'] ?>"
                >
            </div>
            <div class="ak86_hover_second_image">
                <img
                     src="<?= $settings['second_image']['url'] ?>"
                     alt="<?= $settings['second_image']['alt'] ?>"
                >
            </div>
        </div>
        <?php
    }

    private function changeCssAttributes($settings)
    {
        ?>
        <style>
            .ak86_hover_image_wrapper {
                width: <?= $settings['image_width'] ?>%;
            }

            .ak86_hover_second_image {
                width: <?= $settings['image_width'] ?>%;
            }
        </style>
        <?php
    }
}