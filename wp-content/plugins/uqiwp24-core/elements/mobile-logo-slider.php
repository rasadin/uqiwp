<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // If this file is called directly, abort.

class Widget_Client_Logo_Carousel extends Widget_Base
{

    public function get_name()
    {
        return 'client-logo-slider';
    }

    public function get_title()
    {
        return esc_html__('Client Logo Slider', 'uqiwp24-core');
    }

    public function get_script_depends()
    {
        return [
            'uqiwp24-public'
        ];
    }

    public function get_icon()
    {
        return 'fa fa-slideshare';
    }

    public function get_categories()
    {
        return ['uqiwp24-for-elementor'];
    }

    protected function register_controls()
    {
        /**
         * Content Settings
         */
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content Settings', 'uqiwp24-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'client_name',
            [
                'label' => __('Logo', 'uqiwp24-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter Logo Name Here', 'uqiwp24-core'),
                'label_block' => true,
            ]
        );

        // $repeater->add_control(
        //     'dig',
        //     [
        //         'label' => __('Designation', 'uqiwp24-core'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => __('Enter Designation Here', 'uqiwp24-core'),
        //         'label_block' => true,
        //     ]
        // );

        // $repeater->add_control(
        //     'description',
        //     [
        //         'label' => __('Description', 'uqiwp24-core'),
        //         'type' => \Elementor\Controls_Manager::WYSIWYG,
        //         'default' => __('Enter Description Here', 'uqiwp24-core'),
        //         'label_block' => true,
        //     ]
        // );

        $repeater->add_control(
            'logo',
            [
                'label' => __('Logo', 'uqiwp24-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );


        // $repeater->add_control(
        //     'client_pic',
        //     [
        //         'label' => __('Client Photo', 'uqiwp24-core'),
        //         'type' => \Elementor\Controls_Manager::MEDIA,
        //         'label_block' => true,
        //     ]
        // );


        $this->add_control(
            'hero_slides',
            [
                'label' => __('Client Slides', 'uqiwp24-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         */
        $this->style_tab();
    }

    private function style_tab()
    {
    }

    protected function render()
    {
        $marco = $this->get_settings_for_display();

?>

        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>





        <div class="slider-wrapper">
            <div class="slider">
                <?php foreach ($marco['hero_slides'] as $slide) { ?>
                    <div class="slide">
                        <div class="img-logo">
                            <img src="<?php echo $slide['logo']['url']; ?>" class="client-company-logo" alt="...">
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>








        <script>
            jQuery(function($) {
                $('.slider').slick({
                    autoplay: true,
                    autoplaySpeed: 0,
                    speed: 5000,
                    arrows: false,
                    swipe: false,
                    slidesToShow: 3,
                    cssEase: 'linear',
                    pauseOnFocus: false,
                    pauseOnHover: false,
                });
            });
        </script>

        <style>
            .slider-wrapper {
                position: relative;
            }

            .slide {
                position: relative;
            }

            .slide-text {
                position: absolute;
                top: 20px;
                /* Adjust as needed */
                left: 0;
                right: 0;
                text-align: center;
                padding: 10px;
            }

            .title {
                font-size: 18px;
                font-weight: bold;
            }

            .sub-text {
                font-size: 14px;
                color: #666;
            }
        </style>











<?php
    }

    protected function content_template()
    {
    }
}


Plugin::instance()->widgets_manager->register(new Widget_Client_Logo_Carousel());
