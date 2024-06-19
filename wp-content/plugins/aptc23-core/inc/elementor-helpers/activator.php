<?php

function aptc23_elements_activator() {
	require_once WAE_PLUGIN_PATH . '/elements/client-slider.php';
	require_once WAE_PLUGIN_PATH . '/elements/service-list.php';
	require_once WAE_PLUGIN_PATH . '/elements/right-to-left.php';
}
add_action('elementor/widgets/widgets_registered','aptc23_elements_activator');

