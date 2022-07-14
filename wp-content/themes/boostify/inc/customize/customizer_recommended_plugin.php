<?php
/* Notifications in customizer */


require get_template_directory() . '/inc/customizer-notify/boostify-customizer-notify.php';
$boostify_config_customizer = array(
	'recommended_plugins'       => array(
		'clever-fox' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Cleverfox</strong> plugin for taking full advantage of all the features this theme has to offer.', 'boostify')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'boostify' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'boostify' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'boostify' ),
	'activate_button_label'     => esc_html__( 'Activate', 'boostify' ),
	'boostify_deactivate_button_label'   => esc_html__( 'Deactivate', 'boostify' ),
);
Boostify_Customizer_Notify::init( apply_filters( 'boostify_customizer_notify_array', $boostify_config_customizer ) );
?>