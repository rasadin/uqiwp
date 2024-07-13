<?php

function uqiwp24_elements_activator() {
	require_once WAE_PLUGIN_PATH . '/elements/client-slider.php';
	require_once WAE_PLUGIN_PATH . '/elements/service-list.php';
	require_once WAE_PLUGIN_PATH . '/elements/owl-right-to-left.php';
}
add_action('elementor/widgets/widgets_registered','uqiwp24_elements_activator');

