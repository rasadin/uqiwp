<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // If this file is called directly, abort.

class Widget_Service_List extends Widget_Base
{

    public function get_name()
    {
        return 'service-list';
    }

    public function get_title()
    {
        return esc_html__('Service List', 'uqiwp24-core');
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
            'service_name',
            [
                'label' => __('Service name', 'uqiwp24-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter Service Name Here', 'uqiwp24-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => __('Service Link', 'uqiwp24-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter Link Here', 'uqiwp24-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'subtext',
            [
                'label' => __('Service Sub Text', 'uqiwp24-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter Sub Text Here', 'uqiwp24-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => __('Description List', 'uqiwp24-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('Enter Description List Here', 'uqiwp24-core'),
                'label_block' => true,
            ]
        );

        // $repeater->add_control(
        //     'logo',
        //     [
        //         'label' => __('Logo', 'uqiwp24-core'),
        //         'type' => \Elementor\Controls_Manager::MEDIA,
        //         'label_block' => true,
        //     ]
        // );


        $repeater->add_control(
            'service_pic',
            [
                'label' => __('Service Photo', 'uqiwp24-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );


        $this->add_control(
            'hero_slides',
            [
                'label' => __('Service Slides', 'uqiwp24-core'),
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
        <!-- Add Markup Starts -->
        <div class="contain-service">
            
            <div id="service-group" class="service-service service-theme">

                <?php
                foreach ($marco['hero_slides'] as $slide) { ?>



                    <div class="service">
                       <a href="<?php echo $slide['link']; ?>">
                        <div class="service-review-section">

                            <div class="service-review-section-left">
                                <div class="service-review-section-photo">
                                    <img src="<?php echo $slide['service_pic']['url']; ?>" class="service-photo" alt="...">
                                </div>
                            </div>

                            <div class="service-review-section-right">

                                <div class="service-review-section-title">
                                    <?php echo $slide['service_name']; ?>
                                </div>


                                
                                <div class="service-review-section-subtext">
                                    <?php echo $slide['subtext']; ?>
                                </div>


                                <div class="service-review-section-dis">
                                    <?php echo $slide['description']; ?>
                                    
                                </div>


                                <div class="blank-div"></div>

                            </div>



                        </div>
                        </a>
                    </div>

                    <?php
                } ?>

            </div>
           
        </div>

        <style>
        </style>

        <!-- Add Markup Ends -->
        <?php
    }

    protected function content_template()
    {
    }
}


Plugin::instance()->widgets_manager->register(new Widget_Service_List());