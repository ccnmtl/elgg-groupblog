<?php

	/**
	 * Elgg blog: delete post action
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	// Make sure we're logged in (send us to the front page if not)
	gatekeeper();

	// Get input data
	$guid = (int) get_input('blogpost');
	
	$blog = get_entity($guid);
	
	//check if can edit this blog	
	$group = groupblog_gatekeeper("group:".$blog->container_guid);

	// Make sure we actually have permission to edit
	
	if ($blog->getSubtype() == "groupblog" && $blog->canEdit()) {
	
	// Get owning user
	$owner = get_entity($blog->getOwner());
	// Delete it!
	$rowsaffected = $blog->delete();
	if ($rowsaffected > 0) {
		// Success message
		system_message(elgg_echo("groupblog:deleted"));
	} else {
		register_error(elgg_echo("groupblog:notdeleted"));
	}
	// Forward to the main blog page
	forward("pg/groupblog/owned/group:" . $blog->container_guid);
		
	}
		
?>
