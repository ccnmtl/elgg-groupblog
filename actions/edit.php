<?php

	/**
	 * Elgg blog: edit post action
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	// Make sure we're logged in (send us to the front page if not)
	gatekeeper();
    // Make sure action is secure
     action_gatekeeper();

	// Get input data
	$group_guid = get_input('group_guid');

	//check if can edit this blog	
	$group = groupblog_gatekeeper("group:$group_guid");

	// Get input data
	$guid = (int) get_input('blogpost');
	$title = get_input('blogtitle');
	$body = get_input('blogbody');
	$access = get_input('access_id');
	$tags = get_input('blogtags');
		
	// Make sure we actually have permission to edit
	$blog = get_entity($guid);
	if ($blog->getSubtype() == "groupblog" && $blog->canEdit()) {
	
	// Cache to the session
	$_SESSION['blogtitle'] = $title;
	$_SESSION['blogbody'] = $body;
	$_SESSION['blogtags'] = $tags;
			
	// Convert string of tags into a preformatted array
	$tagarray = string_to_tag_array($tags);
			
	// Make sure the title / description aren't blank
	if (empty($title) || empty($body)) {
		register_error(elgg_echo("groupblog:blank"));
		forward("pg/groupblog/edit/$guid");
			
	// Otherwise, save the blog post 
	} else {
				
		// Get owning user
		$owner = get_entity($blog->getOwner());
		// For now, set its access to public (we'll add an access dropdown shortly)
		$blog->access_id = $access;
		// Set its title and description appropriately
		$blog->title = $title;
		$blog->description = $body;
		// Before we can set metadata, we need to save the blog post
		if (!$blog->save()) {
			register_error(elgg_echo("groupblog:error"));
			forward("pg/groupblog/edit/$guid");
		}
		// Now let's add tags. We can pass an array directly to the object property! Easy.
		$blog->clearMetadata('tags');
		if (is_array($tagarray)) {
			$blog->tags = $tagarray;
		}
		// Success message
		system_message(elgg_echo("groupblog:posted"));
		// Remove the blog post cache
		unset($_SESSION['blogtitle']); unset($_SESSION['blogbody']); unset($_SESSION['blogtags']);
		// Forward to the main blog page
		forward("pg/groupblog/owned/group:" . $group->getGUID());
					
		}
		
	}
		
?>
