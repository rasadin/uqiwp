<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // If this file is called directly, abort.

class Widget_Infinite_Image_Carousel extends Widget_Base
{
    public function get_name()
    {
        return 'infinite-image-carousel';
    }

    public function get_title()
    {
        return esc_html__('Infinite Image Carousels', 'your-textdomain');
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
        // Right to Left Carousel Controls
        $this->start_controls_section(
            'content_section_right_to_left',
            [
                'label' => __('Right to Left Carousel', 'your-textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater_rtl = new \Elementor\Repeater();

        $repeater_rtl->add_control(
            'name',
            [
                'label' => __('Image Name', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Image', 'your-textdomain'),
                'label_block' => true,
            ]
        );


        $repeater_rtl->add_control(
            'color_class',
            [
                'label' => __('Color Class', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('color-common', 'your-textdomain'),
                'label_block' => true,
            ]
        );

        $repeater_rtl->add_control(
            'subtext',
            [
                'label' => __('Subtext', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => '',
                'label_block' => true,
            ]
        );

        $repeater_rtl->add_control(
            'image',
            [
                'label' => __('Image', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater_rtl->add_control(
            'link',
            [
                'label' => __('Link', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'your-textdomain'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'slides_rtl',
            [
                'label' => __('Slides (Right to Left)', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_rtl->get_controls(),
                'default' => [
                    [
                        'name' => __('Image 1', 'your-textdomain'),
                        'subtext' => '',
                        'image' => \Elementor\Utils::get_placeholder_image_src(),
                        'link' => '',
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();

        // Left to Right Carousel Controls
        $this->start_controls_section(
            'content_section_left_to_right',
            [
                'label' => __('Left to Right Carousel', 'your-textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater_ltr = new \Elementor\Repeater();

        $repeater_ltr->add_control(
            'name',
            [
                'label' => __('Image Name', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Image', 'your-textdomain'),
                'label_block' => true,
            ]
        );

        $repeater_ltr->add_control(
            'subtext',
            [
                'label' => __('Subtext', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => '',
                'label_block' => true,
            ]
        );

        $repeater_ltr->add_control(
            'image',
            [
                'label' => __('Image', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater_ltr->add_control(
            'color_class',
            [
                'label' => __('Color Class', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('color-common', 'your-textdomain'),
                'label_block' => true,
            ]
        );


        $repeater_ltr->add_control(
            'link',
            [
                'label' => __('Link', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'your-textdomain'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'slides_ltr',
            [
                'label' => __('Slides (Left to Right)', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_ltr->get_controls(),
                'default' => [
                    [
                        'name' => __('Image 1', 'your-textdomain'),
                        'subtext' => '',
                        'image' => \Elementor\Utils::get_placeholder_image_src(),
                        'link' => '',
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
{
    $settings = $this->get_settings_for_display();

    if (empty($settings['slides_rtl']) && empty($settings['slides_ltr'])) {
        return;
    }
    ?>
    <div class="infinite-image-carousel-container">
        <?php if (!empty($settings['slides_rtl'])) : ?>
            <div class="infinite-image-carousel right-to-left">
                <div class="carousel-track rtl-track">
                    <?php foreach ($settings['slides_rtl'] as $slide) : ?>
                        <div class="carousel-slide <?php echo esc_html($slide['color_class']); ?>"> 
                            <div class="carousel-content">

                                <div class="part-name">
                                <div class="image-name"><?php echo esc_html($slide['name']); ?></div>
                                <div class="image-subtext"><?php echo esc_html($slide['subtext']); ?></div>
                                </div>

                                <div class="part-img">
                                <?php if (!empty($slide['link']['url'])) : ?>
                                    <a href="<?php echo esc_url($slide['link']['url']); ?>" <?php echo $slide['link']['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $slide['link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                        <img src="<?php echo esc_url($slide['image']['url']); ?>" alt="">
                                    </a>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($slide['image']['url']); ?>" alt="">
                                <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($settings['slides_ltr'])) : ?>
            <div class="infinite-image-carousel left-to-right">
                <div class="carousel-track ltr-track">
                    <?php foreach ($settings['slides_ltr'] as $slide) : ?>
                        <div class="carousel-slide <?php echo esc_html($slide['color_class']); ?>">
                            <div class="carousel-content">

                                <div class="part-name">
                                <div class="image-name"><?php echo esc_html($slide['name']); ?></div>
                                <div class="image-subtext"><?php echo esc_html($slide['subtext']); ?></div>
                                </div>

                                <div class="part-img">
                                <?php if (!empty($slide['link']['url'])) : ?>
                                    <a href="<?php echo esc_url($slide['link']['url']); ?>" <?php echo $slide['link']['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $slide['link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                        <img src="<?php echo esc_url($slide['image']['url']); ?>" alt="">
                                    </a>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($slide['image']['url']); ?>" alt="">
                                <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <style>
        .infinite-image-carousel {
            overflow: hidden;
            width: 100%;
            position: relative;
        }

        .carousel-track {
            display: flex;
            width: 200%; /* Double the width to accommodate two sets of slides */
            animation: scroll 20s linear infinite;
        }

        .rtl-track {
            animation-direction: reverse; /* Reverse animation direction for right-to-left carousel */
        }

        .carousel-slide {
            flex: 0 0 auto;
            width: calc(100% / 6); /* Adjust based on the number of slides you want visible */
            box-sizing: border-box;
        }

        .carousel-slide img {
            width: 100%;
            display: block;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        /* Pause animation on hover */
        .infinite-image-carousel:hover .carousel-track {
            animation-play-state: paused;
        }

        /* Additional styling for carousel content */
        .carousel-content {
            position: relative;
        }

        .image-name,
        .image-subtext {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.8);
        }

        .image-subtext {
            font-size: 14px;
            bottom: 0;
        }
    </style>

    <?php
}


    

    protected function content_template()
    {
    }
}

Plugin::instance()->widgets_manager->register(new Widget_Infinite_Image_Carousel());
