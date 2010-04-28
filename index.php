<?
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

	$username = get_input('username');

	if($user = get_user_by_username($username)) {
		
		
		$title = sprintf(elgg_echo('groupblog:user'),$user->name);
		
		
		// Get a list of blog posts
		//$area2 = list_user_objects($user->getGUID(),'groupblog',10,false);
		
		//*
		//$area2 = list_entities('object','group',$user->getGUID(),10,false);
		$num_groups = get_entities_from_relationship('member',$user->getGUID(),false,'group','',0,'',0,0,true);
		$ids = array();
		if($groups = get_entities_from_relationship('member',$user->getGUID(),false,'group','',0,'',$num_groups,0,false)) {
			foreach($groups as $group) {
				$ids[] = $group->guid;
			}
		}
		
		$offset = (int) get_input('offset');
		$count = get_groupblog_entities($user->getGUID(),$ids, 0, 0, true);
		$entities = get_groupblog_entities( $user->getGUID(),$ids, 10, $offset);
		//print_r($count);
		$area2 = elgg_view_entity_list($entities, $count, $offset, 10, false);
		//*/
		
	// Display them in the page
        $body = elgg_view_layout("two_column_left_sidebar", '', $area1 . $area2);

	}
	else {
		$group = groupblog_gatekeeper($username);
		
		$title = sprintf(elgg_echo('groupblog:group'),$group->name);
		
	
		$groups = get_objects_in_group($group->getGUID());
	
		$area2 = list_entities_groups('groupblog');

	}
	
	

	
	$area1 = elgg_view_title($title);

	// Display them in the page
    $body = elgg_view_layout("two_column_left_sidebar", '', $area1 . $area2);
	
	page_draw($title,$body);
?>
