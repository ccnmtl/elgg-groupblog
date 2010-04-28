<?php
	/**
	 * Elgg pages plugin language pack
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	$english = array(
	
		/**
		 * Menu items and titles
		 */
			
			'groupblog' => "Group blogs",
			'groupblogs' => "Group blogs",
			'groupblog:user' => "%s's group blogs",
			'groupblog:your' => "Your group blogs",
			'groupblog:group' => "%s's group blogs",
			'groupblog:new' => "New group blog",
			'groupblog:groupprofile' => "Group blogs",
			'groupblog:edit' => "Edit this blog",
			'groupblog:delete' => "Delete this blog",
			'groupblog:history' => "Blog history",
			'groupblog:view' => "View blog",
			

			'groupblog:posttitle' => "%s's blog: %s",
			'groupblog:everyone' => "All site groups blogs",
	
			'groupblog:read' => "Read blog",
	
			'groupblog:addpost' => "Write a blog post",
			'groupblog:editpost' => "Edit blog post",
	
			'groupblog:text' => "Blog text",
	
			'groupblog:strapline' => "%s",
			
			'item:object:groupblog' => 'Group blogs',
	
			
         /**
	     * Blog river
	     **/
	        
	        //generic terms to use
	        'groupblog:river:created' => "%s wrote",
	        'groupblog:river:updated' => "%s updated",
	        'groupblog:river:posted' => "%s posted",
	        
	        //these get inserted into the river links to take the user to the entity
	        'groupblog:river:create' => "a new blog post.",
	        'groupblog:river:update' => "a blog post.",
	        'groupblog:river:annotate:create' => "a comment on a blog post.",
			
	
		/**
		 * Status messages
		 */
	
			'groupblog:posted' => "Your blog post was successfully posted.",
			'groupblog:deleted' => "Your blog post was successfully deleted.",
	
		/**
		 * Error messages
		 */
	
			'groupblog:save:failure' => "Your blog post could not be saved. Please try again.",
			'groupblog:blank' => "Sorry; you need to fill in both the title and body before you can make a post.",
			'groupblog:notfound' => "Sorry; we could not find the specified blog post.",
			'groupblog:notdeleted' => "Sorry; we could not delete this blog post.",
			
	);
					
	add_translation("en",$english);
?>
