<?php

	/**
	 * Elgg blog listing
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */


		$owner = $vars['entity']->getOwnerEntity();
		$owner->setURL($CONFIG->wwwroot."pg/groupblog/owned/".$owner->username);
		$group = $vars['entity']->getContainerEntity();

		$page_owner = page_owner_entity();

		
		if ($page_owner instanceof ElggGroup) {
			$icon = elgg_view(
				"profile/icon", array(
										'entity' => $owner,
										'size' => 'small',
									  )
			);

		}
		else {
			$icon = elgg_view(
				"profile/icon", array(
										'entity' => $group,
										'size' => 'small',
									  )
			);			
		}

		$friendlytime = friendly_time($vars['entity']->time_created);
		$info = "<p>" . elgg_echo('groupblog') . ": <a href=\"{$vars['entity']->getURL()}\">{$vars['entity']->title}</a></p>";
		$info .= "<p class=\"owner_timestamp\"><a href=\"{$owner->getURL()}\">{$owner->name}</a> {$friendlytime}</p>";
		echo elgg_view_listing($icon,$info);

?>
