<?php

	/**
	 * Elgg hoverover extender for blog
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

?>

	<p class="user_menu_groupblog">
		<a href="<?php echo $vars['url']; ?>pg/groupblog/owned/<?php echo $vars['entity']->username; ?>"><?php echo elgg_echo("groupblogs"); ?></a>	
	</p>
