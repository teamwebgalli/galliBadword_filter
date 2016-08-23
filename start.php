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
	$views = array('output/friendlytitle','output/longtext','output/text','output/plaintext','page/components/list');
	foreach($views as $view){
		elgg_register_plugin_hook_handler("view", $view, "galliBadword_filter");
	}	
}		

function galliBadword_filter($hook, $entity_type, $returnvalue, $params){
    if ((include elgg_get_plugins_path() . 'galliBadword_filter/lib/badwords.php') == '1') {
        $admin_defined = elgg_get_plugin_setting('badwords', 'galliBadword_filter');
        $bad_words = $badwords;
        if(!empty($admin_defined)) {
            $explode = explode(",", $admin_defined);
            $bad_words = array_merge($bad_words, $explode);
        }
        $replacement = "* * *";
        for($i=0; $i < sizeof($bad_words); $i++){
            $returnvalue = preg_replace("/\b$bad_words[$i]\b/iu", $replacement, $returnvalue);
        }    
    }
    return $returnvalue;
}