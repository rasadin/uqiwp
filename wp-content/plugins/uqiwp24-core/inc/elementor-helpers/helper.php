<?php 
namespace Elementor;

function uqiwp24_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'uqiwp24-for-elementor',
        [
            'title'     => 'aptc Custom Elements',
            'icon'      => 'font'
        ],
        1
    );
}
add_action('elementor/init', 'Elementor\uqiwp24_elementor_init');