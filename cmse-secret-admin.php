<?php

/*
Plugin Name: CMSE Secret Admin
Plugin URI: http://cmsenergizer.com/wordpress-plugins/viewdownload/5-wordpress-plugins/48-change-wordpress-admin-path
Description: CMSE Secret Admin is used to create alternate admin login path. Not to be used if you allow user registration. <a href="options-general.php"><b>Go to Settings > General</b></a> to configure
Author: Cmsenergizer.com
Version: 1.0
Author URI: http://cmsenergizer.com
*/



//--------------------[ S E T T I N G S ]-------------------------//

add_filter( 'plugin_action_links', 'cmse_action_link' );
function cmse_action_link( $links ) {
    $links[] = '<a href="options-general.php#cmsesecretadmin">'.__('Settings', 'cmse-secret-admin').'</a>';
	return $links;
}

add_action('admin_init', 'secretadmin_init');
function secretadmin_init(){
	register_setting( 'general', 'secretadmin_options', 'secretadmin_options_validate' );
	add_settings_section('secretadmin_section', __('<a name="cmsesecretadmin"></a>Secret Admin Path Setting', 'cmse-secret-admin'), 'secretadmin_section_text', 'general');
	add_settings_field('secretadmin_path', __('Secret Admin Path', 'cmse-secret-admin'), 'secretadmin_field', 'general', 'secretadmin_section');
}

function secretadmin_section_text() {
	require (dirname(__FILE__).'/doc.php');
}

function secretadmin_field() {
	$options = get_option('secretadmin_options');
	echo '<input id="secretadmin_path" name="secretadmin_options[secret_path]" class="regular-text" type="text" value="'.$options['secret_path'].'" />';
	_e( '<br /><span style="font-size: 11px;">Leave empty to disable</span>', 'cmse-secret-admin');
}

function secretadmin_options_validate($input) {
	$options = get_option('secretadmin_options');
	$options['secret_path'] = trim($input['secret_path']);
	if(!preg_match('/^[a-z0-9]/i', $options['secret_path'])) {
		$options['secret_path'] = '';
	}
	return $options;
}


//-----------------------[ O U T P U T ]-------------------------//

$options = get_option('secretadmin_options');
if ( !empty($options['secret_path']) ) {
	$backurl = site_url().$_SERVER['REQUEST_URI'];

	if (stripos($backurl, 'wp-login.php') && $_SERVER['HTTP_REFERER'] != site_url('/'.$options['secret_path'].'/')) {
		header('location:' . site_url());
	}
}

?>