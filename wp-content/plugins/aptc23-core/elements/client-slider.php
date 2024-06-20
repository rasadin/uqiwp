<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // If this file is called directly, abort.

class Widget_Client_Review_Carousel extends Widget_Base
{

    public function get_name()
    {
        return 'client-slider';
    }

    public function get_title()
    {
        return esc_html__('Client Slider', 'aptc23-core');
    }

    public function get_script_depends()
    {
        return [
            'aptc23-public'
        ];
    }

    public function get_icon()
    {
        return 'fa fa-slideshare';
    }

    public function get_categories()
    {
        return ['aptc23-for-elementor'];
    }

    protected function register_controls()
    {
        /**
         * Content Settings
         */
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content Settings', 'aptc23-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'client_name',
            [
                'label' => __('Client name', 'aptc23-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter Client Name Here', 'aptc23-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'dig',
            [
                'label' => __('Designation', 'aptc23-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter Designation Here', 'aptc23-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'aptc23-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('Enter Description Here', 'aptc23-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'logo',
            [
                'label' => __('Logo', 'aptc23-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'client_pic',
            [
                'label' => __('Client Photo', 'aptc23-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );


        $this->add_control(
            'hero_slides',
            [
                'label' => __('Client Slides', 'aptc23-core'),
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
        <div class="contain-client">
            <div id="owl-carousel" class="owl-carousel owl-theme">

                <?php
                foreach ($marco['hero_slides'] as $slide) { ?>



                    <div class="item">
                        <div class="client-review-section">

                            <div class="client-review-section-left">
                                <div class="client-review-section-name-logo">
                                    <div class="client-review-section-logo">
                                        <img src="<?php echo $slide['logo']['url']; ?>" class="client-company-logo" alt="...">
                                    </div>
                                    <div class="client-review-section-name">
                                        <?php echo $slide['client_name']; ?>
                                    </div>
                                </div>
                                <div class="client-review-section-photo">
                                    <img src="<?php echo $slide['client_pic']['url']; ?>" class="client-photo" alt="...">
                                </div>
                            </div>

                            <div class="client-review-section-right">
                                <div class="client-review-section-dig">
                                    <?php echo $slide['dig']; ?>
                                </div>
                                <div class="client-review-section-dis">
                                    <?php echo $slide['description']; ?>
                                </div>
                            </div>



                        </div>
                    </div>

                    <?php
                } ?>

            </div>


            <div class="btns">
            <div class="customPreviousBtn">Previous</div>
            <div class="customNextBtn">Next</div>
            </div>


        </div>

        <style>
            .contain-client {
            margin: 0 auto;
            max-width: 1200px;
            width: 100%;
            }

            /* .item {
            align-items: center;
            background-color: tomato;
            color: white;
            display: flex;
            height: 300px;
            justify-content: center;
            } */
        </style>

        <!-- Add Markup Ends -->
        <?php
    }

    protected function content_template()
    {
    }
}


Plugin::instance()->widgets_manager->register(new Widget_Client_Review_Carousel());