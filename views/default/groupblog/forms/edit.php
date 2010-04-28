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

	global $groupblog_owner;

	// Set title, form destination
	if (isset($vars['entity'])) {
		$title = sprintf(elgg_echo("groupblog:editpost"),$object->title);
		$action = "groupblog/edit";
		$title = $vars['entity']->title;
		$body = $vars['entity']->description;
		$tags = $vars['entity']->tags;
		$access_id = $vars['entity']->access_id;
	} else  {
		$title = elgg_echo("groupblog:addpost");
		$action = "groupblog/add";
		$tags = "";
		$title = "";
		$description = "";
		$access_id = 0;
	}

// Just in case we have some cached details
	if (isset($vars['blogtitle'])) {
		$title = $vars['blogtitle'];
		$body = $vars['blogbody'];
		$tags = $vars['blogtags'];
	}

	$title_label = elgg_echo('title');
	$title_textbox = elgg_view('input/text', array('internalname' => 'blogtitle', 'value' => $title));
	$text_label = elgg_echo('groupblog:text');
	$text_textarea = elgg_view('input/longtext', array('internalname' => 'blogbody', 'value' => $body));
	$tag_label = elgg_echo('tags');
	$tag_input = elgg_view('input/tags', array('internalname' => 'blogtags', 'value' => $tags));
	$access_label = elgg_echo('access');
	$access_input = elgg_view('input/access', array('internalname' => 'access_id', 'value' => $access_id));
	$submit_input = elgg_view('input/submit', array('internalname' => 'submit', 'value' => elgg_echo('save')));

	if (isset($vars['entity'])) {
	  $entity_hidden = elgg_view('input/hidden', array('internalname' => 'blogpost', 'value' => $vars['entity']->getGUID()));
	} else {
	  $entity_hidden = '';
	}


	$owner_hidden = elgg_view('input/hidden', array('internalname' => 'group_guid', 'value' => $groupblog_owner->getGUID()));

	$form_body = <<<EOT
		<p>
			<label>$title_label</label><br />
                        $title_textbox
		</p>
		<p>
			<label>$text_label</label><br />
                        $text_textarea
		</p>
		<p>
			<label>$tag_label</label><br />
                        $tag_input
		</p>
		<p>
			<label>$access_label</label><br />
                        $access_input
		</p>
		<p>
			$entity_hidden
			$owner_hidden
			$submit_input
		</p>
EOT;

	echo elgg_view('input/form', array('action' => "{$vars['url']}action/$action", 'body' => $form_body));
?>
