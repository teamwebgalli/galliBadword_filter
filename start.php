<?php
/**
 *	Elgg BadWords filter
 *	Author : Raez Mon | Team Webgalli
 *	Team Webgalli | Elgg developers and consultants
 *	Mail : info@webgalli.com
 *	Web	: http://webgalli.com 
 *	Skype : 'team.webgalli'
 *	@package galliBadword_filter
 * 	Plugin info : Provides a quick badword filter functionality for your Elgg site.
 *	Licence : GNU2
 *	Copyright : Team Webgalli 2011-2015
 */

elgg_register_event_handler('init', 'system', 'galliBadword_filter_init');

function galliBadword_filter_init() {
	$views = array('friendlytitle','longtext','text','plaintext');
	foreach($views as $view){
		elgg_register_plugin_hook_handler("view", "output/$view", "galliBadword_filter");
	}	
}	

function galliBadword_filter($hook, $entity_type, $returnvalue, $params){
	if ((include elgg_get_plugins_path() . 'galliBadword_filter/lib/badwords.php') == '1') {
		$admin_settings = elgg_get_plugin_setting('badwords', 'galliBadword_filter');
		$explode = explode(",", $admin_settings);
		$bad_words = array_merge($badwords, $explode);
		$replacement = "* * *";
		for($i=0; $i < sizeof($bad_words); $i++){
			$returnvalue = preg_replace("/\b$bad_words[$i]\b/i", $replacement, $returnvalue);
		}	
	}
	return $returnvalue;
}