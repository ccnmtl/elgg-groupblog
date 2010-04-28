<?php

	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ivan Vergés Pascual
	 * @copyright Ballo Microstudi SL 2008
	 * @link http://microstudi.com/elgg/
	 */


	// Load Elgg engine
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	
	global $groupblog_owner;
	$username = get_input('username');
	
	$post = get_entity($username);
	
	//print_r($entity);die;
	$groupblog_owner = groupblog_gatekeeper("group:".$post->container_guid);
			
	//set the title
	$area2 = elgg_view_title(elgg_echo('groupblog:addpost'));

	// Get the form
	$area2 .= elgg_view("groupblog/forms/edit",array('entity' => $post));
		
	// Display page
	page_draw(elgg_echo('groupblog:addpost'),elgg_view_layout("two_column_left_sidebar", $area1, $area2));
		
?>
