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
echo '<div>';
echo elgg_echo('gBwf:addmorewords');
echo ' ';
echo elgg_view('input/text', array(
	'name' => 'params[badwords]',
	'value' => $vars['entity']->badwords,
));
echo '</div>';
