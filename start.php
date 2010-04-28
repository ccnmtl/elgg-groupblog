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

	/**
	 * Initialise the pages plugin.
	 *
	 */
	function groupblog_init() {
		global $CONFIG;
		// Register a page handler, so we can have nice URLs
		register_page_handler('groupblog','groupblog_page_handler');

		//extend_view('groups/right_column', 'blog/groupprofile_pages'); // Add to groups context
		
		// Set up menu for logged in users
		if (isloggedin()) {
			add_menu(elgg_echo('groupblogs'), $CONFIG->wwwroot . "pg/groupblog/owned/" . $_SESSION['user']->username);

		// And for logged out users
		} else {
			add_menu(elgg_echo('groupblog'), $CONFIG->wwwroot . "pg/groupblog/",array());
		}
		
		// Extend system CSS with our own styles, which are defined in the blog/css view
		extend_view('css','groupblog/css');
		
		// Extend hover-over menu	
		extend_view('profile/menu/links','groupblog/menu');
		 // Add to groups context
		extend_view('groups/right_column', 'groupblog/groupprofile');

		// Register a URL handler for blog posts
		register_entity_url_handler('groupblog_url','object','groupblog');
		
		// Register entity type
		register_entity_type('object','groupblog');
	}
	
		/**
	 * Sets up submenus for the pages system.  Triggered on pagesetup.
	 *
	 */
	function groupblog_submenus() {
		
		global $CONFIG;
		
		$page_owner = page_owner_entity();
		
		// Group submenu option	
		if ($page_owner instanceof ElggGroup) {

			add_submenu_item(sprintf(elgg_echo("groupblog:group"),$page_owner->name), $CONFIG->wwwroot . "pg/groupblog/owned/" . $page_owner->username);
			
		}
		if(get_context() == 'groupblog') {
		  //if(isloggedin()) add_submenu_item(elgg_echo("groupblog:your"), $CONFIG->wwwroot . "pg/groupblog/owned/" . $_SESSION['user']->username);
		  //add_submenu_item(elgg_echo("groupblog:everyone"), $CONFIG->wwwroot . "pg/groupblog/");
			if(isloggedin()) add_submenu_item(elgg_echo("groupblog:new"), $CONFIG->wwwroot . "pg/groupblog/new/" . $page_owner->username,'pagesactions');
				
		}

    }
	
	function groupblog_page_handler($page) {
		global $CONFIG;
		
		if (!empty($page[0])) {
			// See what context we're using
			
			switch($page[0])
			{
    			case "owned" :
					set_input('username',$page[1]);
    				// Owned by a user
    				include($CONFIG->pluginspath . "groupblog/index.php");
					break;
					
				case "new" :
					set_input('username',$page[1]);
    				include($CONFIG->pluginspath . "groupblog/add.php");
					break;
					
				case "edit" :
					set_input('username',$page[1]);
    				include($CONFIG->pluginspath . "groupblog/edit.php");
					break;
					
				case "read":
					set_input('blogpost',$page[1]);
					@include(dirname(__FILE__) . "/read.php");
					break;
				default:
					include($CONFIG->pluginspath . "groupblog/search.php");
					
			}
		}
		else include($CONFIG->pluginspath . "groupblog/everyone.php");
	}


	/**
	 * Populates the ->getUrl() method for blog objects
	 *
	 * @param ElggEntity $blogpost Blog post entity
	 * @return string Blog post URL
	 */
	function groupblog_url($blogpost) {
			
		global $CONFIG;
		$title = $blogpost->title;
		$title = friendly_title($title);
		return $CONFIG->url . "pg/groupblog/read/" . $blogpost->getGUID() . "/" . $title;
			
	}
		
	function groupblog_gatekeeper($username) {
		
		set_input('username',$username);
	
		$owner = page_owner_entity();
	
		if(!($owner instanceof ElggGroup)){
    		forward("");
		}
		return $owner;
	}
	
	
	function get_groupblog_entities($owner_guid,$container_guid,$limit,$offset,$count=false,$site_guid=0) {
		
		global $CONFIG;
		
		
		$type = 'object';
		$subtype = 'groupblog';
		$order_by = "time_created desc";
		$order_by = sanitise_string($order_by);
		
		$limit = (int)$limit;
		$offset = (int)$offset;
		$site_guid = (int) $site_guid;
		if ($site_guid == 0)
			$site_guid = $CONFIG->site_guid;
				
		$where = array();
		
		
		$type = sanitise_string($type);
		$subtype = get_subtype_id($type, $subtype);
			
		$where[] = "type='$type'";
		$where[] = "subtype=$subtype";
	
			
		if ($owner_guid != "") {
			if (!is_array($owner_guid)) {
				$owner_array = array($owner_guid);
				$owner_guid = (int) $owner_guid;
				$where[] = "owner_guid = '$owner_guid'";
			} else if (sizeof($owner_guid) > 0) {
				$owner_array = array_map('sanitise_int', $owner_guid);
				// Cast every element to the owner_guid array to int
			//	$owner_guid = array_map("sanitise_int", $owner_guid);
			//	$owner_guid = implode(",",$owner_guid);
				$where[] = "owner_guid in ({$owner_guid})";
			}
		}
		if ($site_guid > 0)
			$where[] = "site_guid = {$site_guid}";

		if (!is_null($container_guid)) {
			if (is_array($container_guid)) {
				if (count($container_guid) > 0) {
					foreach($container_guid as $key => $val) $container_guid[$key] = (int) $val;
					$where[] = "container_guid in (" . implode(",",$container_guid) . ")";
				}
			} else {
				$container_guid = (int) $container_guid;
				$where[] = "container_guid = {$container_guid}";
			}
		}
			
		if (!$count) {
			$query = "SELECT * from {$CONFIG->dbprefix}entities where ";
		} else {
			$query = "select count(guid) as total from {$CONFIG->dbprefix}entities where ";
		}
		foreach ($where as $w)
			$query .= " $w and ";
		$query .= get_access_sql_suffix(); // Add access controls
		if (!$count) {
			$query .= " order by $order_by";
			if ($limit) $query .= " limit $offset, $limit"; // Add order and limit
			$dt = get_data($query, "entity_row_to_elggstar");
			return $dt;
		} else {
			$total = get_data_row($query);
			return $total->total;
		}
		
	}	
	
	register_elgg_event_handler('init','system','groupblog_init');
	register_elgg_event_handler('pagesetup','system','groupblog_submenus');
	
	global $CONFIG;
	register_action("groupblog/add",false,$CONFIG->pluginspath . "groupblog/actions/add.php");
	register_action("groupblog/edit",false,$CONFIG->pluginspath . "groupblog/actions/edit.php");
	register_action("groupblog/delete",false,$CONFIG->pluginspath . "groupblog/actions/delete.php");

?>
